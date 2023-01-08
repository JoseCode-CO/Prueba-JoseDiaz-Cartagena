<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CulturalRight extends Model
{
    protected $table = "cultural_rights";
    protected $fillable = [ 'name'];
    public $timestamps = true;

    use HasFactory;

    public function activityCultural()
    {
        return $this->hasOne(Activity::class);
    }
}
