<?php

namespace App\Http\Resources;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @OA\Schema(schema="CategoryResource",type="object",
 *   @OA\Property(property="id", type="int", example=1),
 *   @OA\Property(property="parent", type="object", example="[]"),
 *   @OA\Property(property="title", type="string", example="Bugloos"),
 * )
 */
class CategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request): array
    {
        /** @var Category $this */
        return [
            'id' => $this->id,
            'parent' => new CategoryResource($this->modelParent),
            'title' => $this->title,
        ];
    }
}
