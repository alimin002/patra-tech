<?php

namespace App\Modules\AppStockRawMaterial\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\AppStockRawMaterial\Models\AppStockRawMaterial;
use app\Providers\Lookup;
use Illuminate\Pagination\Paginator;
Use Redirect;
class AppStockRawMaterialController extends Controller
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
					$data=AppStockRawMaterial::select('app_raw_material.*','app_stock_raw_material.*','app_stock_raw_material.description as stock_description')
																		->leftJoin('app_raw_material', 'app_raw_material.app_raw_material_id', '=', 'app_stock_raw_material.app_raw_material_id')
																		->where('app_stock_raw_material.description', 'LIKE','%'.$keyword.'%')
																		->orderBy('app_stock_raw_material.app_stock_raw_material_id', 'desc')
																		->paginate(3);
				}else{
					$data= AppStockRawMaterial::select('app_raw_material.*','app_stock_raw_material.*','app_stock_raw_material.description as stock_description')
																		->leftJoin('app_raw_material', 'app_raw_material.app_raw_material_id', '=', 'app_stock_raw_material.app_raw_material_id')
																		->orderBy('app_stock_raw_material.app_stock_raw_material_id', 'desc')
																		->paginate(3);
				}
				$lookup_raw_material=Lookup::getLookupRawMaterial();
        return view("AppStockRawMaterial::index")
								->with("lookup_raw_material",$lookup_raw_material)
								->with("data",$data);
    }
		
		public function save(Request $request)
		{
				$stock_raw_material=array("app_raw_material_id" =>$request["app_raw_material_id"],
																	"stock"							 	=>$request["stock"],
																	"description"				 	=>$request["description"]);
								
			  $save=AppStockRawMaterial::insert($stock_raw_material);				
				if($save==1){
					$message="Save data successful";
				}else{
					$message="save data failed";
				}
				
				return Redirect::to('stock_raw_material')
								->with("message",$message);
		}
		
		/**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($app_stock_raw_material_id)
    {
        //
				$data=AppStockRawMaterial::select('app_raw_material.*','app_stock_raw_material.*',				 		     'app_stock_raw_material.description as stock_description')
																		->leftJoin('app_raw_material', 'app_raw_material.app_raw_material_id', '=', 'app_stock_raw_material.app_raw_material_id')
																		->where('app_stock_raw_material.app_stock_raw_material_id', '=',$app_stock_raw_material_id)
																		->first();
				echo json_encode($data);
				
    }
		
		public function stockOut(){
			
		}
		
    public function update(Request $request)
    {
        //
				$app_stock_raw_material_id = $request->input("app_stock_raw_material_id");
				$stock_raw_material=array("app_raw_material_id" =>$request["app_raw_material_id"],
																	"stock"							 	=>$request["stock"],
																	"description"				 	=>$request["description"]);
								
			  $update=AppStockRawMaterial::where("app_stock_raw_material_id","=",$app_stock_raw_material_id)
																		 ->update($stock_raw_material);																		
				if($update==1){
					$message="update data successful";
				}else{
					$message="update data failed";
				}
				
				return Redirect::to('stock_raw_material')
								->with("message",$message);
    }
		
		public function renderLookupStockRawMaterial(){
			$lookup_raw_material = Lookup::getLookupRawMaterial();
			echo json_encode($lookup_raw_material);
		}	
		 
    public function destroy(Request $request)
    {
				//
				 $app_stock_raw_material_id = $request->input("app_stock_raw_material_id");
				 $delete = AppStockRawMaterial::where('app_stock_raw_material_id', '=',$app_stock_raw_material_id)
																									->delete();
				 if($delete ==true){
					 $message="Delete data successfull";
				 }else{
					 $message="Delete data failed";
				 }
				 return Redirect::to('stock_raw_material')
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

}  


   