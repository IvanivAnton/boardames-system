<?php

namespace App\Adapters\Presenters\Player\LogivViaTelegram;

use App\Adapters\ViewModels\JsonResourceViewModel;
use App\Domain\Interfaces\Entities\ViewModelInterface;
use App\Domain\UseCases\Player\LoginViaTelegram\OutputPortInterface;
use App\Domain\UseCases\Player\LoginViaTelegram\ResponseModel;
use App\Http\Player\Resources\Player\LogivViaTelegram\LoginExpiredResource;
use App\Http\Player\Resources\Player\LogivViaTelegram\LoginFailedResource;
use App\Http\Player\Resources\Player\LogivViaTelegram\SuccessfullyLoginResource;

class JsonPresenter implements OutputPortInterface
{
    public function successfullyLogin(ResponseModel $responseModel): ViewModelInterface
    {
        return new JsonResourceViewModel(
            new SuccessfullyLoginResource($responseModel->getPlayer())
        );
    }

    public function loginExpired(ResponseModel $responseModel): ViewModelInterface
    {
        return new JsonResourceViewModel(
            new LoginExpiredResource($responseModel->getPlayer())
        );
    }

    public function loginFailed(ResponseModel $responseModel): ViewModelInterface
    {
        return new JsonResourceViewModel(
            new LoginFailedResource($responseModel->getPlayer())
        );
    }
}
