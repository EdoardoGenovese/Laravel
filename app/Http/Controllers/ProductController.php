<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\{Product, ProductCategory};
use App\Services\ProductService;
use Illuminate\Database\QueryException;

class ProductController extends Controller
{
   
    public function __construct(private ProductService $_productService)
    {
        //
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('product.index', [
            'products' => Product::all()
        ]);

        Product::where('product_category_id', $category->id);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('product.create', [
            'categories' => ProductCategory::all()
        ]);
        
    }

    public function order()
    {
        return view('product.order');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $product = $this->_productService->create($request);

        if ($request->hasFile('image')){
            $path = $request->image->store('public/products');
        }

        return redirect('/dashboard/products');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('product.edit', [
            'categories' => ProductCategory::all(),
            'product' => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $this->_productService->update($request, $product);
        return redirect('/products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $hasError = false;

        try {
            $product->delete();
        } catch(Exeption $e) {
            $hasError = true;
        }
        return redirect('/products')->with([
            'action' => 'destroy',
            'hasError' => $hasError
        ]);
    }
}
