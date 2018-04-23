<?php

namespace App\Modules\AppStockProduct\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\AppStockProduct\Models\AppStockProduct;
use app\Providers\Lookup;
use Illuminate\Pagination\Paginator;
Use Redirect;
class AppStockProductController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->input("keyword")!= null){
					$keyword=$request->input("keyword");
					$data=AppStockProduct::select('app_products.*','app_stock.*','app_stock.description as stock_description')
																		->leftJoin('app_products', 'app_products.app_product_id', '=', 'app_stock.app_product_id')
																		->where('app_stock.description', 'LIKE','%'.$keyword.'%')
																		->orderBy('app_stock.app_stock_id', 'desc')
																		->paginate(3);
				}else{
					$data= AppStockProduct::select('app_products.*','app_stock.*','app_stock.description as stock_description')
																		->leftJoin('app_products', 'app_products.app_product_id', '=', 'app_stock.app_product_id')
																		->orderBy('app_stock.app_stock_id', 'desc')
																		->paginate(3);
				}
				$lookup_product=Lookup::getLookupProduct();
        return view("AppStockProduct::index")
								->with("lookup_product",$lookup_product)
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
		
		public function save(Request $request)
		{
				$stock_product=array("app_product_id" =>$request["app_product_id"],
																	"stock"							 	=>$request["stock"],
																	"description"				 	=>$request["description"]);
								
			  $save=AppStockProduct::insert($stock_product);				
				if($save==1){
					$message="Save data successful";
				}else{
					$message="save data failed";
				}
				
				return Redirect::to('stock_product')
								->with("message",$message);
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
    public function edit($app_stock_id)
    {
        //
				$data=AppStockProduct::select('app_products.*','app_stock.*','app_stock.description as stock_description')
																		->leftJoin('app_products', 'app_products.app_product_id', '=', 'app_stock.app_product_id')
																		->where('app_stock.app_stock_id', '=',$app_stock_id)
																		->first();
				echo json_encode($data);
				
    }
		
		public function renderLookupProduct(){
			$lookup_product = Lookup::getLookupProduct();
			echo json_encode($lookup_product);
		}	
		
		public function update(Request $request)
    {
        //
				$app_stock_id = $request->input("app_stock_id");
				$stock_product=array("app_product_id" =>$request["app_product_id"],
																	"stock"							 	=>$request["stock"],
																	"description"				 	=>$request["description"]);
								
			  $update=AppStockProduct::where("app_stock_id","=",$app_stock_id)
																		 ->update($stock_product);																		
				if($update==1){
					$message="update data successful";
				}else{
					$message="update data failed";
				}
				
				return Redirect::to('stock_product')
								->with("message",$message);
    }
		
		
		 public function destroy(Request $request)
    {
				//
				 $app_stock_id = $request->input("app_stock_id");
				 $delete = AppStockProduct::where('app_stock_id', '=',$app_stock_id)
																									->delete();
				 if($delete ==true){
					 $message="Delete data successfull";
				 }else{
					 $message="Delete data failed";
				 }
				 return Redirect::to('stock_product')
								->with("message",$message);
				 
    }

}
