<?php

namespace App\Http\Player\Controllers\Table;

use App\Domain\UseCases\Table\RemovePlayer\InputPortInterface;
use App\Domain\UseCases\Table\RemovePlayer\RequestModel;
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

    public function __invoke(RemovePlayerRequest $request)
    {
        return $this->inputPort->removePlayer(
            new RequestModel($request->validated())
        )->getResponse();
    }
}
