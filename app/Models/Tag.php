<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;


class Tag extends Model
{
    use Translatable;

    public $translatedAttributes = ['name'];

    protected $fillable = ['slug'];

    protected $hidden = ['translatable'];
}
