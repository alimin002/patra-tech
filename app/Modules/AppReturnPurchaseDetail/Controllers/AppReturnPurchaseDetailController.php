<?php

namespace App\Modules\AppReturnPurchaseDetail\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\AppReturnPurchase\Models\AppReturnPurchase;
use App\Modules\AppReturnPurchaseDetail\Models\AppReturnPurchaseDetail;
use App\Modules\AppStockRawMaterial\Models\AppStockRawMaterial;
use app\Providers\Common;
use app\Providers\Lookup;
use DB;
Use Redirect;
use PDF;
use Session;

class AppReturnPurchaseDetailController extends Controller
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
				$app_return_purchase_id=$_GET["app_return_purchase_id"];
				$data_header=$data = AppReturnPurchase::select('app_return_purchase.*','app_suplier.*',"app_suplier.name as suplier_name")																
																					->leftJoin('app_suplier','app_suplier.app_suplier_id','=','app_return_purchase.app_suplier_id')
																					->where('app_return_purchase.app_return_purchase_id', '=',$app_return_purchase_id)
																					->first();							
				$data_detail=AppReturnPurchaseDetail::select('app_return_purchase_detail.*','app_return_purchase.*','app_raw_material.*',"app_raw_material.name as raw_material_name")
																					->leftJoin('app_return_purchase','app_return_purchase.app_return_purchase_id','=','app_return_purchase_detail.app_return_purchase_id')
																					->leftJoin('app_raw_material','app_raw_material.app_raw_material_id','=','app_return_purchase_detail.app_raw_material_id')
																					->where('app_return_purchase_detail.app_return_purchase_id', '=',$app_return_purchase_id)->get();
				$lookup_raw_material	= Lookup::getLookupRawMaterial();	
				$json_return_purchase				= json_decode(json_encode($data_detail),true);
				$json_return_purchase=json_encode($json_return_purchase);
				       
        return view("AppReturnPurchaseDetail::index")
								->with("lookup_raw_material",$lookup_raw_material)
								->with("json_return_purchase",$json_return_purchase)
								->with("data_header",$data_header);
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
    public function edit($id)
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
		
			//check if item sales exists
		public function checkItemExists($app_return_purchase_id){
				$num_rows=AppReturnPurchaseDetail::where('app_return_purchase_detail.app_return_purchase_id', '=',$app_return_purchase_id)->count();
				
				if($num_rows > 0){
					return 1;
				}else{
					return 0;
				}
		}
		
			public function save(Request $request){
			$data_return_purchase_item = json_decode($request->input("data_return_purchase_item"),true);
			
			$app_return_purchase_id			= $request["app_return_purchase_id_in_detail"];
			$app_raw_material_id	= $request["app_raw_material_id"];
			$qty									= $request["qty"];
			
				if($this->checkItemExists($app_return_purchase_id)==1){
					 $delete = AppReturnPurchaseDetail::where('app_return_purchase_id', '=',$app_return_purchase_id)
																										->delete();
						
				}

						 DB::beginTransaction();
							try {
									foreach($data_return_purchase_item as $key =>$values)
									{
										//saving item purchase
										$app_return_purchase_id		 =$app_return_purchase_id;
										$app_raw_material_id =$values["app_raw_material_id"];
										$qty								 =$values["qty"];
										$sub_total					 =$values["sub_total"];
										
										$return_purchase=	array("app_return_purchase_id"			=>$app_return_purchase_id,
																						"app_raw_material_id"	=>$app_raw_material_id,
																						"qty"									=>$qty,
																						"sub_total"						=>Common::removeCommas($sub_total));
																																			
										$save=AppReturnPurchaseDetail::insertGetId($return_purchase);
										
										//update stock
										$stock_out=$this->stockOut($app_raw_material_id,$qty);										
									}
									
									
									
									DB::commit();
									$message="Input data return purchase Succes";
							} catch (\Exception $e){
								DB::rollback();
								$message="Input data Item Failed, please try again<br>Developer message:".$e;
						}
							return Redirect::to('return_purchase_detail?app_return_purchase_id='.$app_return_purchase_id)
												->with("message",$message);			
		}
		
		public function stockOut($app_raw_material_id,$num_of_entri){
			$data					 = AppStockRawMaterial::where('app_raw_material_id','=',$app_raw_material_id)->first();
			$current_stock =$data["stock"];
			$new_stock		 =$current_stock - $num_of_entri;//num_of_entri= entri from purchase and other factor
			//return $new_stock;
			$new_stock_raw_material=array(
																"stock"=>$new_stock
															);
			$update=AppStockRawMaterial::where("app_raw_material_id","=",$app_raw_material_id)
																	 ->update($new_stock_raw_material);																		
				return $update;
			
		}
		
		function get_header($app_return_purchase_id){
			$data_header=$data =  AppReturnPurchase::select('app_return_purchase.*','app_suplier.*',"app_suplier.name as suplier_name")																
																					->leftJoin('app_suplier','app_suplier.app_suplier_id','=','app_return_purchase.app_suplier_id')
																					->where('app_return_purchase.app_return_purchase_id', '=',$app_return_purchase_id)
																					->first();						
																					return $data_header;
		}
		
		function get_detail($app_return_purchase_id){
			$data_detail=AppReturnPurchaseDetail::select('app_return_purchase_detail.*','app_return_purchase.*','app_raw_material.*',"app_raw_material.name as raw_material_name")
																					->leftJoin('app_return_purchase','app_return_purchase.app_return_purchase_id','=','app_return_purchase_detail.app_return_purchase_id')
																					->leftJoin('app_raw_material','app_raw_material.app_raw_material_id','=','app_return_purchase_detail.app_raw_material_id')
																					->where('app_return_purchase_detail.app_return_purchase_id', '=',$app_return_purchase_id)->get();
			return $data_detail;
		}
		
		public function download_pdf($app_return_purchase_id){
			
			$data_header=$this->get_header($app_return_purchase_id);
			$data_detail=$this->get_detail($app_return_purchase_id);
			//print_r($data_detail); die();
			$data=array("data_header"=>$data_header,
									"data_detail"=>$data_detail
			);
				$pdf=PDF::loadView('AppReturnPurchaseDetail::return_purchase_pdf', compact('data'));
				return $pdf->download('return_purchase_pdf.pdf');
		}
		
		
}
