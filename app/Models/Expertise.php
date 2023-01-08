<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expertise extends Model
{
    //Tabla de la base de datos
    protected $table = "expertises";

    //Atributos de la tabla
    protected $fillable = ['name'];
    public $timestamps = true;

    use HasFactory;

    //Relacion con el modelo Activity
    public function activityExpertise()
    {
        return $this->hasOne(Activity::class);
    }
}
