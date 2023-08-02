<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\NotesRequest;
use App\Models\Category;
use App\Models\Note;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

class NotesController extends Controller {

    function store(NotesRequest $request) {
        $note = $request->validated(); // Este método devuelve un objeto con la información de los inputs que ya han sido validados
        $note["id_user"] = Auth::user()->id;
        Note::create($note);

        return redirect()->route("home")->with("success", "Nota creada exitosamente");
    }


    function index() {
        $notes = Note::select("notes.id", "notes.titulo", "notes.descripcion", "categories.nombre", "categories.color")->join("categories", "notes.id_category", "=", "categories.id")->where("notes.id_user", Auth::user()->id)->orderBy("notes.id", "DESC")->get();
        $categories = Category::select("nombre", "id", "color")->where("id_user", Auth::user()->id)->get();

        return view("notes/home", ["notes" => $notes, "categories" => $categories]);
    }

    function indexWithFilter($id) {
        $notes = Note::select("notes.id", "notes.titulo", "notes.descripcion", "categories.nombre", "categories.color")->join("categories", "notes.id_category", "=", "categories.id")->where("notes.id_user", Auth::user()->id)->where("categories.id", $id)->orderBy("notes.id", "DESC")->get();
        $categories = Category::select("nombre", "id", "color")->where("id_user", Auth::user()->id)->get();

        return view("notes/home", ["notes" => $notes, "categories" => $categories]);
    }

    function show($id){
        $note = Note::select("categories.id", "notes.titulo", "notes.descripcion", "categories.nombre", "categories.color")->join("categories", "notes.id_category", "=", "categories.id")->where("notes.id", $id)->first();
    
        if(!isset($note)) return redirect()->route("home")->with("success", "Parece que esta nota no existe");

        return view("notes/show", ["note" => $note]);
    }


    function destroy($id) {
        $note = Note::find($id);

        if (!isset($note)) return redirect()->route("home");
        if(empty(Note::findyByIdAndUser($id, Auth::user()->id ))) return redirect()->route("home")->with("success", "Esta nota no pertenece a ti");

        $note->delete();
        return redirect()->route("home")->with("success", "Nota eliminada exitosamente");
    }

    function create() {
        $categories = Category::select("id", "nombre")->where("id_user", Auth::user()->id)->get();
        return view('notes/new', ["categories" => $categories]);
    }


    function update(NotesRequest $request, $id) {
        Note::whereId($id)->update($request->validated());
        return redirect()->route("home")->with("success", "Nota actualizada exitosamente");
    }

    function edit($id) {
        $note = Note::find($id);
        $categories = Category::select("id", "nombre")->where("id_user", Auth::user()->id)->get()->toArray();
        array_unshift($categories, ["id" => 1, "nombre" => "Sin Categoría"]);

        if (!isset($note)) {
            return redirect()->route("home");
        }

        return view("notes/update", ["note" => $note, "categories" => $categories]);
    }
}
