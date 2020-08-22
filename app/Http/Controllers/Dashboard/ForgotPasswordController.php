<?php

namespace App\Http\Controllers\Dashboard;

use Carbon\Carbon;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Mail\AdminResetPassword;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\AdminLoginRequest;

class ForgotPasswordController extends Controller
{
    public function getForgotPassword(){
        return view('dashboard.auth.forgotPassword');
    }//end of getForgotPassword

    public function postForgotPassword(Request $request){

        $rules=['email'=>'required|email'];
        $messages=
        [
            'email.required'=>'هذا البريد الالكترونى مطلوب',
            'email.email'=>'هذا البريد الالكترونى غير صحيح',

        ];

        $this->validate($request,$rules,$messages);

        $admin=Admin::where('email',$request->email)->first();
        if(!empty($admin)){
            //create token to differ between admins
            $token=app('auth.password.broker')->createToken($admin);
            //store email ; token ,created_at in password_resets
            $data=DB::table('password_resets')->insert([
                'email'=>$admin->email,
                'token'=>$token,
                'created_at'=>Carbon::now(),
            ]);
            Mail::to($admin->email)->send(new AdminResetPassword(['data'=>$admin,'token'=>$token]));
            return redirect()->back()->with('success','تم الارسال الى بريدك بنجاح');
        }else{

            return redirect()->back()->with('error','هذا البريد الالكترونى غير موجود');
        }

    }//end of postForgotPassword

    public function getResetPassword($token){

        //check this token
        $check_token=DB::table('password_resets')->where('token',$token)
        ->where('created_at','>',Carbon::now()->subHours(2))->first();
        if(!empty($check_token)){

            return view('dashboard.auth.newPassword',compact('check_token'));
        }else{
            return redirect()->route('admin.forgot');
        }
    }//ebd of getResetPassword
    public function postResetPassword(Request $request ,$token){

        //validate
        $rules=[
            'email'=>'required|email',
            'password'=>'required|confirmed',
        ];
        $messages=
        [
            'email.required'=>'هذا البريد الالكترونى مطلوب',
            'email.email'=>'هذا البريد الالكترونى غير صحيح',
            'password.required'=>'هذا الحقل مطلوب',
            'password.confirmed'=>' البريد الالكترونى غير مطابق',

        ];
        $this->validate($request,$rules,$messages);


        $check_token=DB::table('password_resets')->where('token',$token)
        ->where('created_at','>',Carbon::now()->subHours(2))->first();
        if(!empty($check_token)){

            Admin::where('email',$check_token->email)->update([
                'email'=>$request->email,
                'password'=>bcrypt($request->password),
            ]);
            DB::table('password_resets')->where('email',$check_token->email)->delete();
            return redirect()->route('admin.home');

        }else{
            return redirect()->back();
        }

    }//end postResetPassword
}
