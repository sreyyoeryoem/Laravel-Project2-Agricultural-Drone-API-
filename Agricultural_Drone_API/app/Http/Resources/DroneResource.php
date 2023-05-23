<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DroneResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->name,
            'battery' => $this->battery,
            'payload' => $this->payload,
            'Maximum_altitude' => $this->maximum_altitude,
            'Maximum_speed' => $this->maximum_speed,
            'location_id' => $this->location_id,
        ];
    }
}
