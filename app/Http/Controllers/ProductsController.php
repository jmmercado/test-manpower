<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Products::select('products.*', 'categories.name as category', 'users.name as user')
            ->join('categories', 'categories.id', 'products.category_id')
            ->join('users', 'users.id', 'products.user_id')
            ->paginate(5);

        return view('products.index', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $categories = Categories::all();
        return view('products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        // return $request;
        $request->validate([
            'name' => 'required|min:3|max:50',
            'quantity' => 'required|integer',
            'category' => 'required'
        ]);

        $new_product = new Products();
        $new_product->name = $request->name;
        $new_product->category_id = $request->category;
        $new_product->user_id = Auth::user()->id;
        $new_product->quantity = $request->quantity;
        $new_product->save();

        return redirect(route('product.index'))->with('msg', 'Registro Exitoso');
    }

    public function edit($id)
    {
        $product = Products::find($id);
        $categories = Categories::all();
        return view('products.edit', compact('product', 'categories'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|min:3|max:50',
            'quantity' => 'required|integer',
            'category' => 'required'
        ]);

        $product = Products::find($id);
        $product->name = $request->name;
        $product->quantity = $request->quantity;
        $product->category_id = $request->category;
        $product->user_id = Auth::user()->id;
        $product->update();
        return redirect(route('product.index'))->with('msg', 'Actualizacion Exitosa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Products::find($id);
        $product->delete();
        return redirect(route('product.index'))->with('msg', 'Eliminación Exitosa');
    }
}
