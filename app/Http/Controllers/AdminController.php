<?php
	
	namespace App\Http\Controllers;
	

	use Illuminate\Http\Request;
	use App\User;
	use App\Category;
	
	use App\Blog;
	

	use Session;
	use DB;
	use Mail; 
	use Hash; 
	use Illuminate\Support\Facades\Auth; 
	use Illuminate\Html\HtmlFacade; 
	use Illuminate\Support\Facades\Validator;
	use Illuminate\Support\Facades\Redirect;
	
use App\group_details_permission;


	class AdminController extends Controller
	{
		public function __construct(){
			$this->middleware(function ($request, $next) {
			        //$this->user= Auth::user()->isAdmin();
					//dd($this->user);

					if(Auth::check()){
	    	    		if(!Auth::user()->isAdmin()){
							return redirect('login');
						}
	    	    	}else{
	    	    		return redirect('login');
				       }
			        return $next($request);
	    	    	
			 });
			
	      
	    }
		
		public function welcome(){


				$query = Blog::query();
			$query->select('blogs.*');
			$query->where('sr_status',0);
			
			$data = $query->paginate(Config('constants.PER_PAGE_LIMIT'));
	

			return view('admin/pages/welcome',compact('data'));

		}



	public function blog_add(Request $request){
		    
		    
		
            if ($request->isMethod('post'))
			{
				$input = $request->except('_token','profile_pic');
				

				$validator = Validator::make($request->all(), [

						'sr_name' => 'required'

			     		
		        ]);

		        if ($validator->fails()) {
		        	return Redirect::back()->withErrors($validator)->withInput($input);
		        }
			  
          

		       	$input['prep_emp'] = user_id();
            	$input['prep_date'] = date('Y-m-d') ;

                Blog::create($input); 

				return redirect()->back()->withSuccess('Blog Created Successfully!');
			}

			
           $category = Category::where('sr_status',0)->get();

			return view('admin/pages/add',compact('category'));
              
              

			
		}




	public function blog_edit(Request $request,$id){
		    
		    

			$data = Blog::find($id);
			
			if ($request->isMethod('post'))
			{
				$input = $request->except('_token');
				
		        $validator = Validator::make($request->all(), [
			     		'name' => 'required'
			        
			            
		        ]);
		      
		     
            	$input['mod_emp'] = user_id();
            	$input['mod_date'] = date('Y-m-d') ;
				Blog::where('id',$data->id)->update($input);
				return redirect()->back()->withSuccess('Blog Updated Successfully!');
			}

			 $category = Category::where('sr_status',0)->get();
			
			return view('admin/pages/edit',compact('data','category'));
			
          
			
			
		}





		public function blog_view(Request $request,$id){
		    
		   
		    
			$data = Blog::select('blogs.*')
					->where('blogs.id',$id)
					->first();

		
		
			

			return view('admin/pages/view',compact('data'));
			
           
		}


	public function blog_delete(Request $request,$id){
		    
		      
		 
			$data = Blog::find($id);
			if(!$data){
				return redirect('/')->with('errormessage', 'Not a valid command!!');
			}
			
			Blog::where('id', $data->id)->update(['sr_status' => 1,'reject_date' => date('Y-m-d'),'reject_emp' => user_id()]);
			
			return redirect('/')->with('success', 'Blog Deleted Successfully');
			
          
            
			
		}








		public function user(Request $request){
		    
		    	  

			
			$query = User::query();
			$query->orderBy('id', 'desc');
			if(!empty($request->get('email')) ){
				$query->where('email', 'LIKE', '%'. $request->get('email') .'%');
			}
			if(!empty($request->get('name')) ){
				$query->where('name', 'LIKE', '%'. $request->get('name') .'%');
			}
			$query->where('sr_status', 0);

			$data = $query->paginate(Config('constants.PER_PAGE_LIMIT'));
			$search = $request->except('_token');
			return view('admin/pages/user/list',compact('data' , 'search'))->withInput($request->except('_token'));
			
          
		}

		public function user_add(Request $request){
		    
		    
		
            if ($request->isMethod('post'))
			{
				$input = $request->except('_token','profile_pic');
				
				
			
				$validator = Validator::make($request->all(), [
			     		'email' => 'required|email|unique:users,email,1,sr_status',
			            'profile_pic' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
			            'password' => 'required|min:6',
		        ]);
		        if ($validator->fails()) {
		        	return Redirect::back()->withErrors($validator)->withInput($input);
		        }
			  
            	$file = $request->file('profile_pic');
            	if($file){
            		$file_name=$file->getClientOriginalName();
	             	$extension = pathinfo($file_name, PATHINFO_EXTENSION);
			    	$filenamesave =  time().'.'.$extension;
	                $file->move(public_path().'/upload/image/', $filenamesave);  
	                $input['profile_pic'] = $filenamesave;
            	}
             	$input['password'] = Hash::make($input['password']);
             	$user_data = User::where('email',$input['email'])->first();
             	if($user_data){
		       		if($user_data->sr_status == 1){
		       			$input['sr_status'] = 0;
		       			User::where('id',$user_data->id)->update($input);
		       			return redirect()->back()->withSuccess('User Added Successfully!');
		       		}
		       	}
		       	$input['prep_emp'] = user_id();
            	$input['prep_date'] = date('Y-m-d') ;
                User::create($input); 

				return redirect()->back()->withSuccess('Admin User Added Successfully!');
			}

			
			return view('admin/pages/user/add');
              
              
        
              
          
		   
			
		}

		
		public function user_edit(Request $request,$id){
		    
		    
		
		    
			$data = User::find($id);
			
			if ($request->isMethod('post'))
			{
				$input = $request->except('_token');
				
		        $validator = Validator::make($request->all(), [
			     		'email' => 'required|email|unique:users,email,'.$data->id
			            
		        ]);

		        if(!empty($input['password'])){
            		$input['password'] = Hash::make($input['password']);
            	}else{
            		$input['password'] = $data->password;
            	}

		        if ($validator->fails()) {
		        	return Redirect::back()->withErrors($validator)->withInput($input);
		        }
			
            	$input['mod_emp'] = user_id();
            	$input['mod_date'] = date('Y-m-d');


				User::where('id',$data->id)->update($input);
				return redirect()->back()->withSuccess('Admin User Updated Successfully!');
			}
			
			return view('admin/pages/user/edit',compact('data'));
			
			
			
			
		}

		public function user_delete(Request $request,$id){
		    
		      
		  
			
			$data = User::find($id);
			if(!$data){
				return redirect('user')->with('errormessage', 'Not a valid command!!');
			}
			
			User::where('id', $data->id)->update(['sr_status' => 1,'cancel_date' => date('Y-m-d'),'cancel_emp' => user_id()]);
			
			return redirect('user')->with('success', 'Admin User Deleted Successfully');
			
          
            
			
		}





		
	

public function category(Request $request){
		    
		    	  

			
			$query = Category::query();

			$query->orderBy('id', 'desc');

			
			$query->where('sr_status', 0);

			$data = $query->paginate(Config('constants.PER_PAGE_LIMIT'));
			$search = $request->except('_token');
			return view('admin/pages/category/list',compact('data'))->withInput($request->except('_token'));
			
          
		}

		public function category_add(Request $request){
		    
		    
		
            if ($request->isMethod('post'))
			{
				$input = $request->except('_token');
				
				
			
				$validator = Validator::make($request->all(), [
			     		'sr_name' => 'required',
			           
		        ]);


		        if ($validator->fails()) {
		        	return Redirect::back()->withErrors($validator)->withInput($input);
		        }
			  
            
             
		       	$input['prep_emp'] = user_id();
            	$input['prep_date'] = date('Y-m-d') ;
                Category::create($input); 

				return redirect()->back()->withSuccess('Category Added Successfully!');
			}

			
			return view('admin/pages/category/add');
              
              
        
              
          
		   
			
		}

		
		public function category_edit(Request $request,$id){
		    
		    
		
		    
			$data = Category::find($id);
			
			if ($request->isMethod('post'))
			{
				$input = $request->except('_token');
				
		        $validator = Validator::make($request->all(), [
			     		'sr_name' => 'required'
			            
		        ]);

		        

		        if ($validator->fails()) {
		        	return Redirect::back()->withErrors($validator)->withInput($input);
		        }
			
            	$input['mod_emp'] = user_id();
            	$input['mod_date'] = date('Y-m-d');


				Category::where('id',$data->id)->update($input);
				return redirect()->back()->withSuccess('Category Updated Successfully!');
			}
			
			return view('admin/pages/category/edit',compact('data'));
			
			
			
			
		}

		public function category_delete(Request $request,$id){
		    
		      
		  
			
			$data = Category::find($id);
			if(!$data){
				return redirect('category')->with('errormessage', 'Not a valid command!!');
			}
			
			Category::where('id', $data->id)->update(['sr_status' => 1,'cancel_date' => date('Y-m-d'),'cancel_emp' => user_id()]);
			
			return redirect('user')->with('success', 'Category Deleted Successfully');
			
          
            
			
		}













	}
