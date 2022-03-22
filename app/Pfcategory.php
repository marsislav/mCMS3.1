<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pfcategory extends Model
{
    public function portfolios() {
        return $this->hasMany('App\Portfolio');
    }
}
