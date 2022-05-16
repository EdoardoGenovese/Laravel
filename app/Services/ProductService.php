<?php

namespace App\Services;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;

class ProductService
{
   public function __construct()
   {
        //
   }

   public function create(StoreProductRequest $request)
   {
        $path = $request->image->store('public/products');  
     
        return Product::create([
            'name' => $request->input('name'),
            'description' => $request -> input('description'),
            'image' => str_replace('public', '/storage', $path),
            'price' => $request->input('price'),
            'quantity' => $request->input('quantity'),
            'product_category_id' => $request->input('product_category_id')
        ]);

   }

   public function update(UpdateProductRequest $request, Product $product): Product
   {
     $product->name = $request->input('name');
     $product->description = $request -> input('description');
     $product->price = $request->input('price');
     $product->quantity = $request->input('quantity');
     $product->product_category_id = $request->input('product_category_id');
     $product->save();

     return $product;
   }
}