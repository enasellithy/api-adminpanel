<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menus';

    protected $fillable = ['name'];

    public function link(){
        return $this->hasMany('App\Link');
    }

    public function getNameAttribute($value)
    {
        return ucfirst($value);
    }
}
