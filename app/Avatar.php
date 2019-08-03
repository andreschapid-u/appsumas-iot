<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Avatar extends Model
{
    //
    protected $fillable = ["name", "route", "characteristics"];

    public function level(){
        return $this->belongsTo(Level::class, 'level_id', 'id');
    }
}
