<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pfcategory extends Model
{
    public function pfposts() {
        return $this->hasMany('App\PfPost');
    }
}
