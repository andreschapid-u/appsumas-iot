<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Device extends Model
{
    //
    protected $fillable = [
        "name","mac","state","current_tag_id","feedback"
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
