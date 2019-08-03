<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Child extends Model
{
    //
    protected $fillable = ["first_name", "last_name", "birthday", "gender"];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
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
