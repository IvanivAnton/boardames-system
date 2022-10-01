<?php

namespace App\Http\Player\Controllers\Table;

use App\Domain\Interfaces\Entities\ViewModelInterface;
use App\Domain\UseCases\Table\Delete\InputPortInterface;
use App\Domain\UseCases\Table\Delete\RequestModel;
use App\Http\Player\Controllers\Controller;
use App\Http\Player\Requests\DeleteTableRequest;

class DeleteTableController extends Controller
{
    private InputPortInterface $inputPort;

    /**
     * @param InputPortInterface $inputPort
     */
    public function __construct(InputPortInterface $inputPort)
    {
        $this->inputPort = $inputPort;
    }

    public function __invoke(DeleteTableRequest $request)
    {
        return $this->inputPort->deleteTable(
            new RequestModel($request->validated())
        )->getResponse();
    }
}
