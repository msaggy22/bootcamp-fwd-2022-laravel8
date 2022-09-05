<?php

namespace App\Models\Operational;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Appointment extends Model
{
    // use HasFactory;
    use softDeletes;

    public $table = 'appointment';

    //this field must be type date
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    //declare fillable
    protected $fillable = [
        'doctor_id',
        'user_id',
        'consultation_id',
        'level',
        'date',
        'time',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function doctor()
    {
        // parameter (path model, field foreign key, field primary key from table hasMany or HasOne)
        return $this->belongsTo('App\Models\Operational\Doctor', 'doctor_id', 'id');
    }

    public function consultation()
    {
        // parameter (path model, field foreign key, field primary key from table hasMany or HasOne)
        return $this->belongsTo('App\Models\MasterData\Consultation', 'consultation_id', 'id');
    }

    public function user()
    {
        // parameter (path model, field foreign key, field primary key from table hasMany or HasOne)
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    public function transaction()
    {
        return $this->hasOne('App\Models\Operational\Transaction', 'appointment_id');
    }
}
