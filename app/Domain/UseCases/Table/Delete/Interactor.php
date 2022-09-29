<?php

namespace App\Domain\UseCases\Table\Delete;

use App\Domain\Interfaces\Entities\ViewModelInterface;
use App\Domain\Interfaces\Repositories\TableRepositoryInterface;
use App\Domain\Interfaces\Services\TableServiceInterface;

class Interactor implements InputPortInterface
{
    private TableRepositoryInterface $repository;
    private OutputPortInterface $output;
    private TableServiceInterface $service;

    /**
     * @param TableRepositoryInterface $repository
     * @param OutputPortInterface $output
     * @param TableServiceInterface $service
     */
    public function __construct(
        TableRepositoryInterface $repository,
        OutputPortInterface      $output,
        TableServiceInterface      $service
    )
    {
        $this->repository = $repository;
        $this->output = $output;
        $this->service = $service;
    }


    /**
     */
    public function deleteTable(RequestModel $requestModel): ViewModelInterface
    {
        $id = $requestModel->getTableId();

        if (!$this->repository->exists($id)) {
            return $this->output->tableDoesNotExists(new ResponseModel($id));
        }

        if(!$this->service->canCurrentPlayerEditTable($id)) {
            return $this->output->updateNotAllowed(new ResponseModel($id));
        }

        $response = new ResponseModel($requestModel->getTableId());
        if (!$this->repository->delete($requestModel->getTableId())) {
            return $this->output->tableNotDeleted(new ResponseModel($id));
        }

        return $this->output->tableDeleted($response);
    }
}
