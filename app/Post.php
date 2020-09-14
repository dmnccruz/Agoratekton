<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function postType(){
        return $this->belongsTo('App\PostType');
    }

    public function paymentScheme(){
        return $this->belongsTo('App\PaymentScheme');
    }

    public function contributions(){
        // return $this->belongsTo('App\Contribution');
        return $this->belongsToMany('App\Contribution');
        //  dd($this->belongsToMany('App\PostContributor'));
    }

    public function comments(){
        return $this->belongsToMany('App\Comment');
    }

    public function users(){
        return $this->belongsToMany('App\User');
    }

    public function likes(){
        return $this->belongsToMany('App\Like');
    }
}
