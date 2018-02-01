<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seo extends Model
{
    protected $table = 'seos';

    protected $fillable = ['meta_name', 'meta_body'];
}
