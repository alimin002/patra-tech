<?php

namespace App\Modules\AppRawMaterial\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
Use Redirect;
use Session;
use app\Providers\Lookup;
class AppRawMaterialController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
		public function __construct(Request $request) 
		{
       if ($request->session()->has('session_login')==false) {
						return Redirect::to('logout')->send();
			 }
		}
		 
    public function index(Request $request)
    {
				if($request->input("keyword")!= null){
					$data=getRawMaterialByKeyword($request->input("keyword"));
				}else{
					$data=getRawMaterialAll();
				
				}
				$lookup_suplier	=Lookup::getLookupSuplier();
				$lookup_category=Lookup::getLookupCategory();
        return view("AppRawMaterial::index")
								->with("data",$data)
								->with("lookup_suplier",$lookup_suplier)
								->with("lookup_category",$lookup_category);
    }
		
		public function save(Request $request){
			$save_data=doSave($request->all());
			if($save_data==1){
				$message="Save data successful";
			}else{
				$message="save data failed";
			}
			//return redirect('raw_material',["message"=>$message]);
			//return Redirect::route('raw_material')->with('message',$message);	
			return Redirect::to('raw_material')->with('message', $message);
		}
		public function edit($params)
    {
				$data=getRawMaterialByAppRawMaterialId($params);
				return json_encode($data);
    }
		public function destroy(Request $request)
    {
        //
				$delete=doDelete($request->all());
				if($delete==true){
						$message="Delete data successfull";
				}else{
						$message="Delete data failed, please try again!";
				}
				return Redirect::to('raw_material')->with('message', $message);
    }
		
		public function renderLookupSuplier(){
			$lookup_suplier = Lookup::getLookupSuplier();
			echo json_encode($lookup_suplier);
		}	

		public function renderLookupCategory(){
			$lookup_category = Lookup::getLookupCategory();
			echo json_encode($lookup_category);
		}
		
		public function update(Request $request)
    {
        $update=doUpdate($request->all());
				if($update == true){
					$message="Update data successfull";
				}else{
					$message="Update data failed!";
				}
				return Redirect::to('raw_material')->with('message', $message);
    }
		
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //echo $params;
				
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
