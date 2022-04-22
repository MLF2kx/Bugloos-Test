<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\api\Controller;
use App\Http\Helpers\DBHelper;
use App\Http\Helpers\ValidatorHelper;
use App\Http\Requests\api\v1\Product\GetRequest;
use App\Http\Requests\api\v1\Product\ListRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * @OA\Get(
     *   path="/api/v1/product/{id}",
     *   tags={"product"},
     *   summary="Get information of a product",
     *   operationId="product_get",
     *   security={{"auth":{}}},
     *
     *   @OA\Parameter(name="id",in="path",required=true,example=1, @OA\Schema(type="integer")),
     *   @OA\Parameter(name="columns",in="query",required=true,description="id|category|title|description|price|quantity|values",example="id|category|title|description|price|quantity|values", @OA\Schema(type="string")),
     *
     *   @OA\Response(response=200,description="Success", @OA\Schema(type="object", ref="#/components/schemas/ProductResource")),
     *   @OA\Response(response=401,description="Unauthenticated", @OA\Schema(type="string")),
     *   @OA\Response(response=403,description="Unauthorized Access", @OA\Schema(type="string")),
     * )
     **/
    public function get(GetRequest $request): JsonResponse
    {
        $token = $request->bearerToken();
        $id = $request->route('id');
        $columns = $request->query('columns');

        list($code, $message) = ValidatorHelper::checkToken($token);
        #ERROR
        if ($code !== 200) return $this->error($code, $message);

        $data = (new ProductResource(Product::query()->where('id', $id)->first()))->toArray($request);
        $columns = array_map('trim', explode('|', $columns));
        foreach (array_keys($data) as $column) {
            if (!in_array($column, $columns)) {
                unset($data[$column]);
            }
        }

        #SUCCESS
        return $this->success($data);
    }

    /**
     * @OA\Get(
     *   path="/api/v1/product/list",
     *   tags={"product"},
     *   summary="Get list of products",
     *   operationId="product_list",
     *   security={{"auth":{}}},
     *
     *   @OA\Parameter(name="title",in="query",example="Bugloos", @OA\Schema(type="string")),
     *   @OA\Parameter(name="columns",in="query",required=true,description="id|category|title|description|price|quantity|values",example="id|category|title|description|price|quantity|values", @OA\Schema(type="string")),
     *   @OA\Parameter(name="page",in="query",example=1, @OA\Schema(type="integer")),
     *   @OA\Parameter(name="size",in="query",example=10, @OA\Schema(type="integer")),
     *
     *   @OA\Response(response=200,description="Success",
     *     @OA\MediaType(mediaType="application/json",
     *       @OA\Schema(type="object",
     *         @OA\Property(property="count", type="integer", example=10),
     *         @OA\Property(property="result", type="array", @OA\Items(type="object",ref="#/components/schemas/ProductResource")),
     *       ),
     *     )
     *   ),
     *   @OA\Response(response=401,description="Unauthenticated", @OA\Schema(type="string")),
     *   @OA\Response(response=403,description="Unauthorized Access", @OA\Schema(type="string")),
     * )
     **/
    public function list(ListRequest $request): JsonResponse
    {
        $token = $request->bearerToken();
        $title = $request->query('title');
        $columns = $request->query('columns');
        $page = max(1, intval($request->query('page')));
        $size = max(1, intval($request->query('size')));

        list($code, $message) = ValidatorHelper::checkToken($token);
        #ERROR
        if ($code !== 200) return $this->error($code, $message);

        if (trim($size) !== '') $size = 10;

        $query = Product::query();

        if (trim($title) !== '') $query->whereRaw('LOWER(title) LIKE \'%' . Str::lower($title) . '%\'');

        $count = $query->count();
        $page = min($page, ceil($count / $size));
        $result = ProductResource::collection($query->orderByDesc('id')->limit($size)->offset(($page - 1) * $size)->get())->toArray($request);
        $columns = array_map('trim', explode('|', $columns));
        foreach ($result as $key => $data) {
            foreach (array_keys($data) as $column) {
                if (!in_array($column, $columns)) {
                    unset($result[$key][$column]);
                }
            }
        }

        #SUCCESS
        return $this->success(compact('count', 'result'));
    }
}