<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CabinResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        $level= match($this->cabinlevel_id){
            1 => 'A',
            2 => 'B',
            3 => 'C',
        };

        return [
            "name" => $this->name,
            'level' => $this->level,
            "capacity" => $this->capacity,
        ];
    }

   /* private function mapLevel($level)
    {
        $map = [
            1 => 'a',
            2 => 'b',
            3 => 'c',
        ];

        return $map[$level] ?? null; // Si no coincide, devuelve null
    }*/
}
