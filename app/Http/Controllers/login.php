<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\sys_roles;
use App\sys_users;
use Redirect;
use Session;
use Crypt;
class login extends Controller
{
    //
		public function __construct(Request $request)
    {
			/*
       if ($request->session()->has('session_login')==false) {
						return Redirect::to('login');
			 }
			*/			 
    }
		
		public function displayLogin(Request $request ){
				if ($request->session()->has('session_login')==false) {
					$sys_roles = sys_roles::all();
					//print_r($sys_roles); die();
					return view('guard')->with("sys_roles",$sys_roles);
				}else{
					return view('Dashboard::index');
				}
		}
		
		public function getUserData($username){
			$data=sys_users::where('username','=',$username)->first();
			return $data;
		}
		
		public function displayHome(Request $request){ 
				$data_user		= $this->getUserData($request->input('username'));				
				$username 		= $data_user["username"];
				$password 		= $data_user["password"];
				$occupation		= $data_user["occupation"];
				$role					= $data_user["sys_roles_id"];
				$message  ="";
				if($data_user !=""){
					if($username == $request->input('username')){
						 if($password == $request->input('password') and $username == $request->input('username')){
							 $request->session()->put('session_login',array('username'=>$username, 							 
																												      'occupation'=>$occupation, 
																															'role'=>$role 
																											 ));
								return view('Dashboard::index');
						 }else{	
							$message ="Email or password is incorrect";
							return Redirect::to('')->with('message', $message);
						 }
					}else{
							$message ="Email or password is incorrect, <br/>please try again";
							
							return Redirect::to('')->with('message', $message);
					}
				}else{
					 $message ="Email or password is incorrect";					
						return Redirect::to('')->with('message', $message);
				}
				
				 $request->session()->put('session_login',array('username'=>$username, 							 
																												      'occupation'=>$occupation, 
																															'role'=>$role 
																											 ));
		}		
			
		public function doLogout(Request $request){
				$request->session()->forget('session_login');
				$request->session()->forget('session_message');
				return Redirect::to('');
		}
}
