<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nac extends Model
{
    protected $table = "nacs";
    protected $fillable = ['name'];
    public $timestamps = true;

    use HasFactory;

    public function activityNac()
    {
        return $this->hasOne(Activity::class);
    }
}
