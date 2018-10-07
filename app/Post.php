<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $fillable = [
        'title',
        'content',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function categories()
    {
        return $this->morphToMany('App\Category', 'categorizable');
    }

    public function archives()
    {
        return $this->belongsToMany('App\Archive');
    }
}
