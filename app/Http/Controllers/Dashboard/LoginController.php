<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminLoginRequest;

class LoginController extends Controller
{
    public function getLogin(){
        return view('dashboard.auth.login');
    }//end of getlogin

    public function postLogin(AdminLoginRequest $request){

      //check admin exsits or not
        $remember_me=$request->has('remember_me') ? true :'' ;
        if(auth()->guard('admin')->attempt(['email'=>$request->email,'password'=>$request->password],$remember_me)){


            notify()->success('تم التسجيل بنجاح');
            return redirect()->route('admin.home');
        }else{
            return redirect()->back()->with('error','هناك خطا يرجى المحاوله مره اخرى');
        }


    }//end of postlogin

    public function logout(){

        $logout=$this->getGuard();
        $logout->logout();
        return redirect()->route('admin.login');
    }//end of logout

    private function getGuard(){
        return auth()->guard('admin');
    }
}
