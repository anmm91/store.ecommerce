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

    public function scopeParent($query){

        return $query->whereNull('parent_id');
    }
    public function scopeChild($query){

        return $query->whereNotNull('parent_id');
    }
    public function getActive(){
       return  $this->is_active == 0 ? 'غير مفعل' : 'مفعل';
    }
}
