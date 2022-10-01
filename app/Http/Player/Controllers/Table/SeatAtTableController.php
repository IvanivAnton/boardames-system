<?php

namespace App\Http\Player\Controllers\Table;

use App\Domain\Interfaces\Entities\ViewModelInterface;
use App\Domain\UseCases\Table\AddPlayer\InputPortInterface;
use App\Domain\UseCases\Table\AddPlayer\RequestModel;
use App\Http\Player\Requests\AddPlayerRequest;

class SeatAtTableController extends \App\Http\Player\Controllers\Controller
{
    private InputPortInterface $inputPort;

    /**
     * @param InputPortInterface $inputPort
     */
    public function __construct(InputPortInterface $inputPort)
    {
        $this->inputPort = $inputPort;
    }

    public function __invoke(AddPlayerRequest $request)
    {
        return $this->inputPort->addPlayer(
            new RequestModel($request->validated())
        )->getResponse();
    }
}
