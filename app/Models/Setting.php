<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;

class Setting extends Model
{
    use Translatable;

    public $translatedAttributes = ['value'];
    public $timestamps = true;
    protected $fillable = ['key', 'is_translatable', 'plain_value'];
    protected $casts = ['is_translatable' => 'boolean', 'plain_value' => 'boolean'];

    public static function setData($setting)
    {

        foreach ($setting as $key => $value) {

            self::set($key, $value);
        }
    } //end of setData

    public static function set($key, $value)
    {

        if ($key == 'translatable') {

            return static::setTranslatableSettings($value);
        }


        if (is_array($value)) {

            $value = json_encode($value);
        }
        static::updateOrCreate([
            'key' => $key,
            'plain_value' => $value
        ]);
    } //end of set

    public static function setTranslatableSettings($settings = [])
    {

        foreach ($settings as $key => $value) {

            static::updateOrCreate(
                ['key' => $key],
                ['is_translatable' => true, 'value' => $value]
            );
        }
    }
}
