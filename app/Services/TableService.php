<?php

namespace App\Services;

use App\Domain\Interfaces\Repositories\TableRepositoryInterface;
use App\Domain\Interfaces\Services\AuthServiceInterface;
use App\Models\PlayerEntity;

class TableService implements \App\Domain\Interfaces\Services\TableServiceInterface
{
    private AuthServiceInterface $authService;
    private TableRepositoryInterface $repository;

    /**
     * @param AuthServiceInterface $authService
     * @param TableRepositoryInterface $repository
     */
    public function __construct(AuthServiceInterface $authService, TableRepositoryInterface $repository)
    {
        $this->authService = $authService;
        $this->repository = $repository;
    }


    public function canCurrentPlayerEditTable(int $tableId): bool
    {
//        $currentPlayer = $this->authService->getPlayer();
        //TODO remove when auth complete
        /** @var PlayerEntity $currentPlayer */
        $currentPlayer = PlayerEntity::query()->find(2);

        $table = $this->repository->get($tableId);

        return $table->getOwnerId() === $currentPlayer->getId();
    }
}
