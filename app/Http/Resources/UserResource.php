<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * @OA\Schema(schema="UserResource",type="object",
     *   @OA\Property(property="id", type="string", example="724b650c-da5e-4301-886c-3a508a68f3a1"),
     *   @OA\Property(property="name", type="string", example="Administrator"),
     *   @OA\Property(property="username", type="string", example="admin"),
     *   @OA\Property(property="register", type="string", example="1400/08/03 | 15:20"),
     *   @OA\Property(property="is_active", type="boolean", example=true),
     * )
     */
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request): array
    {
        /** @var User $this */
        return [
            'id' => $this->id,
            'name' => $this->name,
            'username' => $this->username,
            'register' => jdate($this->ts_register)->format('Y/m/d | H:i'),
            'is_active' => boolval($this->is_active),
        ];
    }
}
