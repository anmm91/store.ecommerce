<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
class Brand extends Model
{
    use Translatable;

    public $translatedAttributes = ['name'];

    protected $fillable = [ 'photo', 'is_active'];

    protected $casts = ['is_active' => 'boolean'];

    protected $hidden = ['translatable'];


    public function getActive(){
       return  $this->is_active == 0 ? 'غير مفعل' : 'مفعل';
    }
    public function getPhotoAttribute($value){
        return ($value != null) ?  asset('assets/images/brands/'.$value) : '';
     }
}
