<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Level extends Model
{
    use SoftDeletes;
    //
    protected $fillable = ["level", "level_name", "experience"];

    public function avatars()
    {
        return $this->hasMany(Avatar::class, 'level_id', 'id');
    }

    public function children()
    {
        return $this->belongsToMany(Child::class, 'children_levels', 'level_id', 'child_id')->withTimestamps();
        // ->using(BranchProduct::class);
    }
}
