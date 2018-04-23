<?php

namespace App\Modules\AppProduct\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\AppProduct\Models\AppProduct;
use app\Providers\Lookup;
use Illuminate\Pagination\Paginator;
use Session;
Use Redirect;
class AppProductController extends Controller
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
		 /***start query section****/
		 public function getProductByKeyword($keyword){
			 $data=AppProduct::select("app_products.name as product_name,app_products.*")->where('app_products.name', 'LIKE','%'.$keyword.'%')
							->leftJoin('app_stock', 'app_stock.app_stock_id', '=', 'app_products.app_product_id')
							->orderBy('app_products.app_product_id', 'desc')		
							->paginate(3);
			 return $data;
		 }
		 
		 
		  function getProductlAll(){
			 $data=AppProduct::select("app_products.*","app_products.name as product_name","app_stock.*")
													->leftJoin('app_stock', 'app_stock.app_product_id', '=', 'app_products.app_product_id')
													->orderBy('app_products.app_product_id', 'desc')	
													->paginate(3);
			
			 return $data;
			
		 }
		 
		  function doSave($request){
			 $product=			array("name"												=>$request["name"],
														"unit"												=>$request["unit"],
														"app_category_id"							=>$request["app_category_id"],
														"unit_price"									=>$request["unit_price"]);
			 $save=AppProduct::insert($product);
			 return $save;
		 }
		 
		 
		  function getProductByAppProductId($app_product_id){
			 $data=AppProduct::select("app_products.name as product_name","app_category.app_category_id","app_category.name as category_name","app_products.*")
			 ->leftJoin('app_category', 'app_products.app_category_id', '=', 'app_category.app_category_id')
			 ->where('app_products.app_product_id', '=',$app_product_id)->first()->toArray();
			 return $data;
		 }
		 
		  function doUpdate($request){
			 $app_product_id																		= $request["app_product_id"];
			 $product=array(			"name"												=>$request["name"],
														"unit"												=>$request["unit"],
														"unit_price"									=>$request["unit_price"],
														"app_category_id"							=>$request["app_category_id"]);
			 
			 $update = AppProduct::where('app_product_id', '=',$app_product_id)
																			->update($product);
			 return $update;
			 
		 }
		 function doDelete($request){
			 $app_product_id=$request['app_product_id'];
			 $delete = AppProduct::where('app_product_id', '=',$app_product_id)->delete();
			 return $delete;
		 }
		 
		  /***end query section****/
		 
		 /**start bridge between query data and view**/
    public function index(Request $request)
    {
				if($request->input("keyword")!= null){
					$data=$this->getProductByKeyword($request->input("keyword"));
				}else{
					$data=$this->getProductlAll();
				
				}
				$lookup_category=Lookup::getLookupCategoryProduct();
        return view("AppProduct::index")
								->with("lookup_category",$lookup_category)
								->with("data",$data);
    }
		
		public function renderLookupCategory(){
			$lookup_category = Lookup::getLookupCategoryProduct();
			echo json_encode($lookup_category);
		}
			
		public function save(Request $request){
			$save_data=$this->doSave($request->all());
			if($save_data==1){
				$message="Save data successful";
			}else{
				$message="save data failed";
			}
			//return redirect('raw_material',["message"=>$message]);
			return Redirect::to('product')->with('message', $message);
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
    public function edit($params)
    {
       	$data=$this->getProductByAppProductId($params);
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
        $update=$this->doUpdate($request->all());
				if($update == true){
					$message="Update data successfull";
				}else{
					$message="Update data failed!";
				}
				return Redirect::to('product')->with('message', $message);
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
				$delete=$this->doDelete($request->all());
				if($delete==true){
						$message="Delete data successfull";
				}else{
						$message="Delete data failed, please try again!";
				}
				return Redirect::to('product')->with('message', $message);
    }
		 /**end bridge between query data and view**/
}
