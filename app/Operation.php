<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Operation extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['type',"value_one","value_two", "value_three"];
    //

    public function children()
    {
        return $this->belongsToMany(Child::class, 'children_operations', 'operation_id', 'child_id')
        ->withPivot(["answer", "state"])
        ->withTimestamps();
        // ->using(BranchProduct::class);
    }

    public function challenge()
    {
        return $this->belongsTo(Challenge::class, 'challenge_id', 'id');
    }

}
