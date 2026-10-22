<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class profesor extends Model
{
    //

   

    protected $table = 'profesor';
    protected $fillable = ['nombre', 'apellidos', 'especialidad', 'f-alta', 'salario'];

}
