<?php

namespace App\Http\Resources;

use App\Models\Session;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SessionResource extends JsonResource
{
    /**
     * @OA\Schema(schema="SessionResource",type="object",
     *   @OA\Property(property="id", type="string", example="724b650c-da5e-4301-886c-3a508a68f3a1"),
     *   @OA\Property(property="token", type="string", example="eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vdGEtYjJiLm5jaXMuaXIvYXV0aC9sb2dpbiIsImF1ZCI6Imh0dHA6Ly90YS1iMmIubmNpcy5pciIsImlhdCI6MTYzNTE0Mzk0NC43MzMyNywibmJmIjoxNjM1MTQzOTQ0LjczMzI3LCJleHAiOjE2MzUyMzAzNDQuNzMzMjcsImp0aSI6IjhhMzY4ZjQyLWU0M2UtNGQzMS05MjdmLTY5MTg4MjU3YmIyOCIsInN1YiI6IjE2N2Y2ODUxLTA5MGUtNDk3My05OTQzLTNhMjg0OTgwOThlOSIsIm1vYmlsZSI6IjA5MTIxOTUzNDE5Iiwicm9sZXMiOlsiQ1VTVE9NRVIiLCJCMkJfU0VMTEVSIl19.olYoPScPjPHQJrd2pqZOgu2-vozfynsUiP9RGeLwTkk"),
     *   @OA\Property(property="refresh", type="string", example="eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vdGEtYjJiLm5jaXMuaXIvYXV0aC9sb2dpbiIsImF1ZCI6Imh0dHA6Ly90YS1iMmIubmNpcy5pciIsImlhdCI6MTYzNTE0Mzk0NC43NTcyODYsIm5iZiI6MTYzNTE0Mzk0NC43NTcyODYsImV4cCI6MTY0MDMyNzk0NC43NTcyODYsImp0aSI6IjhhMzY4ZjQyLWU0M2UtNGQzMS05MjdmLTY5MTg4MjU3YmIyOCIsInN1YiI6IjE2N2Y2ODUxLTA5MGUtNDk3My05OTQzLTNhMjg0OTgwOThlOSIsIm1vYmlsZSI6IjA5MTIxOTUzNDE5Iiwicm9sZXMiOlsiQ1VTVE9NRVIiLCJCMkJfU0VMTEVSIl19.sBhhaqJLqWBp5xjZGJJI8uEiU8hCy6Nnb2dnIeGDBBc"),
     *   @OA\Property(property="ip", type="string", example="127.0.0.1"),
     *   @OA\Property(property="device", type="string", example="Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:94.0) Gecko/20100101 Firefox/94.0"),
     *   @OA\Property(property="user", type="object", ref="#/components/schemas/UserResource"),
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
        /** @var Session $this */
        return [
            'id' => $this->id,
            'token' => $this->token,
            'refresh' => $this->refresh,
            'ip' => $this->ip,
            'device' => $this->device,
            'user' => new UserResource($this->modelUser),
        ];
    }
}
