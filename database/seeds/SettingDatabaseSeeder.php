<?php

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seeded_data=[

            'default_locale'=>'ar',
            'default_timezone'=>'Africa/Cairo',
            'reviews_enable'=>true,
            'supported_currencies'=>['USD','LE','SAR'],
            'default_currency'=>'USD',
            'store_email'=>'admin@admin.com',
            'search_engine'=>'mysql',
            'store_email'=>'admin@admin.com',
            'local_shipping_cost'=>0,
            'outer_shipping_cost'=>0,
            'free_shipping_cost'=>0,
            'translatable'=>[

                'store_name'=>'مخزن احمد',
                'free_shipping_label'=>'الشحن مجانا ',
                'local_label'=>'الشحن الداخلى',
                'outer_label'=>'الشحن الخارجى ',
            ],

        ];
        Setting::setData($seeded_data);
    }
}
