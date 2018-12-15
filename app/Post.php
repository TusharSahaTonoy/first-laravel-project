<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //table name. By defalt it is the name of model in pural
    protected $table = "posts";
    //prinmary key. by defalt it is id
    public $primarykey = "id"; //or "post_id";
    //timestamps by defalt it is true
    public $timestamps = true;

    public function user(){
        return $this->belongsTo('App\User');
    }
}
