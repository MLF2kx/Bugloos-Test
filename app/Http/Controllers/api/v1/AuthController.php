<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\api\Controller;
use App\Http\Helpers\JWTHelper;
use App\Http\Helpers\ValidatorHelper;
use App\Http\Requests\api\v1\Auth\LoginRequest;
use App\Http\Requests\api\v1\Auth\LogoutRequest;
use App\Http\Requests\api\v1\Auth\RefreshRequest;
use App\Http\Requests\api\v1\Auth\RevokeRequest;
use App\Http\Requests\api\v1\Auth\SessionsRequest;
use App\Http\Resources\SessionResource;
use App\Models\Session;
use App\Models\User;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

/**
 * @OA\Post(
 *   path="/api/v1/auth/login",
 *   tags={"auth"},
 *   summary="User Login via Username and Password",
 *   operationId="auth_login",
 *
 *   @OA\RequestBody(required=true,
 *     @OA\MediaType(mediaType="multipart/form-data",
 *       @OA\Schema(required={"username","password"},
 *         @OA\Property(property="username",example="admin", @OA\Schema(type="string")),
 *         @OA\Property(property="password",example="12345678", @OA\Schema(type="string")),
 *       )
 *     )
 *   ),
 *
 *   @OA\Response(response=200,description="Success", @OA\MediaType(mediaType="application/json",@OA\Schema(type="object",ref="#/components/schemas/SessionResource"))),
 *   @OA\Response(response=400, description="Invalid username or password", @OA\Schema(type="string")),
 *   @OA\Response(response=403, description="Disabled", @OA\Schema(type="string")),
 *   @OA\Response(response=500, description="Server Error", @OA\Schema(type="string")),
 * )
 **/
class AuthController extends Controller
{
    public function login(LoginRequest $request): JsonResponse
    {
        /** @var User $user */
        $input = $request->post();

        #ERROR
        if (!Auth::attempt(['username' => $input['username'], 'password' => $input['password']])) return $this->error(400, 'Invalid username or password');

        $userID = Auth::user()->id;
        $user = User::query()->where('id', $userID)->first();

        #ERROR
        if (!$user->is_active) return $this->error(403, 'You account has been disabled by system administrator');

        if (!$session = Session::generate($user)) return $this->error(500, 'Save Session Error');

        #SUCCESS
        return $this->success(new SessionResource($session));
    }

    /**
     * @OA\Delete(
     ** path="/api/v1/auth/logout",
     *   tags={"auth"},
     *   summary="Log out and remove current session",
     *   operationId="auth_logout",
     *   security={{"auth":{}}},
     *
     *   @OA\Response(response=200,description="Success", @OA\Schema (type="string")),
     *   @OA\Response(response=401,description="Unauthenticated", @OA\Schema(type="string")),
     *   @OA\Response(response=403,description="Unauthorized Access", @OA\Schema(type="string")),
     *   @OA\Response(response=500,description="Server Error", @OA\Schema (type="string")),
     *)
     **/
    public function logout(LogoutRequest $request): JsonResponse
    {
        $token = $request->bearerToken();

        list($code, $message) = ValidatorHelper::checkToken($token);
        #ERROR
        if ($code !== 200) return $this->error($code, $message);

        try {
            JWTHelper::getSession($token)->delete();
        } catch (Exception $exception) {
            return $this->error(500, 'Session Delete Error');
        }

        #SUCCESS
        return $this->success('Success');
    }

    /**
     * @OA\Put(
     *   path="/api/v1/auth/refresh",
     *   tags={"auth"},
     *   summary="Refresh JWT Token",
     *   operationId="auth_refresh",
     *   security={{"auth":{}}},
     *
     *   @OA\Response(response=200,description="Success", @OA\MediaType(mediaType="application/json", @OA\Schema(type="object",ref="#/components/schemas/SessionResource"))),
     *   @OA\Response(response=401,description="Unauthenticated", @OA\Schema(type="string")),
     *   @OA\Response(response=403,description="Unauthorized Access", @OA\Schema(type="string")),
     *   @OA\Response(response=500,description="Server Error", @OA\Schema(type="string")),
     * )
     **/
    public function refresh(RefreshRequest $request): JsonResponse
    {
        $token = $request->bearerToken();

        list($code, $message) = ValidatorHelper::checkToken($token);
        #ERROR
        if ($code !== 200) return $this->error($code, $message);

        /** @var Session $session */
        $session = JWTHelper::getSession($token);

        $session->token = JWTHelper::createToken($session->id, $session->modelUser)->toString();
        $session->refresh = JWTHelper::createToken($session->id, $session->modelUser, 60 * 86400)->toString();

        #ERROR
        if (!$session->save()) return $this->error(500, 'Save Session Error');

        $session->refresh();

        #SUCCESS
        return $this->success(new SessionResource($session));
    }

    /**
     * @OA\Delete(
     ** path="/api/v1/auth/revoke",
     *   tags={"auth"},
     *   summary="Log out and remove another session of current user",
     *   operationId="auth_revoke",
     *   security={{"auth":{}}},
     *
     *   @OA\Parameter(name="session_id",in="query",example="724b650c-da5e-4301-886c-3a508a68f3a1", @OA\Schema(type="string")),
     *
     *   @OA\Response(response=200,description="Success", @OA\Schema (type="string")),
     *   @OA\Response(response=500,description="Server Error", @OA\Schema (type="string")),
     *)
     **/
    public function revoke(RevokeRequest $request): JsonResponse
    {
        $token = $request->bearerToken();

        list($code, $message) = ValidatorHelper::checkToken($token);
        #ERROR
        if ($code !== 200) return $this->error($code, $message);

        try {
            /** @var Session $currentSession */
            /** @var Session $session */
            $currentSession = JWTHelper::getSession($token);
            #ERROR
            if (!$session = Session::query()->where(['id' => $request->query('session_id'), 'user_id' => $currentSession->user_id])->first()) return $this->error(400, 'Session Not Found');
            $session->delete();
        } catch (Exception $exception) {
            return $this->error(500, 'Session Delete Error');
        }

        #SUCCESS
        return $this->success('Success');
    }

    /**
     * @OA\Get(
     *   path="/api/v1/auth/sessions",
     *   tags={"auth"},
     *   summary="Get All JWT Tokens of user",
     *   operationId="auth_sessions",
     *   security={{"auth":{}}},
     *
     *   @OA\Response(response=200,description="Success", @OA\MediaType(mediaType="application/json", @OA\Schema(type="array",@OA\Items(type="object",ref="#/components/schemas/SessionResource")))),
     *   @OA\Response(response=401,description="Unauthenticated", @OA\Schema(type="string")),
     *   @OA\Response(response=403,description="Unauthorized Access", @OA\Schema(type="string")),
     *   @OA\Response(response=500,description="Server Error", @OA\Schema(type="string")),
     * )
     **/
    public function sessions(SessionsRequest $request): JsonResponse
    {
        $token = $request->bearerToken();

        list($code, $message) = ValidatorHelper::checkToken($token);
        #ERROR
        if ($code !== 200) return $this->error($code, $message);

        /** @var Session $session */
        $session = JWTHelper::getSession($token);

        #SUCCESS
        return $this->success(SessionResource::collection($session->modelUser->modelSessions));
    }
}