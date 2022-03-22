<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = [
        'name','position','content'
    ];
    /*public function posts()
    {
        return $this->hasMany('App\Post');
    }*/
}
