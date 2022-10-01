<?php

namespace App\Http\Player\Controllers\Table;

use App\Domain\Interfaces\Entities\ViewModelInterface;
use App\Domain\UseCases\Table\Update\InputPortInterface;
use App\Domain\UseCases\Table\Update\RequestModel;
use App\Http\Player\Controllers\Controller;
use App\Http\Player\Requests\UpdateTableRequest;

class UpdateTableController extends Controller
{
    private InputPortInterface $inputPort;

    /**
     * @param InputPortInterface $inputPort
     */
    public function __construct(InputPortInterface $inputPort)
    {
        $this->inputPort = $inputPort;
    }

    public function __invoke(UpdateTableRequest $request)
    {
        return $this->inputPort->updateTable(
            new RequestModel($request->validated())
        )->getResponse();
    }
}
