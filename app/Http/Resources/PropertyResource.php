<?php

namespace App\Http\Resources;

use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @OA\Schema(schema="PropertyResource",type="object",
 *   @OA\Property(property="id", type="int", example=1),
 *   @OA\Property(property="category", type="object", ref="#/components/schemas/CategoryResource"),
 *   @OA\Property(property="type", type="object", ref="#/components/schemas/TypeResource"),
 *   @OA\Property(property="title", type="string", example="Bugloos"),
 *   @OA\Property(property="description", type="string", example="Bugloos API Documentation"),
 *   @OA\Property(property="weight", type="integer", example=1),
 *   @OA\Property(property="is_required", type="boolean", example=true),
 *   @OA\Property(property="is_expandable", type="boolean", example=true),
 *   @OA\Property(property="is_filter", type="boolean", example=true),
 *   @OA\Property(property="is_sortable", type="boolean", example=true),
 *   @OA\Property(property="options", type="array", @OA\Items(type="object",ref="#/components/schemas/OptionResource")),
 * )
 */
class PropertyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request): array
    {
        /** @var Property $this */
        return [
            'id' => $this->id,
            'category' => new CategoryResource($this->modelCategory),
            'type' => new TypeResource($this->modelType),
            'title' => $this->title,
            'description' => $this->description,
            'weight' => $this->weight,
            'is_required' => boolval($this->is_required),
            'is_expandable' => boolval($this->is_expandable),
            'is_filter' => boolval($this->is_filter),
            'is_sortable' => boolval($this->is_sortable),
            'options' => OptionResource::collection($this->modelOptions),
        ];
    }
}
