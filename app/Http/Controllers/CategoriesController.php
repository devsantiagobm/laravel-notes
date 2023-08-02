<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoriesRequest;
use App\Models\Category;
use App\Models\Note;
use Illuminate\Support\Facades\Auth;

class CategoriesController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $categories = Category::select("*")->where("id_user", Auth::user()->id)->get();
        return view("categories/home", ["categories" => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        return view("categories/new");
    }

    /**
     * Store a newly created resource in storage.
     */

    function store(CategoriesRequest $request) {
        $category = $request->validated();
        $category["id_user"] = Auth::user()->id;
        Category::create($category);
        return redirect()->route("home")->with("success", "Categoría creada exitosamente");
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id) {
        $category = Category::find($id);
        return view("categories/update", ["category" => $category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoriesRequest $request, string $id) {
        Category::whereId($id)->update($request->validated());

        return redirect()->route("home")->with("success", "Categoría actualizada exitosamente");
    }

    /**
     * Remove the specified resource from storage.
     * Buscamos las notas con la categoría que se va a eliminar. Se cambia el id de su categoría para poder eliminar la categoría sin problema
     */
    public function destroy(string $id) {
        Note::notesToDefaultCategory($id);
        Category::whereId($id)->delete();
        
        return redirect()->route("home")->with("success", "Categoría eliminada exitosamente");
    }
}
