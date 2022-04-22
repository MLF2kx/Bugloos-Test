<?php

namespace App\Http\Resources;

use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @OA\Schema(schema="TypeResource",type="object",
 *   @OA\Property(property="id", type="int", example=1),
 *   @OA\Property(property="title", type="string", example="Bugloos"),
 *   @OA\Property(property="description", type="string", example="Bugloos API Documentation"),
 * )
 */
class TypeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request): array
    {
        /** @var Type $this */
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
        ];
    }
}
