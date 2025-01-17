<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name'=>$this->name,
            'phone_number'=>$this->phone_number,
            'image' => $this->image ? asset('storage/' . $this->image) : null,
            'experiences' => ExperienceResource::collection($this->whenLoaded('experiences')),
            ];
    }
}
