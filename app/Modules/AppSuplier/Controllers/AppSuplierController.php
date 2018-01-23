<?php

namespace App\Modules\AppSuplier\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\AppSuplier\Models\AppSuplier;
use Illuminate\Pagination\Paginator;
Use Redirect;
class AppSuplierController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
		 
		public function __construct(Request $request) 
		{
			//guard system from direct access
       if ($request->session()->has('session_login')==false) {			
						return Redirect::to('')->send();
			 }
		}
    public function index(Request $request)
    {
				
				
				if($request->input("keyword")!= null){
					$data=AppSuplier::where('app_suplier.name', 'LIKE','%'.$keyword.'%')
											->paginate(3);
				}else{
					$data= AppSuplier::paginate(3);
				}
        return view("AppSuplier::index")
								->with("data",$data);
    }
		
		public function save(Request $request){
				$suplier=array("name"							=>$request["name"],
											 "addres"						=>$request["addres"],
									     "telephone_number"	=>$request["telephone_number"]);
								
			 $save=AppSuplier::insert($suplier);				
				if($save==1){
					$message="Save data successful";
				}else{
					$message="save data failed";
				}
				
				return Redirect::to('suplier')
								->with("message",$message);
		}
		
		public function edit($app_suplier_id)
    {
        //
				$data = AppSuplier::where('app_suplier.app_suplier_id', '=',$app_suplier_id)->first();
				echo json_encode($data);
    }
		
		public function update(Request $request)
    {
        //
				 $app_suplier_id															= $request->input("app_suplier_id");
				 $suplier=array( "name"												=>$request->input("name"),
												 "addres"											=>$request->input("addres"),
												 "telephone_number"						=>$request->input("telephone_number"));
				 $app_suplier_id=$request['app_suplier_id'];
				 $update = AppSuplier::where('app_suplier_id', '=',$app_suplier_id)
																				->update($suplier);
				 
				 if($update==true){
					 $message="Update Successfull";
				 }else{
					 $message="Update failed";
				 }
				 return Redirect::to('suplier')
								->with("message",$message);
				 
    }

		public function destroy(Request $request)
    {
        //
				 $app_suplier_id=$request['app_suplier_id'];
				 $delete = AppSuplier::where('app_suplier_id', '=',$app_suplier_id)->delete();
				 if($delete ==true){
					 $message="Delete data successfull";
				 }else{
					 $message="Delete data failed";
				 }
				 return Redirect::to('suplier')
								->with("message",$message);
				 
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   
}
