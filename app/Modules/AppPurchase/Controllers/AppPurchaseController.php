<?php

namespace App\Modules\AppPurchase\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\AppPurchase\Models\AppPurchase;
use app\Providers\Lookup;
use app\Providers\Common;
use Illuminate\Pagination\Paginator;
Use Redirect;

class AppPurchaseController extends Controller
{

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
					$data=AppPurchase::select('app_suplier.*','app_purchase.*','app_purchase.description as purcahse_description','app-suplier.name as suplier_name')
																		->leftJoin('app_suplier', 'app_suplier.app_suplier_id','=', 'app_purchase.app_suplier_id')
																		->where('app_purchase.description', 'LIKE','%'.$keyword.'%')
																		->paginate(3);
				}else{
					$data= AppPurchase::select('app_suplier.*','app_purchase.*','app_purchase.description as purcahse_description','app_suplier.name as suplier_name')
																		->leftJoin('app_suplier', 'app_suplier.app_suplier_id','=', 'app_purchase.app_suplier_id')
																		->paginate(3);
				}
				
				$descending_data = AppPurchase::orderBy("app_purchase_id","desc")->first();	
				$app_purchase_id_desc = $descending_data["app_purchase_id"];
				
				//this command used in just in create popup
				$purchase_number=Common::generateTransactionNumber("PU",$app_purchase_id_desc);
				$lookup_suplier = Lookup::getLookupSuplier();				
        return view("AppPurchase::index")
								->with("lookup_suplier",$lookup_suplier)
								->with("purchase_number",$purchase_number)
								->with("data",$data);
    }
		
		
		public function save(Request $request){
			$purchase=	array("purchase_number"		=>$request["purchase_number"],
											  "app_suplier_id"		=>$request["app_suplier_id"],
												"purchase_date"			=>date("Y-m-d"),
									      "description"	=>$request["description"]);
								
			 $save=AppPurchase::insert($purchase);				
				if($save==1){
					$message="Save data successful";
				}else{
					$message="save data failed";
				}
				
				return Redirect::to('purchase')
								->with("message",$message);
		}
		
		public function edit($app_purchase_id)
    {
        //
				$data = AppPurchase::select('app_suplier.*','app_purchase.*','app_purchase.description as description','app_suplier.name as suplier_name')
																		->leftJoin('app_suplier', 'app_suplier.app_suplier_id','=', 'app_purchase.app_suplier_id')
																		->where('app_purchase.app_purchase_id', '=',$app_purchase_id)->first();
				echo json_encode($data);
    }
		public function renderLookupSuplier(){
			$lookup_suplier = Lookup::getLookupSuplier();
			echo json_encode($lookup_suplier);
		}	
		
		public function update(Request $request)
    {
        //
				$app_purchase_id = $request->input("app_purchase_id");
				$purchase=array("app_suplier_id" =>$request["app_suplier_id"],
												    "description"=>$request["description"]);
								
			  $update=AppPurchase::where("app_purchase_id","=",$app_purchase_id)
																		 ->update($purchase);																		
				if($update==1){
					$message="update data successful";
				}else{
					$message="update data failed";
				}
				
				return Redirect::to('purchase')
								->with("message",$message);
    }
		
		 public function destroy(Request $request)
    {
				 //
				 $app_purchase_id = $request->input("app_purchase_id");
				 $delete = AppPurchase::where('app_purchase_id', '=',$app_purchase_id)
																									->delete();
				 if($delete ==true){
					 $message="Delete data successfull";
				 }else{
					 $message="Delete data failed";
				 }
				 return Redirect::to('purchase')
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
