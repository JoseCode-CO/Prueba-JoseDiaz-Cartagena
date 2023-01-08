<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nac extends Model
{
    //Tabla de la base de datos
    protected $table = "nacs";

    //Atributos de la tabla
    protected $fillable = ['name'];
    public $timestamps = true;

    use HasFactory;

    //Relacion con el modelo Activity
    public function activityNac()
    {
        return $this->hasOne(Activity::class);
    }
}
