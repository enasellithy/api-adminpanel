<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';

    protected $fillable = [
        'title', 'des', 'content', 'status', 'user_id',
    ];

    public function user_id(){
        return $this->hasOne('App\User','id', 'user_id');
    }

    public function comments(){
        return $this->hasMany('App\Comment','news_id','id');
    }

    public function comments_count(){
        return $this->hasMany('App\Comment','user_id','id')->count();
    }
}
