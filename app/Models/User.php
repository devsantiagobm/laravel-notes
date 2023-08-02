<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
class User extends Model implements AuthenticatableContract
{
    use Authenticatable;
    use HasFactory;


    // Mutator = método del modelo que va a cambiar la naturaleza de un atributo. Al crear un registro, automaticamente se ejecuta
    // el mutator. Laravel reconoce que es un mutator por su nombre : set<nombre>Attribute

    public function setPasswordAttribute($value){ 
        $this->attributes["password"] = bcrypt($value);
    }    

    protected $fillable = [ "email","password"];
}
