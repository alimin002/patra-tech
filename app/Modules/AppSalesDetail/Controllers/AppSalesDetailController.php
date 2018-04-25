<?php

namespace App\Modules\AppSalesDetail\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Modules\AppSalesDetail\Models\AppSalesDetail;
use App\Modules\AppSales\Models\AppSales;
use App\Modules\AppProduct\Models\AppProduct;
use App\Modules\AppStockProduct\Models\AppStockProduct;
use app\Providers\Lookup;
use app\Providers\Common;
use Illuminate\Pagination\Paginator;
Use Redirect;
use DB;
use PDF;
use Session;
use Mail;
class AppSalesDetailController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
		 //direct access guard
		public function __construct(Request $request) 
		{
			 if ($request->session()->has('session_login')==false) {
						return Redirect::to('logout')->send();
			 }
		}
    public function index(Request $request)
    {
				$app_sales_id=$_GET["sales_id"];
				$data_header=$data = AppSales::where('app_sales.app_sales_id', '=',$app_sales_id)->first();							
				$data_detail=AppSalesDetail::select('app_sales_detail.*','app_sales.*','app_products.*',"app_products.name as product_name")
																					->leftJoin('app_sales','app_sales.app_sales_id','=','app_sales_detail.app_sales_id')
																					->leftJoin('app_products','app_products.app_product_id','=','app_sales_detail.app_product_id')
																					->where('app_sales_detail.app_sales_id', '=',$app_sales_id)->get();
				$lookup_product	= Lookup::getLookupProduct();	
				$data_sales				= json_decode(json_encode($data_detail),true);
				$json_sales=json_encode($data_sales);
				return view("AppSalesDetail::index")
				        ->with("lookup_product",$lookup_product)
								->with("json_sales",$json_sales)
								->with("data_header",$data_header);
    }
		
		//check if item sales exists
		public function checkItemExists($app_sales_id){
				$num_rows=AppSalesDetail::where('app_sales_detail.app_sales_id', '=',$app_sales_id)->count();
				
				if($num_rows > 0){
					return 1;
				}else{
					return 0;
				}
		}
		
		public function stockOut($app_product_id,$num_of_entri){
			$data					 = AppStockProduct::where('app_product_id','=',$app_product_id)->first();
			$current_stock =$data["stock"];
			$new_stock		 =$current_stock - $num_of_entri;//num_of_entri= entri from purchase and other factor
			$new_stock_product=array(
																"stock"=>$new_stock
															);
			$update=AppStockProduct::where("app_product_id","=",$app_product_id)
																	 ->update($new_stock_product);																		
				return $update;
			
		}
		
		public function stockIn($app_product_id,$num_of_entri){
			$data					 = AppStockProduct::where('app_product_id','=',$app_product_id)->first();
			$current_stock =$data["stock"];
			$new_stock		 =$current_stock + $num_of_entri;//num_of_entri= entri from purchase and other factor
			$new_stock_product=array(
																"stock"=>$new_stock
															);
			$update=AppStockProduct::where("app_product_id","=",$app_product_id)
																	 ->update($new_stock_product);																		
				return $update;
			
		}
		
		public function stockOutOnUpdateItem($app_product_id,$old_qty,$num_of_entri){
			$data					 = AppStockProduct::where('app_product_id','=',$app_product_id)->first();
			$current_stock =$data["stock"];
			//step back to old stock
			$current_stock	 =$current_stock + $old_qty;
			
			//count new stock
			$new_stock		 =$current_stock + $num_of_entri;//num_of_entri= entri from purchase and other factor
			//return $new_stock;
			$new_stock_product=array(
																"stock"=>$new_stock
															);
			$update=AppStockProduct::where("app_product_id","=",$app_product_id)
																	 ->update($new_stock_product);																		
				return $update;
			
		}
		
		public function save(Request $request){
			$data_sales_item = json_decode($request->input("data_sales_item"),true);
			
			$app_sales_id			= $request["app_sales_id_in_detail"];
			$app_product_id	= $request["app_product_id"];
			$qty									= $request["qty"];
			
				if($this->checkItemExists($app_sales_id)==1){
					 $delete = AppSalesDetail::where('app_sales_id', '=',$app_sales_id)
																										->delete();
				//if deleted item exists go to there
					if($request["deleted_item"]!=""){
							$deleted_item=json_decode($request->input("deleted_item"),true);
							
							foreach($deleted_item as $key=>$value){
								$this->stockIn($value["app_product_id"],$value["qty"]);
							}
					}																							
				}

						 DB::beginTransaction();
							try {
									foreach($data_sales_item as $key =>$values)
									{
										//saving item purchase
										$app_sales_id		 		 =$app_sales_id;
										$app_product_id 		= $values["app_product_id"];
										$qty								 =$values["qty"];
										$sub_total					 =$values["sub_total"];
										
										$sales_detail=	array("app_sales_id"			=>$app_sales_id,
																						"app_product_id"	=>$app_product_id,
																						"qty"									=>$qty,
																						"sub_total"						=>$sub_total);
																																			
										$save=AppSalesDetail::insertGetId($sales_detail);
										
										//update stock										
											//update stock to 0 
										if($this->checkItemExists($app_sales_id)==1){
												if(isset($values["old_qty"])){
													//update edit item mode
													$old_qty	 =$values["old_qty"];
													$stock_out	 =$this->stockOutOnUpdateItem($app_product_id,$old_qty,$qty);
												}	else{
													//update add item mode
													$stock_out=$this->stockOut($app_product_id,$qty);
												}
												
										}else{
												$stock_out=$this->stockOut($app_product_id,$qty);
										}
										
										
										//$stock_in=$this->stockOut($app_product_id,$qty);										
									}
									
									
									
									DB::commit();
									$message="Input data Sales Item Succes";
							} catch (\Exception $e){
								DB::rollback();
								$message="Input data Item Failed, please try again<br>Developer message:".$e;
						}
							return Redirect::to('sales_detail?sales_id='.$app_sales_id)
												->with("message",$message);			
		}
		
		function get_header($app_sales_id){
			$data_header=$data = AppSales::where('app_sales.app_sales_id', '=',$app_sales_id)->first();							
																					return $data_header;
		}
		
		function get_detail($app_sales_id){
			$data_detail=AppSalesDetail::select('app_sales_detail.*','app_sales.*','app_products.*',"app_products.name as product_name")
																					->leftJoin('app_sales','app_sales.app_sales_id','=','app_sales_detail.app_sales_id')
																					->leftJoin('app_products','app_products.app_product_id','=','app_sales_detail.app_product_id')
																					->where('app_sales_detail.app_sales_id', '=',$app_sales_id)->get();
			return $data_detail;
		}
		
		public function download_pdf($app_sales_id){
			
			$data_header=$this->get_header($app_sales_id);
			$data_detail=$this->get_detail($app_sales_id);
			//print_r($data_detail); die();
			$data=array("data_header"=>$data_header,
									"data_detail"=>$data_detail
			);
			//echo "<pre>";
				//print_r($data);
			//echo "</pre>";
			//die();
				$pdf=PDF::loadView('AppSalesDetail::invoice_pdf', compact('data'));
				return $pdf->download('invoice_pdf.pdf');
		}
		
			public function preview_pdf($app_sales_id){
				return response()->file(
        public_path('download/test.pdf')
    );
		}
		
		public function renderLookupProduct(){
			$lookup_product = Lookup::getLookupProduct();
			echo json_encode($lookup_product);
		}	
		
		public function update_header(Request $request)
    {
				$app_sales_id = $request->input("app_sales_id");
				$sales=array("customer_name" =>$request["customer_name"],
												"sale_date"  =>date("Y-m-d"));
								
			  $update=AppSales::where("app_sales_id","=",$app_sales_id)
																		 ->update($sales);																		
				if($update==1){
					$message="update header successful";
				}else{
					$message="update header failed";
				}
				
				return Redirect::to('sales_detail?sales_id='.$app_sales_id)
												->with("message",$message);
    }
		
		function sendInvoiceToEmail($app_sales_id){
			$data_header=$this->get_header($app_sales_id);
			$data_detail=$this->get_detail($app_sales_id);
			$data = array('data'=>array("data_header"=>$data_header,
									  "data_detail"=>$data_detail));
										
      Mail::send('AppSalesDetail::email_Invoice', $data, function($email_message) {
         $email_message->to('alimin1313@gmail.com', 'Invoice')->subject('Purchase Order');
         $email_message->from('patradigitalgarage@gmail.com','Alimin');
      });
      $message="email has sent...";
			return Redirect::to('sales_detail?sales_id='.$app_sales_id)
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
