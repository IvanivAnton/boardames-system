<?php

namespace App\Http\Player\Controllers\Game;

use App\Domain\Interfaces\Entities\ViewModelInterface;
use App\Domain\UseCases\Game\Add\InputPortInterface;
use App\Domain\UseCases\Game\Add\RequestModel;
use App\Http\Player\Controllers\Controller;
use App\Http\Player\Requests\AddGameRequest;

class AddGameController extends Controller
{
    private InputPortInterface $inputPort;

    /**
     * @param InputPortInterface $inputPort
     */
    public function __construct(InputPortInterface $inputPort)
    {
        $this->inputPort = $inputPort;
    }

    public function __invoke(AddGameRequest $request)
    {
        return $this->inputPort->add(
            new RequestModel($request->input('name'), $request->input('number_of_players'))
        )->getResponse();
    }
}
