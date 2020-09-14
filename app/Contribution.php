<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contribution extends Model
{
    public function users(){
        // return $this->belongsTo('App\Contribution');
        return $this->belongsTo('App\User');
        //  dd($this->belongsToMany('App\PostContributor'));
    }
}
