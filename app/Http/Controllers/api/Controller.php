<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\JsonResponse;

/**
 * @OA\Info(
 *      version="1.0.0",
 *      title="Bugloos API",
 *      description="Bugloos API Documentation",
 * )
 *  * @OA\SecurityScheme(
 *       type="http",
 *       description="Use auth/login to get the JWT token",
 *       name="Authorization",
 *       in="header",
 *       scheme="bearer",
 *       bearerFormat="jwt",
 *       securityScheme="auth",
 *   )
 * @OA\Server(
 *      url=L5_SWAGGER_LOCAL
 * )
 */
class Controller extends \App\Http\Controllers\Controller
{
    public function error($code, $message): JsonResponse
    {
        return response()->json($message, $code);
    }

    public function success($data = null): JsonResponse
    {
        return response()->json($data);
    }
}
