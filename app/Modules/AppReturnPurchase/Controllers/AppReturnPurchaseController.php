<?php

namespace App\Modules\AppReturnPurchase\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\AppReturnPurchase\Models\AppReturnPurchase;
use Illuminate\Pagination\Paginator;
Use Redirect;
use app\Providers\Lookup;
use app\Providers\Common;

class AppReturnPurchaseController extends Controller
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
				$lookup_suplier	=Lookup::getLookupSuplier();
				if($request->input("keyword")!= null){
					$data=AppReturnPurchase::select("app_suplier.*","app_suplier.name as suplier_name","app_return_purchase.*")
											->leftJoin('app_suplier','app_return_purchase.app_suplier_id','=','app_suplier.app_suplier_id')
											->where('app_suplier.name', 'LIKE','%'.$keyword.'%')
											->paginate(3);
				}else{
					$data= AppReturnPurchase::select("app_suplier.*","app_suplier.name as suplier_name","app_return_purchase.*")
											->leftJoin('app_suplier','app_return_purchase.app_suplier_id','=','app_suplier.app_suplier_id')											
											->paginate(3);
				}
				
				$descending_data = AppReturnPurchase::orderBy("app_return_purchase_id","desc")->first();	
				$app_return_purchase_id = $descending_data["app_return_purchase_id"];
				
				//this command used in just in create popup
				$return_number=Common::generateTransactionNumber("RTRN",$app_return_purchase_id);
        return view("AppReturnPurchase::index")
								->with("lookup_suplier",$lookup_suplier)
								->with("return_number",$return_number)
								->with("data",$data);
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
    public function edit($app_return_purchase_id){		
        //
				$data=AppReturnPurchase::select("app_suplier.*","app_suplier.name as suplier_name","app_return_purchase.*")
											->leftJoin('app_suplier','app_return_purchase.app_suplier_id','=','app_suplier.app_suplier_id')
											->where('app_return_purchase.app_return_purchase_id','=',$app_return_purchase_id)->first();
											return json_encode($data);
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
				 $app_return_purchase_id													= $request->input("app_return_purchase_id");
				 	$return_purchase=array("return_purchase_number"	=>$request["return_purchase_number"],
															 "app_suplier_id"						=>$request["app_suplier_id"],
															 "invoice_number"						=>$request["invoice_number"],
															 "return_reason"						=>$request["return_reason"],
															 "return_date"							=>date("Y-m-d"));
								
				 $update = AppReturnPurchase::where('app_return_purchase_id', '=',$app_return_purchase_id)
																				->update($return_purchase);
				 
				 if($update==true){
					 $message="Update Successfull";
				 }else{
					 $message="Update failed";
				 }
				 return Redirect::to('return_purchase')
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
        //
				 $app_return_purchase_id=$request['app_return_purchase_id'];
				 $delete = AppReturnPurchase::where('app_return_purchase_id', '=',$app_return_purchase_id)->delete();
				 if($delete ==true){
					 $message="Delete data successfull";
				 }else{
					 $message="Delete data failed";
				 }
				 return Redirect::to('return_purchase')
								->with("message",$message);
    }
		
		public function save(Request $request){
				$return_purchase=array("return_purchase_number"		=>$request["return_purchase_number"],
															 "app_suplier_id"						=>$request["app_suplier_id"],
															 "invoice_number"						=>$request["invoice_number"],
															 "return_reason"						=>$request["return_reason"],
															 "return_date"							=>date("Y-m-d"));
								
			 $save=AppReturnPurchase::insert($return_purchase);				
				if($save==1){
					$message="Save data successful";
				}else{
					$message="save data failed";
				}
				
				return Redirect::to('return_purchase')
								->with("message",$message);
		}
}
