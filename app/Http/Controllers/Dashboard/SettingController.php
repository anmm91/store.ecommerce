<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingController extends Controller
{
    public function editShippingMethod($type){

        switch($type){

            case $type == 'free':
                $shipping_method= Setting::where('key','free_shipping_label')->first();
                break;

            case $type == 'inner':
                $shipping_method= Setting::where('key','local_label')->first();
                break;

            case $type == 'outer':
                $shipping_method= Setting::where('key','outer_label')->first();
                break;

                default:
                $shipping_method= Setting::where('key','free_shipping_label')->first();




        }
        return view('dashboard.setting.shipping.edit',compact('shipping_method'));

    }//end of edit shipping method
}
