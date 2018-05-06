<?php

namespace App\Modules\AppBudgetProduction\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Modules\AppSalesDetail\Models\AppSalesDetail;
use App\Modules\AppSales\Models\AppSales;
use App\Modules\AppStockRawMaterial\Models\AppStockRawMaterial;
use app\Providers\Lookup;
use app\Providers\Common;
use Illuminate\Pagination\Paginator;
Use Redirect;
use DB;
use PDF;
use Session;
class AppBudgetProductionController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
				$app_sales_id=$_GET["sales_id"];
				$data_header=$data = AppSales::where('app_sales.app_sales_id', '=',$app_sales_id)->first();							
				$data_detail=AppSalesDetail::select('app_sales_detail.*','app_sales.*','app_products.*',"app_products.name as product_name","app_product_composition.*")
																					->leftJoin('app_sales','app_sales.app_sales_id','=','app_sales_detail.app_sales_detail_id')
																					->leftJoin('app_products','app_products.app_product_id','=','app_sales_detail.app_product_id')
																					->leftJoin('app_product_composition','app_product_composition.app_product_id','=','app_sales_detail.app_product_id')
																					->where('app_sales_detail.app_sales_id', '=',$app_sales_id)->get();
				$lookup_product	= Lookup::getLookupProduct();	
				$data_sales				= json_decode(json_encode($data_detail),true);
				$json_sales=json_encode($data_sales);
				
        return view("AppBudgetProduction::index")
								->with("lookup_product",$lookup_product)
								->with("json_sales",$json_sales)
								->with("data_header",$data_header);
    }
		public function stockOut($app_raw_material_id,$num_of_entri){
			$data					 = AppStockRawMaterial::where('app_raw_material_id','=',$app_raw_material_id)->first();
			$current_stock =$data["stock"];
			//echo $num_of_entri."yyyy".$app_raw_material_id;  die();
			$new_stock		 =$current_stock - $num_of_entri;//num_of_entri= entri from purchase and other factor
			/**
			echo $app_raw_material_id;
			echo "XXXX";
			echo $current_stock;
			echo "XXXX";
			echo $new_stock;
			die();
			**/
			$new_stock_raw_material=array(
																"stock"=>$new_stock
															);
			AppStockRawMaterial::where("app_raw_material_id","=",$app_raw_material_id)
																	 ->update($new_stock_raw_material);	
       //echo $update;	die();																 
				//return $update;
			
		}
		
		
		function temp(Request $request){	
				//DB::beginTransaction();
			$array_composition=json_decode($request["data_composition"]);
				 $array_prediction=json_decode($request["data_sales_item"]);
				 
				  $i=0;
				 foreach($array_composition as $key=>$values){				
										//echo $values->app_raw_material_id;
										$app_raw_material_id=$values->app_raw_material_id;
										$amount							=$values->amount;
										$qty								=$array_prediction[$i]->qty;
										//clear total amount
										$total_amount=0;
										$total_amount       =$qty * $amount;
										//echo $total_amount; die();
										$this->stockOut($app_raw_material_id,$total_amount);
										$i++;
									}
									$message="";
						$app_sales_id=$request["app_sales_id_in_detail"];
						return Redirect::to('budget_production?sales_id='.$app_sales_id)
												->with("message",$message);			
		}
		
		
		function approve_prediction(Request $request){
			//$array_composition=json_decode($request["data_composition"]);
				 $array_prediction=json_decode($request["data_sales_item"]);
				 echo "<pre>";
				 print_r($array_prediction);
				 echo "</pre>";
				  $i=0;
				 
				 foreach($array_prediction as $key=>$values){							
						$array_composition=json_decode($values->data_composition);
						  //echo $values->app_raw_material_id;
							foreach($array_composition as $lv1_key=>$lv1_values){
								$total_amount=0;
								$qty         =$values->qty;
								$amount      =$lv1_values->amount;	
								$total_amount=$qty * $amount;
								$app_raw_material_id = $lv1_values->app_raw_material_id;
								echo $total_amount;
								echo "</br>";	
								$this->stockOut($app_raw_material_id,$total_amount);								
							}
							//echo "---------------------------"."</br>";
				 }
				 //die();
									$message="Aprrovement Executed successfully...";
						$app_sales_id=$request["app_sales_id_in_detail"];
						return Redirect::to('budget_production?sales_id='.$app_sales_id)
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
}
