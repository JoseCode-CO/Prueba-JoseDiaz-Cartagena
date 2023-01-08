<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CulturalRight extends Model
{
    //Tabla de la base de datos
    protected $table = "cultural_rights";

    //Atributos de la tabla
    protected $fillable = ['name'];
    public $timestamps = true;

    use HasFactory;

    //Relacion con el modelo Activity
    public function activityCultural()
    {
        return $this->hasOne(Activity::class);
    }
}
