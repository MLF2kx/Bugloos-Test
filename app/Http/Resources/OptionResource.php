<?php

namespace App\Http\Resources;

use App\Models\Option;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @OA\Schema(schema="OptionResource",type="object",
 *   @OA\Property(property="id", type="int", example=1),
 *   @OA\Property(property="value", type="string", example="Bugloos"),
 *   @OA\Property(property="is_new", type="boolean", example=false),
 * )
 */
class OptionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request): array
    {
        /** @var Option $this */
        return [
            'id' => $this->id,
            'value' => $this->value,
            'is_new' => boolval($this->is_new),
        ];
    }
}
