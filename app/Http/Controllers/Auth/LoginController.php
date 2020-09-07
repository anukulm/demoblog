<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
    use App\User;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

     public function login(Request $request)
    {
       if($request->post()){
                $input = $request->all();
                $validator = Validator::make($request->all(), [
                    'phone' => 'required|regex:/[0-9]{10}/|digits:10', 
                    'password' => 'required',
                ]);
                
                if ($validator->fails()) {
                    return Redirect::back()->withErrors($validator)->withInput($request->all());
                }
              
                $user = User::where('phone' , $input['phone'])->first();

                if($user){
                    // if($user->role != 1 || $user->role != 2){
                    //     return Redirect::back()->with('errormessage', 'You are not authorized persone!!')->withInput($request->all());
                    // }

                    if (Hash::check($input['password'], $user->password)) {
                        //dd( Auth::guard('admin')->attempt(array('email' => $input['email'], 'password' => $input['password'])));
                        Auth::login($user);


                        return redirect('home');


                    }else{
                        return Redirect::back()->with('errormessage', 'password is not correct')->withInput($request->all());
                    }
                }else{
                    return Redirect::back()->with('errormessage', 'You are not authorized persone!!')->withInput($request->all());
                }
            }

           return redirect()->route('home');
    }
}



