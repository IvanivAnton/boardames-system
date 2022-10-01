<?php

namespace App\Http\Player\Controllers\Login;

use App\Domain\Interfaces\Entities\ViewModelInterface;
use App\Domain\UseCases\Player\LoginViaTelegram\InputPortInterface;
use App\Domain\UseCases\Player\LoginViaTelegram\RequestModel;
use App\Http\Player\Requests\LoginViaTelegramRequest;

class TelegramLoginController extends \Illuminate\Routing\Controller
{
    private InputPortInterface $inputPort;

    /**
     * @param InputPortInterface $inputPort
     */
    public function __construct(InputPortInterface $inputPort)
    {
        $this->inputPort = $inputPort;
    }

    public function __invoke(LoginViaTelegramRequest $request)
    {
        return $this->inputPort->login(
            new RequestModel($request->validated())
        )->getResponse();
    }
}
