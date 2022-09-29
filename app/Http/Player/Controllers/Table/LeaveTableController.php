<?php

namespace App\Http\Player\Controllers\Table;

use App\Domain\Interfaces\Entities\ViewModelInterface;
use App\Domain\UseCases\Table\RemovePlayer\InputPortInterface;
use App\Domain\UseCases\Table\RemovePlayer\RequestModel;
use App\Http\Player\Requests\AddTableRequest;
use App\Http\Player\Requests\RemovePlayerRequest;

class LeaveTableController extends \App\Http\Player\Controllers\Controller
{
    private InputPortInterface $inputPort;

    /**
     * @param InputPortInterface $inputPort
     */
    public function __construct(InputPortInterface $inputPort)
    {
        $this->inputPort = $inputPort;
    }

    public function __invoke(RemovePlayerRequest $request): ViewModelInterface
    {
        return $this->inputPort->removePlayer(
            new RequestModel($request->validated())
        );
    }
}
