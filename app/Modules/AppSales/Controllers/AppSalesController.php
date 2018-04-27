<?php

namespace App\Modules\AppSales\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\AppSales\Models\AppSales;
use App\Modules\AppSalesDetail\Models\AppSalesDetail;
use app\Providers\Lookup;
use app\Providers\Common;
use Illuminate\Pagination\Paginator;
Use Redirect;
use DB;
use Session;
class AppSalesController extends Controller
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
			  //echo 1; die();
				if($request->input("keyword")!= null){
					//echo 1; die();
								$keyword =$request->input("keyword");
								$data= AppSales::where('app_sales.customer_name', 'LIKE','%'.$keyword.'%')
																->orderBy('app_sales.app_sales_id', 'desc')				
																->paginate(3);
				}else{
					$data= AppSales::orderBy('app_sales.app_sales_id', 'desc')
																 ->orderBy('app_sales.app_sales_id', 'desc')							
																 ->paginate(3);
				}
					//print_r($data); die();
				$descending_data = AppSales::orderBy("app_sales_id","desc")->first();	
				//print_r($descending_data);
				$app_sales_id_desc = $descending_data["app_sales_id"];
				
				$descending_data = AppSales::orderBy("app_sales_id","desc")->first();	
				$app_sales_id_desc = $descending_data["app_sales_id"];
				
				//this command used in just in create popup
				$purchase_number=Common::generateTransactionNumber("INV",$app_sales_id_desc);
						
        return view("AppSales::index")
								->with("invoice_number",$purchase_number)
								->with("data",$data);
    }
		
			//save purchase
			public function save(Request $request){
			$purchase=	array("invoice_number"		=>$request["invoice_number"],											 
												"sale_date"					=>date("Y-m-d"),												
												"customer_name"			=>$request["customer_name"],
												"customer_email"		=>$request["customer_email"],
												);
								
			 $save=AppSales::insert($purchase);				
				if($save==1){
					$message="Save data successful";
				}else{
					$message="save data failed";
				}
				
				return Redirect::to('sales')
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
    public function edit($app_sales_id)
    {
				 //
				$data = AppSales::where('app_sales.app_sales_id', '=',$app_sales_id)->first();
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
				$app_sales_id = $request->input("app_sales_id");
				$sales=array("customer_name" =>$request["customer_name"],"customer_email" =>$request["customer_email"]);												   
			  $update=AppSales::where("app_sales_id","=",$app_sales_id)
													->update($sales);																		
				if($update==1){
					$message="update data successful";
				}else{
					$message="update data failed";
				}
				
				return Redirect::to('sales')
								->with("message",$message);
    }

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
									 $app_sales_id = $request->input("app_sales_id");
									 AppSales::where('app_sales_id', '=',$app_sales_id)
																			 ->delete();
										$app_sales_id = $request->input("app_sales_id");
									 AppSalesDetail::where('app_sales_id', '=',$app_sales_id)
																			 ->delete();	
									DB::commit();
								 $message="Delete data successfull";
							} catch (\Exception $e){
								DB::rollback();
								$message="Input data Item Failed, please try again<br>Developer message:".$e;
						}
						return Redirect::to('sales')
													->with("message",$message);
				
				
    }
}
