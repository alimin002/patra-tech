<?php

namespace App\Modules\SysUsers\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\SysUsers\Models\SysUsers;
use Illuminate\Pagination\Paginator;
Use Redirect;
use app\Providers\Lookup;
class SysUsersController extends Controller
{

		public function __construct(Request $request) 
		{
			//guard system from direct access
       if ($request->session()->has('session_login')==false) {			
						return Redirect::to('')->send();
			 }
		}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {									
				if($request->input("keyword")!= null){
					$keyword=$request->input("keyword");
					$data=SysUsers::select("sys_users.*","sys_roles.*","sys_roles.name as role_name")
											->leftJoin('sys_roles','sys_roles.sys_roles_id','=','sys_users.sys_roles_id')
											->where('sys_users.username', 'LIKE','%'.$keyword.'%')
											->orderBy('sys_users.sys_user_id', 'desc')
											->paginate(3);
				}else{
					$data= SysUsers::select("sys_users.*","sys_roles.*","sys_roles.name as role_name")
														->leftJoin('sys_roles','sys_roles.sys_roles_id','=','sys_users.sys_roles_id')
														->orderBy('sys_users.sys_user_id', 'desc')
														->paginate(3);
				}
				$lookup_roles=Lookup::getLookupRoles();
				
        return view("SysUsers::index")
									->with("lookup_roles",$lookup_roles)
									->with("data",$data);
    }
		
		public function save(Request $request){
				$users=array("username"				=>$request["username"],
										 "sys_roles_id"		=>$request["sys_roles_id"]);
								
			 $save=SysUsers::insert($users);				
				if($save==1){
					$message="Save data successful";
				}else{
					$message="save data failed";
				}
				
				return Redirect::to('sys_user')
								->with("message",$message);
		}
		public function edit($sys_user_id)
    {
        //
				$data = SysUsers::select("sys_users.*","sys_roles.*","sys_roles.name as role_name")
								->leftJoin("sys_roles","sys_roles.sys_roles_id","=","sys_users.sys_roles_id")
								->where('sys_users.sys_user_id', '=',$sys_user_id)->first();
								echo json_encode($data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
