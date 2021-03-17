<?php

namespace App\Http\Controllers;

use App\Enums\eRespCode;
use App\Http\Requests\CreateOtUpdateCategory;
use App\Http\Resources\Category\Base\CategoryResource;
use App\Http\Resources\Category\Base\CategoryResourceCollection;
use App\Http\Resources\Category\Pagination\CategoryPaginationResourceCollection;
use App\Models\Category;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class CategoryController extends ResponseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return $this->resp->ok(eRespCode::CAT_LISTED_200_00, new CategoryResourceCollection($categories));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateOtUpdateCategory $request)
    {
        if ($category = Category::create($request->all()))
            return $this->resp->created(eRespCode::CAT_CREATED_201_00, new CategoryResource($category));

        return $this->resp->guessResponse(eRespCode::_500_INTERNAL_ERROR);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return $this->resp->ok(eRespCode::CAT_GET_200_03, new CategoryResource($category));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function update(CreateOtUpdateCategory $request, Category $category)
    {
        if ($category->update($request->all()))
            return $this->resp->created(eRespCode::CAT_UPDATED_200_01, new CategoryResource($category));

        return $this->resp->guessResponse(eRespCode::_500_INTERNAL_ERROR);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if ($category->delete())
            return $this->resp->ok(eRespCode::CAT_DELETED_200_02);

        return $this->resp->guessResponse(eRespCode::_500_INTERNAL_ERROR);
    }

    public function getCategoriesFiltred()
    {
        $categories = Category::with('parentCategory')->paginate();
        return $this->resp->ok(eRespCode::CAT_LISTED_200_00, new CategoryPaginationResourceCollection($categories));
    }
}
