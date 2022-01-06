<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Categories::paginate(5);

        return view('categories.index', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required']);
        $new_categorie = new Categories();
        $new_categorie->name = $request->name;
        $new_categorie->save();

        return redirect(route('category.index'))->with('msg', 'Registro Exitoso');
    }

    public function edit($id)
    {
        $category = Categories::find($id);
        return view('categories.edit', compact('category'));
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
        $request->validate(['name' => 'required']);
        $category = Categories::find($id);
        $category->name = $request->name;
        $category->update();
        return redirect(route('category.index'))->with('msg', 'Actualizacion Exitosa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Categories::find($id);
        $category->delete();
        return redirect(route('category.index'))->with('msg', 'Eliminación Exitosa');
    }
}
