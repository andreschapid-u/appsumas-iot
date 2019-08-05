<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Device extends Model
{
    use SoftDeletes;
    //
    protected $fillable = [
        "name","mac","state","current_tag_id","feedback"
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
