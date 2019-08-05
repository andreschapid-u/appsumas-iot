<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use SoftDeletes;
    //

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];
    public function users()
    {
        return $this->hasMany(User::class, 'role_id', 'id');
    }

    public function is($role = null)
    {
        return $this->name == $role;
    }
}
