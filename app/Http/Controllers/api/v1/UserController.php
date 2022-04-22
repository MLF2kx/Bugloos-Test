<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\api\Controller;
use App\Http\Helpers\ValidatorHelper;
use App\Http\Requests\api\v1\User\GetRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * @OA\Get(
     *   path="/api/v1/user",
     *   tags={"user"},
     *   summary="Get list of Users",
     *   operationId="user_get",
     *   security={{"auth":{}}},
     *
     *   @OA\Parameter(name="name",in="query",example="Bugloos", @OA\Schema(type="string")),
     *   @OA\Parameter(name="username",in="query",example="admin", @OA\Schema(type="string")),
     *   @OA\Parameter(name="is_active",in="query",example=1, @OA\Schema(type="integer")),
     *   @OA\Parameter(name="page",in="query",example=1, @OA\Schema(type="integer")),
     *   @OA\Parameter(name="size",in="query",example=10, @OA\Schema(type="integer")),
     *
     *   @OA\Response(response=200,description="Success",
     *     @OA\MediaType(mediaType="application/json",
     *       @OA\Schema(type="object",
     *         @OA\Property(property="count", type="integer", example=10),
     *         @OA\Property(property="result", type="array", @OA\Items(type="object",ref="#/components/schemas/UserResource")),
     *       ),
     *     )
     *   ),
     *   @OA\Response(response=401,description="Unauthenticated", @OA\Schema(type="string")),
     *   @OA\Response(response=403,description="Unauthorized Access", @OA\Schema(type="string")),
     * )
     **/
    public function get(GetRequest $request): JsonResponse
    {
        $token = $request->bearerToken();
        $name = $request->query('name');
        $username = $request->query('username');
        $isActive = $request->query('is_active');
        $page = max(1, intval($request->query('page')));
        $size = max(1, intval($request->query('size')));

        list($code, $message) = ValidatorHelper::checkToken($token);
        #ERROR
        if ($code !== 200) return $this->error($code, $message);

        $query = User::query();

        if (trim($name) !== '') $query->where('name', 'LIKE', '%' . $name . '%');

        if (trim($username) !== '') $query->whereRaw('LOWER(username) LIKE \'%' . Str::lower($username) . '%\'');

        if (trim($isActive) !== '') $query->where('is_active', $isActive ? 1 : 0);

        if (trim($size) !== '') $size = 10;

        $count = $query->count();
        $page = min($page, ceil($count / $size));
        $result = UserResource::collection($query->orderByDesc('id')->limit($size)->offset(($page - 1) * $size)->get());

        #SUCCESS
        return $this->success(compact('count', 'result'));
    }
}