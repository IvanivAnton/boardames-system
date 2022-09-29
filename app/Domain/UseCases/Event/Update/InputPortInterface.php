<?php

namespace App\Domain\UseCases\Event\Update;

use App\Domain\Interfaces\Entities\ViewModelInterface;

interface InputPortInterface
{
    public function update(RequestModel $model): ViewModelInterface;
}
