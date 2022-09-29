<?php

namespace App\Domain\UseCases\Player\LoginViaTelegram;

use App\Domain\Interfaces\Entities\ViewModelInterface;
use App\Domain\Interfaces\Factories\PlayerFactoryInterface;
use App\Domain\Interfaces\Repositories\PlayerRepositoryInterface;
use App\Domain\Interfaces\Services\AuthServiceInterface;
use App\Domain\Interfaces\Services\TelegramServiceInterface;
use App\DTO\LoginViaTelegramDTO;
use App\Exceptions\TelegramAuthExpiredException;
use App\Exceptions\TelegramAuthFailedException;

class Interactor implements InputPortInterface
{
    private PlayerRepositoryInterface $playerRepository;
    private PlayerFactoryInterface $playerFactory;
    private OutputPortInterface $output;
    private TelegramServiceInterface $telegramService;
    private AuthServiceInterface $authService;

    /**
     * @param PlayerRepositoryInterface $playerRepository
     * @param PlayerFactoryInterface $playerFactory
     * @param OutputPortInterface $output
     * @param TelegramServiceInterface $telegramService
     * @param AuthServiceInterface $authService
     */
    public function __construct(
        PlayerRepositoryInterface $playerRepository,
        PlayerFactoryInterface    $playerFactory,
        OutputPortInterface       $output,
        TelegramServiceInterface  $telegramService,
        AuthServiceInterface $authService
    )
    {
        $this->playerRepository = $playerRepository;
        $this->playerFactory = $playerFactory;
        $this->output = $output;
        $this->telegramService = $telegramService;
        $this->authService = $authService;
    }

    public function login(RequestModel $model): ViewModelInterface
    {
        $responseModel = new ResponseModel($this->playerFactory->make());
        try {
            $this->telegramService->validateAuth(
                new LoginViaTelegramDTO(
                    $model->getHash(),
                    [
                        $model->getTelegramId(),
                        $model->getFirstName(),
                        $model->getLastName(),
                        $model->getUsername(),
                        $model->getPhotoUrl(),
                    ],
                    $model->getAuthDate()
                )
            );
        } catch (TelegramAuthExpiredException $exception) {
            return $this->output->loginExpired($responseModel);
        } catch (TelegramAuthFailedException $e) {
            return $this->output->loginFailed($responseModel);
        }

        $player = $this->playerRepository->getByTelegramId($model->getTelegramId());
        if (empty($player)) {
            $player = $this->playerFactory->make([
                'first_name' => $model->getFirstName(),
                'last_name' => $model->getLastName(),
                'photo_url' => $model->getPhotoUrl(),
                'telegram_id' => $model->getTelegramId(),
                'username' => $model->getUsername(),
            ]);

            $player = $this->playerRepository->create($player);
        }

        $this->authService->login($player);

        return $this->output->successfullyLogin(new ResponseModel($player));
    }
}
