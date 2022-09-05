<?php

namespace App\Models\ManagementAccess;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PermissionRole extends Model
{
    // use HasFactory;
    use softDeletes;

    public $table = 'permission_role';

    //this field must be type date
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    //declare fillable
    protected $fillable = [
        'permission_id',
        'role_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function permission()
    {
        // parameter (path model, field foreign key, field primary key from table hasMany or HasOne)
        return $this->belongsTo('App\Models\ManagementAccess\Permission', 'permission_id', 'id');
    }

    public function role()
    {
        // parameter (path model, field foreign key, field primary key from table hasMany or HasOne)
        return $this->belongsTo('App\Models\ManagementAccess\Role', 'role_id', 'id');
    }


}
