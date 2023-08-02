<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    protected $fillable = ["titulo", "descripcion", "id_category", "id_user"];


    // Al eliminar una categoría, primero debemos actualizar las notas con esta categoría y cambiar su categoría a la categoría por default
    static function notesToDefaultCategory($id){
        $notes = Note::select("*")->where("id_category", $id)->get();

        foreach($notes as $note) {
            $note->id_category = 1;
            $note->update();
        }
    
    }


    static function findyByIdAndUser($idNote, $idUser){
        return Note::select("id")->where("id", $idNote)->where("id_user", $idUser)->get()->toArray();
    }
}
