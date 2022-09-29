<?php

namespace App\Http\Player\Resources\Table\Update;

use App\Domain\Interfaces\Entities\TableInterface;

class TableUpdateResource extends \Illuminate\Http\Resources\Json\JsonResource
{
    protected TableInterface $table;

    /**
     * @param TableInterface $table
     */
    public function __construct(TableInterface $table)
    {
        $this->table = $table;
    }

    public function toArray($request): array
    {
        return [
            'id' => $this->table->getId(),
        ];
    }


}
