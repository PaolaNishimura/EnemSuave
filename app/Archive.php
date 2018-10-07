<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Archive extends Model
{
    //
    protected $fillable = [
        'title',
        'url'
    ];

    public function posts()
    {
        return $this->belongsToMany('App\Post');
    }
}
