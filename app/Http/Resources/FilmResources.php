<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FilmResources extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'director' => $this->director,
            'performer' => $this->performer,
            'trailer' => $this->trailer,
            'category' => $this-> category,
            'number_episodes' => $this->number_episodes,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
