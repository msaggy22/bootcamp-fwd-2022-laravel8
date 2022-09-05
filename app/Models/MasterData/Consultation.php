<?php

namespace App\Models\MasterData;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Consultation extends Model
{
    // use HasFactory;
    use softDeletes;

    public $table = 'consultation';

    //this field must be type date
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    //declare fillable
    protected $fillable = [
        'name',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function Appointment()
    {
        return $this->hasMany('App\Models\Operational\Appointment', 'consultation_id');
    }
}
