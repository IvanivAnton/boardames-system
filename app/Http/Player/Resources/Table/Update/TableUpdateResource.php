<?php

namespace App\Http\Player\Resources\Table\Update;

use App\Domain\Interfaces\Entities\TableEntityInterface;

class TableUpdateResource extends \Illuminate\Http\Resources\Json\JsonResource
{
    protected TableEntityInterface $table;

    /**
     * @param TableEntityInterface $table
     */
    public function __construct(TableEntityInterface $table)
    {
        $this->table = $table;
    }

    public function toArray($request): array
    {
        return [
            'id' => $this->table->getId(),
        ];
    }

    public function toResponse($request)
    {
        return parent::toResponse($request)->setStatusCode(200);
    }


}
