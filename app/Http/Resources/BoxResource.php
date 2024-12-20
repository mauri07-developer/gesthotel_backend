<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BoxResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'box_id' => $this->box_id,
            'company_id' => $this->company_id,
            'name' => $this->name,
            'comment' => $this->comment,
            'state' => $this->state,
            'company_name' => $this->company->name,
        ];
    }
}
