<?php

namespace App\Modules\AppPurchaseDetail\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\AppPurchaseDetail\Models\AppPurchaseDetail;
use App\Modules\AppPurchase\Models\AppPurchase;
use App\Modules\AppRawMaterial\Models\AppRawMaterial;
use App\Modules\AppStockRawMaterial\Models\AppStockRawMaterial;
use app\Providers\Lookup;
use app\Providers\Common;
use Illuminate\Pagination\Paginator;
Use Redirect;
use DB;
use PDF;
class AppPurchaseDetailController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
				//$data_header=array("purchase_number"=>"","suplier_name"=>"","purchase_date"=>"");
				//$data_detail=array();
				$app_purchase_id=$_GET["purchase_id"];
				$data_header=$data = AppPurchase::select('app_suplier.*','app_purchase.*','app_purchase.description as description','app_suplier.name as suplier_name')
																					->leftJoin('app_suplier', 'app_suplier.app_suplier_id','=', 'app_purchase.app_suplier_id')
																					->where('app_purchase.app_purchase_id', '=',$app_purchase_id)->first();
																					
				$data_detail=AppPurchaseDetail::select('app_purchase_detail.*','app_purchase.*','app_raw_material.*',"app_raw_material.name as raw_material_name")
																					->leftJoin('app_purchase','app_purchase.app_purchase_id','=', 	 'app_purchase_detail.app_purchase_id')
																					->leftJoin('app_raw_material','app_raw_material.app_raw_material_id','=', 	 'app_purchase_detail.app_raw_material_id')
																					->where('app_purchase_detail.app_purchase_id', '=',$app_purchase_id)->get();
			 $lookup_suplier 			= Lookup::getLookupSuplier();
			 $lookup_raw_material	= Lookup::getLookupRawMaterial();	
			 $data_purchase				= json_decode(json_encode($data_detail),true);
			 $json_purchase=json_encode($data_purchase);
        return view("AppPurchaseDetail::index")
							->with("lookup_suplier",$lookup_suplier)
							->with("lookup_raw_material",$lookup_raw_material)
							->with("data_header",$data_header)
							->with("data_purchase",$data_purchase)
							->with("json_purchase",$json_purchase)
							->with("data_detail",$data_detail);
    }
		
		public function update_header(Request $request)
    {
        //
				//echo 1; die();
				$app_purchase_id = $request->input("app_purchase_id");
				$purchase=array("app_suplier_id" =>$request["app_suplier_id"],
												"purchase_date"  =>date("Y-m-d"),
												"description"    =>$request["description"]);
								
			  $update=AppPurchase::where("app_purchase_id","=",$app_purchase_id)
																		 ->update($purchase);																		
				if($update==1){
					$message="update header successful";
				}else{
					$message="update header failed";
				}
				
				return Redirect::to('purchase_detail?purchase_id='.$app_purchase_id)
												->with("message",$message);
    }
		
		public function renderLookupSuplier(){
			$lookup_suplier = Lookup::getLookupSuplier();
			echo json_encode($lookup_suplier);
		}	
		
		public function renderLookupRawMaterial(){
			$lookup_raw_material = Lookup::getLookupRawMaterial();
			echo json_encode($lookup_raw_material);
		}	
		//check if item purchase exists
		public function checkItemExists($app_purchase_id){
				$num_rows=AppPurchaseDetail::where('app_purchase_detail.app_purchase_id', '=',$app_purchase_id)->count();
				
				if($num_rows > 0){
					return 1;
				}else{
					return 0;
				}
		}
		
		public function save(Request $request)
		{ 
		  
			
			$data_purchase_item = json_decode($request->input("data_purchase_item"),true);
			
			$app_purchase_id			= $request["app_purchase_idx"];
			$app_raw_material_id	= $request["app_raw_material_id"];
			$qty									= $request["qty"];
			
				if($this->checkItemExists($app_purchase_id)==1){
					 $delete = AppPurchaseDetail::where('app_purchase_id', '=',$app_purchase_id)
																										->delete();
					//if deleted item exists go to there
					if($request["deleted_item"]!=""){
							$deleted_item=json_decode($request->input("deleted_item"),true);
							
							foreach($deleted_item as $key=>$value){
								$this->stockOut($value["app_raw_material_id"],$value["qty"]);
							}
					}
					
						
				}

						 DB::beginTransaction();
							try {
									foreach($data_purchase_item as $key =>$values)
									{
										//saving item purchase
										$app_purchase_id		 =$app_purchase_id;
										$app_raw_material_id =$values["app_raw_material_id"];
										$qty								 =$values["qty"];
										$sub_total					 =$values["sub_total"];
										
										$purchase_detail=	array("app_purchase_id"			=>$app_purchase_id,
																						"app_raw_material_id"	=>$app_raw_material_id,
																						"qty"									=>$qty,
																						"sub_total"						=>$sub_total);
																																			
										$save=AppPurchaseDetail::insertGetId($purchase_detail);
										
										//update stock to 0 
										if($this->checkItemExists($app_purchase_id)==1){
												if(isset($values["old_qty"])){
													//echo 1; die();
													$old_qty	 =$values["old_qty"];
													$stock_in	 =$this->stockInOnUpdateItem($app_raw_material_id,$old_qty,$qty);
												}
												else{
													$stock_in=$this->stockIn($app_raw_material_id,$qty);
												}
												
										}else{
												$stock_in=$this->stockIn($app_raw_material_id,$qty);
										}
																			
									}
									
									
									
									DB::commit();
									$message="Input data Purchase Item Succes";
							} catch (\Exception $e){
								DB::rollback();
								$message="Input data Item Failed, please try again<br>Developer message:".$e;
						}
							return Redirect::to('purchase_detail?purchase_id='.$app_purchase_id)
												->with("message",$message);			
				
		}
		
		public function stockIn($app_raw_material_id,$num_of_entri){
			$data					 = AppStockRawMaterial::where('app_raw_material_id','=',$app_raw_material_id)->first();
			$current_stock =$data["stock"];
			$new_stock		 =$current_stock + $num_of_entri;//num_of_entri= entri from purchase and other factor
			//return $new_stock;
			$new_stock_raw_material=array(
																"stock"=>$new_stock
															);
			$update=AppStockRawMaterial::where("app_raw_material_id","=",$app_raw_material_id)
																	 ->update($new_stock_raw_material);																		
				return $update;
			
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
		
		public function stockInOnUpdateItem($app_raw_material_id,$old_qty,$num_of_entri){
			$data					 = AppStockRawMaterial::where('app_raw_material_id','=',$app_raw_material_id)->first();
			$current_stock =$data["stock"];
			//step back to old stock
			$current_stock	 =$current_stock-$old_qty;
			
			//count new stock
			$new_stock		 =$current_stock + $num_of_entri;//num_of_entri= entri from purchase and other factor
			//return $new_stock;
			$new_stock_raw_material=array(
																"stock"=>$new_stock
															);
			$update=AppStockRawMaterial::where("app_raw_material_id","=",$app_raw_material_id)
																	 ->update($new_stock_raw_material);																		
				return $update;
			
		}
		
		public function edit($app_purchase_detail_id)
    {
        //
				$data = AppPurchaseDetail::select('app_purchase_detail.*','app_purchase.*','app_raw_material.*',"app_raw_material.name as raw_material_name")
																	->leftJoin('app_purchase','app_purchase.app_purchase_id','=', 	 'app_purchase_detail.app_purchase_id')
																	->leftJoin('app_raw_material','app_raw_material.app_raw_material_id','=', 	 'app_purchase_detail.app_raw_material_id')
																	->where('app_purchase_detail.app_purchase_detail_id', '=',$app_purchase_detail_id)
																	->first();
																	
				DB::beginTransaction();
				try {
						$save=AppPurchaseDetail::insertGetId($purchase_detail);
						$stock_in=$this->stockIn($app_raw_material_id,$qty);
						DB::commit();
						$message="Input data Purchase Item Succes";
				} catch (\Exception $e){
						DB::rollback();
						$message="Input data Item Failed, please try again<br>Developer message:".$e;
				}
																	
				echo json_encode($data);
    }
		
    public function update(Request $request)
    {
       $app_purchase_id				= $request["app_purchase_id"];
			 $app_purchase_detail_id= $request["app_purchase_detail_id"];
			 $purchase_detail=	array("app_purchase_id"		=>$request["app_purchase_id"],
													"app_raw_material_id"			=>$request["app_raw_material_id"],
													"qty"											=>$request["qty"],
													"app_purchase_detail_id"	=>$request["app_purchase_detail_id"],
													"sub_total"								=>$request["sub_total"]);
								
			  $update=AppPurchaseDetail::where("app_purchase_detail_id","=",$app_purchase_detail_id)
																		 ->update($purchase_detail);																		
				if($update==1){
					$message="update data successful";
				}else{
					$message="update data failed";
				}

				return Redirect::to('purchase_detail?purchase_id='.$app_purchase_id)
												->with("message",$message);
    }
		
		public function destroy(Request $request)
    {
			 $app_purchase_id				= $request["app_purchase_id"];
			 $app_purchase_detail_id = $request->input("app_purchase_detail_id");
			 $delete = AppPurchaseDetail::where('app_purchase_detail_id', '=',$app_purchase_detail_id)
																								->delete();
			 if($delete ==true){
				 $message="Delete data successfull";
			 }else{
				 $message="Delete data failed";
			 }
			 	return Redirect::to('purchase_detail?purchase_id='.$app_purchase_id)
												->with("message",$message);
    }
		
		function get_header($app_purchase_id){
			$data_header=$data = AppPurchase::where('app_purchase.app_purchase_id', '=',$app_purchase_id)->first();							
			
		}
		
		function get_detail($app_purchase_id){
				$data_detail=AppPurchaseDetail::select('app_purchase_detail.*','app_purchase.*','app_raw_material.*',"app_raw_material.name as raw_material_name")
																					->leftJoin('app_purchase','app_purchase.app_purchase_id','=', 	 'app_purchase_detail.app_purchase_id')
																					->leftJoin('app_raw_material','app_raw_material.app_raw_material_id','=', 	 'app_purchase_detail.app_raw_material_id')
																					->where('app_purchase_detail.app_purchase_id', '=',$app_purchase_id)->get();
																					return $data_detail;
		}
		
			public function download_pdf($app_purchase_id){
			
			$data_header=$this->get_header($app_purchase_id);
			$data_detail=$this->get_detail($app_purchase_id);
			//print_r($data_detail); die();
			$data=array("data_header"=>$data_header,
									"data_detail"=>$data_detail
			);
			
				$pdf=PDF::loadView('AppPurchaseDetail::purchase_order_pdf', compact('data'));
				return $pdf->download('purchase_order_pdf.pdf');
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
