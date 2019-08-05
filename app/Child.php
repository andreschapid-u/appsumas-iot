<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Child extends Model
{
    use SoftDeletes; //add this line

    //
    protected $fillable = ["first_name", "last_name", "birthday", "gender", "code"];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function avatar()
    {
        return $this->belongsTo(Avatar::class, 'avatar_id', 'id');
    }

    public function challenges()
    {
        return $this->belongsToMany(Child::class, 'challenges_children', 'child_id', 'challenge_id')->withTimestamps();
        // ->using(BranchProduct::class);
    }
    public function levels()
    {
        return $this->belongsToMany(Level::class, 'children_levels', 'child_id', 'level_id')->withTimestamps();
        // ->using(BranchProduct::class);
    }
    public function operations()
    {
        return $this->belongsToMany(Operation::class, 'children_operations', 'child_id', 'operation_id')
        ->withPivot(["answer", "state"])
        ->withTimestamps();
        // ->using(BranchProduct::class);
    }
}
