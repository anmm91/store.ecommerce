<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
class Category extends Model
{
    use Translatable;

    public $translatedAttributes = ['name'];

    protected $fillable = ['slug', 'parent_id', 'is_active'];

    protected $casts = ['is_active' => 'boolean'];

    protected $hidden = ['translatable'];
}
