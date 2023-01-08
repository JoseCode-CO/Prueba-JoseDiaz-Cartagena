<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $table = "activities";
    protected $fillable = ['activity_name', 'consecutive', 'start_time', 'final_hour', 'activity_date', 'nac_id', 'expertise_id', 'cultural_right_id'];
    public $timestamps = true;

    use HasFactory;

    public function expertise()
    {
        return $this->belongsTo(Expertise::class, 'expertise_id');
    }

    public function culturalRight()
    {
        return $this->belongsTo(CulturalRight::class);
    }

    public function nac()
    {
        return $this->belongsTo(Nac::class);
    }
}
