<?php

namespace App\Modules\AppCostPredictor\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\AppCostPredictor\Models\AppCostPredictor;
use app\Providers\Lookup;
use Session;
Use Redirect;
class AppCostPredictorController extends Controller
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
				$keyword=$request["keyword"];
				$lookup_product=Lookup::getLookupProduct();
				$lookup_raw_material=Lookup::getLookupRawMaterial();
					if($request->input("keyword")!= null){
							$data_composition	=AppCostPredictor::select("app_product_composition.*","app_product_composition.data_composition")
																									->leftJoin('app_products','app_product_composition.app_product_id','=','app_products.app_product_id')
																									->where('app_products.name', 'LIKE','%'.$keyword.'%')->paginate(3);
					}else{
						 $data_composition =AppCostPredictor::select("app_product_composition.*","app_product_composition.data_composition","app_products.name as product_name")
															 ->leftJoin('app_products','app_product_composition.app_product_id','=','app_products.app_product_id')
															 ->paginate(3);
					}					
        return view("AppCostPredictor::index")
							->with("composition",$data_composition)
							->with("lookup_product",$lookup_product)
							->with("lookup_raw_material",$lookup_raw_material);
    }
		
		function save(Request $request){
				$app_product_id		= $request["app_product_id"];
				$data_composition	= $request["product_composition"];
				$composition=array("app_product_id"	=>$app_product_id,
														"data_composition"=>$data_composition);
				$save = AppCostPredictor::insert($composition);
				if($save==1){
					$message="Save data successful";
				}else{
					$message="save data failed";
				}
				
				return Redirect::to('cost_predictor')
								->with("message",$message);
		}
		
	
		
		function stock_out_prediction($app_purchase_id){
			 return view("AppCostPredictor::stock_out_prediction");
							
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
    public function edit($app_product_composition_id)
    {
				$data=AppCostPredictor::select("app_product_composition.*","app_products.name as product_name")
																->leftJoin('app_products','app_product_composition.app_product_id','=','app_products.app_product_id')
																->where('app_product_composition.app_product_composition_id', '=',$app_product_composition_id)->first()->toArray();
					return json_encode($data);
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
    public function destroy(Request $request)
    {
				 //
				$app_product_composition_id=$request["app_product_composition_id"];
				$delete=AppCostPredictor::where('app_product_composition_id', '=',$app_product_composition_id)->delete();
				if($delete==true){
						$message="Delete data successfull";
				}else{
						$message="Delete data failed, please try again!";
				}
				return Redirect::to('cost_predictor')->with('message', $message);
    }
}
