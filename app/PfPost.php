<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PfPost extends Model
{
    use SoftDeletes;

    protected $fillable=[
        'title','content', 'pfcategory_id', 'featured', 'slug', 'client','completed_at','skills',
        'client_url', 'project_title'
    ];

    protected $dates=[
        'deleted_at'
    ];


    public function pfcategory() {
        return $this->belongsTo('App\PfCategory');
    }
}
