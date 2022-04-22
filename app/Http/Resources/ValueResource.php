<?php

namespace App\Http\Resources;

use App\Models\Value;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @OA\Schema(schema="ValueResource",type="object",
 *   @OA\Property(property="id", type="int", example=1),
 *   @OA\Property(property="property", type="object", ref="#/components/schemas/PropertyResource"),
 *   @OA\Property(property="option", type="object", ref="#/components/schemas/OptionResource"),
 *   @OA\Property(property="value", type="string", example="Bugloos"),
 * )
 */
class ValueResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request): array
    {
        /** @var Value $this */
        return [
            'id' => $this->id,
            'property' => new PropertyResource($this->modelProperty),
            'option' => new OptionResource($this->modelOption),
            'value' => $this->value,
        ];
    }
}
