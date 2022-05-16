<?php

namespace App\Services;

use App\Http\Requests\StoreProductCategoryRequest;
use App\Http\Requests\UpdateProductCategoryRequest;
use App\Models\ProductCategory;

class ProductCategoryService
{
   public function __construct()
   {
        //
   }

   public function create(StoreProductCategoryRequest $request)
   {
        return ProductCategory::create([
            'name' => $request->input('name'),
            'product_category_id' => $request->input('product_category_id', null)
        ]);
   }

   public function update(UpdateProductCategoryRequest $request, ProductCategory $productCategory): ProductCategory
   {
     $productCategory->name = $request->input('name');
     $productCategory->product_category_id = $request->input('product_category_id');
     $productCategory->save();

     return $productCategory;
   }
}