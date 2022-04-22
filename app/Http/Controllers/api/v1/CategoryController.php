<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\api\Controller;
use App\Http\Helpers\ValidatorHelper;
use App\Http\Requests\api\v1\Category\GetRequest;
use App\Http\Requests\api\v1\Category\PropertiesRequest;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\PropertyResource;
use App\Models\Category;
use App\Models\Property;
use Illuminate\Http\JsonResponse;

class CategoryController extends Controller
{
    /**
     * @OA\Get(
     *   path="/api/v1/category",
     *   tags={"category"},
     *   summary="Get list of Categories",
     *   operationId="category_get",
     *   security={{"auth":{}}},
     *
     *   @OA\Parameter(name="parent_id",in="query",example=1, @OA\Schema(type="integer")),
     *
     *   @OA\Response(response=200,description="Success", @OA\MediaType(mediaType="application/json", @OA\Schema(type="array", @OA\Items(type="object",ref="#/components/schemas/CategoryResource")))),
     *   @OA\Response(response=401,description="Unauthenticated", @OA\Schema(type="string")),
     *   @OA\Response(response=403,description="Unauthorized Access", @OA\Schema(type="string")),
     * )
     **/
    public function get(GetRequest $request): JsonResponse
    {
        $token = $request->bearerToken();
        $parentID = $request->query('parent_id');

        list($code, $message) = ValidatorHelper::checkToken($token);
        #ERROR
        if ($code !== 200) return $this->error($code, $message);

        $query = Category::query();

        if (trim($parentID) !== '') {
            $query->where('parent_id', $parentID);
        } else {
            $query->whereNull('parent_id');
        }

        #SUCCESS
        return $this->success(CategoryResource::collection($query->orderBy('title')->get()));
    }

    /**
     * @OA\Get(
     *   path="/api/v1/category/properties/{id}",
     *   tags={"category"},
     *   summary="Get list of Category Product Properties",
     *   operationId="category_properties",
     *   security={{"auth":{}}},
     *
     *   @OA\Parameter(name="id",in="path",required=true,example=1, @OA\Schema(type="integer")),
     *
     *   @OA\Response(response=200,description="Success", @OA\MediaType(mediaType="application/json", @OA\Schema(type="array", @OA\Items(type="object",ref="#/components/schemas/PropertyResource")))),
     *   @OA\Response(response=401,description="Unauthenticated", @OA\Schema(type="string")),
     *   @OA\Response(response=403,description="Unauthorized Access", @OA\Schema(type="string")),
     * )
     **/
    public function properties(PropertiesRequest $request): JsonResponse
    {
        /** @var Category $category */
        $token = $request->bearerToken();
        $id = $request->route('id');

        list($code, $message) = ValidatorHelper::checkToken($token);
        #ERROR
        if ($code !== 200) return $this->error($code, $message);

        $category = Category::query()->where('id', $id)->first();

        #SUCCESS
        return $this->success(PropertyResource::collection(Property::query()->whereIn('id', $category->getRecursivePropertyIDs())->get()));
    }
}