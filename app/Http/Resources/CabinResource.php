<?php

namespace App\Http\Resources;

use UnhandledMatchError;
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

        /* $level = "ERROR";
        switch($this->cabinlevel_id){
            case 1:
                $level = "A";
                break;
            case 2:
                $level = "B";
                break;
            case 3:
                $level = "C";
                break;
        } */

        /*$level = match ($this->cabinlevel_id) {
            1 => 'Aa',
            2 => 'Bb',
            3 => 'Cc',
            10 => 'Caso 10',
            11 => 'Caso 11',
            default => throw new UnhandledMatchError(),
        };*/

        return [
            'name' => $this->name,
            //'levelLetter' => $level,
            'levelNumber' => $this->cabinlevel_id,
            // 'amount_of_souls' => $this->capacity,
            'services' => $this->services->pluck('name'),

            'users' => $this->users->pluck('name'),
        ];
    }
}
