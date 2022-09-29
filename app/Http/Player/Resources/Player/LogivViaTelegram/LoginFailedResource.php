<?php

namespace App\Http\Player\Resources\Player\LogivViaTelegram;

class LoginFailedResource extends \Illuminate\Http\Resources\Json\JsonResource
{
    public function toArray($request): array
    {
        return [
            'message' => 'Authentication failed'
        ];
    }
}
