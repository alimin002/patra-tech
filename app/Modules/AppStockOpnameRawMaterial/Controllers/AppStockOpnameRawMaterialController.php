<?php

namespace App\Modules\AppStockOpnameRawMaterial\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\AppStockOpnameRawMaterial\Models\AppStockOpnameRawMaterial;
use App\Modules\AppStockOpnameRawMaterialDetail\Models\AppStockOpnameRawMaterialDetail;
use Session;
use app\Providers\Common;
Use Redirect;
Use DB;
class AppStockOpnameRawMaterialController extends Controller
{
			 //direct access guard
		public function __construct(Request $request) 
		{
			 if ($request->session()->has('session_login')==false) {
						return Redirect::to('logout')->send();
			 }
		}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
				$data= AppStockOpnameRawMaterial::paginate(3);
					//print_r($data); die();
				$descending_data = AppStockOpnameRawMaterial::orderBy("app_stock_opname_raw_material_id","desc")->first();	
				//print_r($descending_data);
				$app_stock_opname_raw_material_id_desc = $descending_data["app_stock_opname_raw_material_id"];
				
				$descending_data = AppStockOpnameRawMaterial::orderBy("app_stock_opname_raw_material_id","desc")->first();	
				$app_stock_opname_raw_material_id_desc = $descending_data["app_stock_opname_raw_material_id"];
				
				//this command used in just in create popup
				$number_stock_opname=Common::generateTransactionNumber("STKOPNM",$app_stock_opname_raw_material_id_desc);
        return view("AppStockOpnameRawMaterial::index")
								->with("number_stock_opname",$number_stock_opname)
								->with("data",$data);
    }
		
			//save purchase
			public function save(Request $request){
			$purchase=	array("number_stock_opname"		=>$request["number_stock_opname"],											 
												"stock_opname_date"			=>date("Y-m-d"),												
												"warehouse_supervisor"			=>$request["warehouse_supervisor"]);
								
			 $save=AppStockOpnameRawMaterial::insert($purchase);				
				if($save==1){
					$message="Save data successful";
				}else{
					$message="save data failed";
				}
				
				return Redirect::to('stock_opname_raw_material')
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
    public function edit($app_stock_opname_raw_material_id)
    {
				 //
				$data = AppStockOpnameRawMaterial::where('app_stock_opname_raw_material.app_stock_opname_raw_material_id', '=',$app_stock_opname_raw_material_id)->first();
				echo json_encode($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
				$app_stock_opname_raw_material_id = $request->input("app_stock_opname_raw_material_id");
				$stock_opname=array("warehouse_supervisor" =>$request["warehouse_supervisor"]);												   
			  $update=AppStockOpnameRawMaterial::where("app_stock_opname_raw_material_id","=",$app_stock_opname_raw_material_id)
													->update($stock_opname);																		
				if($update==1){
					$message="update data successful";
				}else{
					$message="update data failed";
				}
				
				return Redirect::to('stock_opname_raw_material')
								->with("message",$message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
      /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
				 //if delete sales or sales detail failed execution will be roll back and process delete terminated 
				 DB::beginTransaction();
							try {
									 $app_stock_opname_raw_material_id = $request->input("app_stock_opname_raw_material_id");
									 AppStockOpnameRawMaterial::where('app_stock_opname_raw_material_id', '=',$app_stock_opname_raw_material_id)
																			 ->delete();
									 $app_stock_opname_raw_material_id = $request->input("app_stock_opname_raw_material_id");
									 AppStockOpnameRawMaterialDetail::where('app_stock_opname_raw_material_id', '=',$app_stock_opname_raw_material_id)
																			 ->delete();	
									DB::commit();
								 $message="Delete data successfull";
							} catch (\Exception $e){
								DB::rollback();
								$message="Input data Item Failed, please try again<br>Developer message:".$e;
						}
						return Redirect::to('stock_opname_raw_material')
													->with("message",$message);
				
				
    }
}
