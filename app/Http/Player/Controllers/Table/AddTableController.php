<?php

namespace App\Http\Player\Controllers\Table;

use App\Domain\Interfaces\Entities\ViewModelInterface;
use App\Domain\UseCases\Table\Add\InputPortInterface;
use App\Domain\UseCases\Table\Add\RequestModel;
use App\Http\Player\Requests\AddTableRequest;

class AddTableController extends \App\Http\Player\Controllers\Controller
{
    private InputPortInterface $inputPort;

    /**
     * @param InputPortInterface $inputPort
     */
    public function __construct(InputPortInterface $inputPort)
    {
        $this->inputPort = $inputPort;
    }

    public function __invoke(AddTableRequest $request): ViewModelInterface
    {
        return $this->inputPort->addTable(
            new RequestModel($request->validated())
        );
    }
}
