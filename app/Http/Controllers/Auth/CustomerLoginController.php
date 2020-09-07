<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Redirect;

use App\Registration;
use App\AdminLog;


class CustomerLoginController extends Controller
{

    public function __construct()
     {

        $this->middleware('guest:customer');
     }

      public function showLoginForm()
    {



     // Session::keep(['customerwishlist']);

       // $latest_products = master_product::where('sr_status','<>',1)->get();      
           
       //  $master_catalogue = master_catalogue::where('sr_main_id',NULL)->where('sr_status',0)->get();

       //      $banner_detail_first = banner_detail::where('sr_status',0)->where('priority_no',1)->get()->first();      

       //   $banner_detail_others = banner_detail::where('sr_status',0)->where('priority_no','<>',1)->get();  

        return view('frontend/pages/login');


    }



     public function login(Request $request)
    {




       $this->validate($request, ['unique_no' => 'required', 'password' => 'required',]);

        $input = $request->all();


          $customer = Registration::where('unique_no' , $input['unique_no'])->first();


             if($customer){


              if ($input['password'] ==  $customer->mobile_no) {
                //dd( Auth::guard('admin')->attempt(array('email' => $input['email'], 'password' => $input['password'])));
              Auth::guard('customer')->login($customer);


$formdata = array('user_id'=> $customer->id, 'ip_logged_in' => $_SERVER['REMOTE_ADDR'],'datetime_login'=> date('Y-m-d H:i:s'));

AdminLog::create($formdata);


              return redirect('dashboard');


          }else{
            return Redirect::back()->with('modalerror', 'password is not correct')->withInput($request->all());
          }
            }else{
              return Redirect::back()->with('modalerror', 'You are not authorized persone!!')->withInput($request->all());
            }
      




      return view('frontend/pages/login');



      // if(Auth::guard('customer')->attempt(['email'=> $request->email, 'password' => $request->password], $request->remember )){
            
     //             // header("Location: $customerwishlistredirect");
     //             //  exit();

     //        // return redirect()->intended(url('stage1'));

     //      }
                
           

      //return redirect()->back()->withInput($request->only('email','remember'));

        // return redirect()->back()->with('modalerror','These Credentials dont match our records!');
       
    }











}
