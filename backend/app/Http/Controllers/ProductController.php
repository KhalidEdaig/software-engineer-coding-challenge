<?php

namespace App\Http\Controllers;

use App\Enums\eRespCode;
use App\Http\Requests\CreateOtUpdateProduct;
use App\Http\Resources\Product\Base\ProductResource;
use App\Http\Resources\Product\Pagination\ProductPaginationResourceCollection;
use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProductController extends ResponseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $categoryId = $request->category_id ?? null;
        $sortBy = $request->sortBy ?? 'name';
        $desc =  \boolval($request->desc);

        $products = Product::when($categoryId, function (Builder $query) use ($categoryId) {
            $query->whereCategoryId($categoryId);
        })->when($desc, function (Builder $query) use ($sortBy) {
            $query->orderByDesc($sortBy);
        })
            ->orderBy($sortBy)
            ->with('category')->paginate();
        return $this->resp->ok(eRespCode::P_LISTED_200_00, new ProductPaginationResourceCollection($products));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateOtUpdateProduct $request)
    {
        if ($product = Product::create($request->all()))
            return $this->resp->created(eRespCode::P_CREATED_201_00, new ProductResource($product->load('category')));

        return $this->resp->guessResponse(eRespCode::_500_INTERNAL_ERROR);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return $this->resp->ok(eRespCode::P_GET_200_03, new ProductResource($product->load('category')));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateOtUpdateProduct $request, Product $product)
    {
        if ($product->update($request->all()))
            return $this->resp->ok(eRespCode::P_UPDATED_200_01, new ProductResource($product->load('category')));

        return $this->resp->guessResponse(eRespCode::_500_INTERNAL_ERROR);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if ($product->delete())
            return $this->resp->ok(eRespCode::P_DELETED_200_02);

        return $this->resp->guessResponse(eRespCode::_500_INTERNAL_ERROR);
    }
}
