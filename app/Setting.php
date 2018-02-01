<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    public $table = "settings";

    protected $fillable = [
        'name' ,'type' , 'body_setting',
    ];
}
