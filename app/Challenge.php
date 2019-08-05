<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Challenge extends Model
{
    use SoftDeletes; //add this line

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'estate','difficulty', 'num_sums', 'num_subtraction',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function operations()
    {
        return $this->hasMany(Operation::class, 'challenge_id', 'id');
    }
    public function children()
    {
        return $this->belongsToMany(Child::class, 'challenges_children', 'challenge_id', 'child_id')
        ->withTimestamps();
        // ->using(BranchProduct::class);
    }

}
