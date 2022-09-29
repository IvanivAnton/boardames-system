<?php

namespace App\Adapters\ViewModels;

use Illuminate\Http\Resources\Json\JsonResource;

class JsonResourceViewModel implements \App\Domain\Interfaces\Entities\ViewModelInterface
{
    private JsonResource $resource;

    public function __construct(JsonResource $resource)
    {
        $this->resource = $resource;
    }

    public function getResponse(): JsonResource
    {
        return $this->resource;
    }
}
