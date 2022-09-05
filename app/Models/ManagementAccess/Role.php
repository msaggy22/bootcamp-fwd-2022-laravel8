<?php

namespace App\Models\ManagementAccess;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    // use HasFactory;
    use softDeletes;

    public $table = 'role';

    //this field must be type date
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    //declare fillable
    protected $fillable = [
        'title',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function permission_role()
    {
        return $this->hasMany('App\Models\ManagementAcces\PermissionRole', 'role_id');
    }

    public function role_user()
    {
        return $this->hasMany('App\Models\ManagementAcces\RoleUser', 'role_id');
    }
}
