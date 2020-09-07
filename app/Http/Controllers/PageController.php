<?php
	
	namespace App\Http\Controllers;
	

	use Illuminate\Http\Request;
	use App\User;

use App\Blog;
	use Session;
	use DB;
	use Mail; 
	use Hash; 
	use App\Category;
	use Illuminate\Support\Facades\Auth; 
	use Illuminate\Html\HtmlFacade; 
	use Illuminate\Support\Facades\Validator;
	use Illuminate\Support\Facades\Redirect;

	class PageController extends Controller
	{

		// public function __construct(){
		// 	$this->middleware(function ($request, $next) {
			      
				
		// 			if(Auth::check()){
	 //    	    		if(!Auth::user()->isUser()){

		// 					return redirect('login');
		// 				}
	 //    	    	}else{

	 //    	    		return redirect('login');
		// 		       }
		// 	        return $next($request);
	    	    	
		// 	 });
			
	      
	    // }
		
		public function welcome(){

			if(isset($_GET['cat']))
			{
				 $blog = Blog::where('sr_status', 0)->where('category',$_GET['cat'])->get();

			}else{
			 $blog = Blog::where('sr_status', 0)->get();


			}
				

			 			 $category = Category::where('sr_status',0)->get();


			return view('frontend/pages/welcome',compact('blog','category'));
			
		}


	





	

	}