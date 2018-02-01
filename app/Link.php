<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    protected $table = 'links';

    protected $fillable = [
        'name', 'link', 'menu_id',
    ];

    public function menu(){
        return $this->belongsTo('App\Menu' , 'menu_id');
    }
}
