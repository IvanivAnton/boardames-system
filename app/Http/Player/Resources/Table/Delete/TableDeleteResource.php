<?php

namespace App\Http\Player\Resources\Table\Delete;

use App\Domain\Interfaces\Entities\TableInterface;
use Illuminate\Http\JsonResponse;

class TableDeleteResource extends JsonResponse
{
    private TableInterface $table;

    /**
     * @param TableInterface $table
     */
    public function __construct(TableInterface $table)
    {
        $this->table = $table;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->table->getId(),
        ];
    }
}
