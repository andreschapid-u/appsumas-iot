<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Avatar extends Model
{
    //
    use SoftDeletes; //add this line
    protected $fillable = ["name", "route", "characteristics"];

    public function level(){
        return $this->belongsTo(Level::class, 'level_id', 'id');
    }

    public function children()
    {
        return $this->hasMany(Child::class, 'avatar_id', 'id');
    }
}
