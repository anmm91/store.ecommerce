<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

    public function updateShippingMethod(Request $request,$id){


        try{

            $shipping_method=Setting::find($id);
        if(empty($shipping_method)){

            return redirect()->route('edit.shippings.methods',$request->value)->with('error',__('admin/edit_shipping.error_message'));
        }

        DB::beginTransaction();
        $shipping_method->update([

            'plain_value'=>$request->plain_value,


        ]);

        $shipping_method->value=$request->value;
        // $shipping_method->plain_value=$request->plain_value;
        $shipping_method->save();

        DB::commit();
        return redirect()->back()->with('success',__('admin/edit_shipping.updated'));
        }catch(\Exception $ex){

            return redirect()->route('admin.home')->with('error',__('admin/edit_shipping.error_message'));
            DB::rollback();
        }


    }//end of updateShippingMethod
}
