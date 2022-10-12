<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductChangeRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('prices')->get();

        return response()->json(compact('products'), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductChangeRequest $request)
    {
        $request->validated();
        $input = $request->all();
        $id = isset($input['id']) ? $input['id'] : null;
        $product = Product::createOrUpdate($input, $id);

        return json_encode($product);
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductChangeRequest $request, $id)
    {
        $request['id'] = $id;
        $response = $this->store($request);

        return $response;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::destroy($id);
        return response()->json($id);
    }


    /**
     * 
     */
    public function list(Request $request) {
        $input = $request->all();
        $products = Product::with('prices');
        $sortBy =  $input['sort_by'] ?? 'id';
        $sortOrder = $input['sort_order'] ?? 'asc';
        $products = $products->orderBy($sortBy, $sortOrder)->get();

        return response()->json(compact('products'));
    }
}
