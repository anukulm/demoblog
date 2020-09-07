<?php
	
	namespace App\Http\Controllers;
	

	use Illuminate\Http\Request;
	use App\User;
	


	use Session;
	use DB;
	use Mail; 
	use Hash; 
	use Illuminate\Support\Facades\Auth; 
	use Illuminate\Html\HtmlFacade; 
	use Illuminate\Support\Facades\Validator;
	use Illuminate\Support\Facades\Redirect;

	class AdminloginController extends Controller
	{
		  public function __construct()
		    {
	    	    $this->middleware(function ($request, $next) {
	    	    	if(Auth::check()){
	    	    		if(Auth::user()->isAdmin()){
							return redirect('/');
						}
	    	    	}
				       	
				        return $next($request);
				 });

		    }
		
		public function login(Request $request){

			if($request->post()){
				$input = $request->all();
				$validator = Validator::make($request->all(), [
		            'email' => 'required|email',
		            'password' => 'required',
		        ]);
				
		        if ($validator->fails()) {
		        	return Redirect::back()->withErrors($validator)->withInput($request->all());
		        }
		      
		        $user = User::where('email' , $input['email'])->first();

		        if($user){
		        	// if($user->role != 1){
		        	// 	return Redirect::back()->with('errormessage', 'You are not authorized persone!!')->withInput($request->all());
		        	// }

		        	if (Hash::check($input['password'], $user->password)) {
		        		//dd( Auth::guard('admin')->attempt(array('email' => $input['email'], 'password' => $input['password'])));
					    Auth::login($user);

					    if($user->role == 2)
					    {

					    	return redirect('/guest');

					    }
					    return redirect('/');




					}else{
						return Redirect::back()->with('errormessage', 'password is not correct')->withInput($request->all());
					}
		        }else{
		        	return Redirect::back()->with('errormessage', 'You are not authorized persone!!')->withInput($request->all());
		        }
			}

			return view('admin/pages/login');
		}

		

		public function login_process(Request $request)
		{

					        
		}

		



	}