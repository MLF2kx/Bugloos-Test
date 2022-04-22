<?php

namespace App\Http\Resources;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @OA\Schema(schema="ProductResource",type="object",
 *   @OA\Property(property="id", type="int", example=1),
 *   @OA\Property(property="category", type="object", ref="#/components/schemas/CategoryResource"),
 *   @OA\Property(property="title", type="string", example="Bugloos"),
 *   @OA\Property(property="description", type="string", example="Bugloos API Documentation"),
 *   @OA\Property(property="price", type="integer", example=1000),
 *   @OA\Property(property="quantity", type="integer", example=25),
 *   @OA\Property(property="values", type="array", @OA\Items(type="object", ref="#/components/schemas/ValueResource")),
 * )
 */
class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request): array
    {
        /** @var Product $this */
        return [
            'id' => $this->id,
            'category' => new CategoryResource($this->modelCategory),
            'title' => $this->title,
            'description' => $this->description,
            'price' => $this->price,
            'quantity' => $this->quantity,
            'values' => ValueResource::collection($this->getValues()),
        ];
    }
}
