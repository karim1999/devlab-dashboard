<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return redirect()->route('sites.index');
        //return view('home');
    }


    public function update_user_password(Request $request){
      $request->validate([
        'email'=>'email|required',
        'new_password'=>'string|min:6|required_with:password_confirmation|same:password_confirmation',
        'password_confirmation'=>'string|min:6',

      ]); 
      $user=\App\User::where('email',$request->email)->get()->first();
      if(null!==$user){
        $user->update(['password'=>\Hash::make($request->new_password)]);
        return redirect()->back()->with('data',['alert'=>'تم تغيير كلمة المرور بنجاح','alert-type'=>'success']);
      }else{
        return redirect()->back()->with('data',['alert'=>'يبدو انك قمت بإدخال شئ خطا سواء هنا او هناك .. قم بالتدقيق مرة اخري :!','alert-type'=>'error']);
      }
    }

    
}
