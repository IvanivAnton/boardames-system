<?php

namespace App\Domain\UseCases\Game\Update;

use App\Domain\Interfaces\Entities\ViewModelInterface;

interface InputPortInterface
{
    public function update(RequestModel $requestModel): ViewModelInterface;
}
