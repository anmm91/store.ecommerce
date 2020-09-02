<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileRequest;

class ProfileController extends Controller
{
    public function editProfile(){

        $admin=auth()->guard('admin')->user();
        return view('dashboard.profile.edit',compact('admin'));
    }//end of edit profile

    public function updateProfile(ProfileRequest $request){

        try{

            $admin=Admin::find(auth()->guard('admin')->user()->id);
            $requested_data=$request->except('password_confirmation','id','password');
            if($request->filled('password')){
            
                $requested_data['password']=bcrypt($request->password);
            
            }
                $admin->update($requested_data);
            
        return redirect()->back()->with('success',__('admin/edit_shipping.updated'));
        }catch(\Exception $ex){
            return redirect()->route('admin.home')->with('error',__('admin/edit_shipping.error_message'));
        }
       

    }//end of update profile
}
