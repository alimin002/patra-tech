<?php

namespace App\Modules\AppStockOpnameRawMaterialDetail\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Modules\AppStockOpnameRawMaterialDetail\Models\AppStockOpnameRawMaterialDetail;
use App\Modules\AppStockOpnameRawMaterial\Models\AppStockOpnameRawMaterial;
use app\Providers\Lookup;
use Illuminate\Pagination\Paginator;
Use Redirect;
use DB;
use PDF;
use Session;
class AppStockOpnameRawMaterialDetailController extends Controller
{

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
				$app_stock_opname_raw_material_id=$_GET["app_stock_opname_raw_material_id"];
				$data_header=$data =AppStockOpnameRawMaterial::where('app_stock_opname_raw_material.app_stock_opname_raw_material_id', '=',$app_stock_opname_raw_material_id)->first();							
				$data_detail=AppStockOpnameRawMaterialDetail::select('app_stock_opname_raw_material_detail.*','app_stock_opname_raw_material.*','app_raw_material.*',"app_raw_material.name as raw_material_name")
																					->leftJoin('app_stock_opname_raw_material','app_stock_opname_raw_material.app_stock_opname_raw_material_id','=','app_stock_opname_raw_material_detail.app_stock_opname_raw_material_id')
																					->leftJoin('app_raw_material','app_raw_material.app_raw_material_id','=','app_stock_opname_raw_material_detail.app_raw_material_id')
																					->where('app_stock_opname_raw_material_detail.app_stock_opname_raw_material_id', '=',$app_stock_opname_raw_material_id)->get();
				$lookup_raw_material	= Lookup::getLookupRawMaterial();	
				$data_stock_opname				= json_decode(json_encode($data_detail),true);
				$json_stock_opname_raw_material=json_encode($data_stock_opname);				        
        return view("AppStockOpnameRawMaterialDetail::index")
							->with("json_stock_opname_raw_material",$json_stock_opname_raw_material)
							->with("lookup_raw_material",$lookup_raw_material)
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
		public function checkItemExists($app_stock_opname_raw_material_id){
				$num_rows=AppStockOpnameRawMaterialDetail::where('app_stock_opname_raw_material_detail.app_stock_opname_raw_material_id', '=',$app_stock_opname_raw_material_id)->count();
				
				if($num_rows > 0){
					return 1;
				}else{
					return 0;
				}
		}
		
		public function save(Request $request){
			$data_stock_opname_item = json_decode($request->input("data_stock_opname_item"),true);
		
			$app_stock_opname_raw_material_id			= $request["app_stock_opname_raw_material_id_in_detail"];
			if($this->checkItemExists($app_stock_opname_raw_material_id)==1){
				 $delete = AppStockOpnameRawMaterialDetail::where('app_stock_opname_raw_material_id', '=',$app_stock_opname_raw_material_id)
																									->delete();
					
			}
      //	echo 1; die();
					 DB::beginTransaction();
						try {
								foreach($data_stock_opname_item as $key =>$values)
								{
									//saving item purchase
									$app_stock_opname_raw_material_id		 =$app_stock_opname_raw_material_id;
									$app_raw_material_id =$values["app_raw_material_id"];
									$stock							 =$values["stock"];
									$stock_opname				 =$values["stock_opname"];
									$deviation					 =$values["deviation"];
									
									$data_stock_opname=	array("app_stock_opname_raw_material_id"=>$app_stock_opname_raw_material_id,
																						"app_raw_material_id"		=>$app_raw_material_id,
																						"stock"									=>$stock,
																						"deviation"							=>$deviation,
																						"stock_opname"					=>$stock_opname);
																																		
									$save=AppStockOpnameRawMaterialDetail::insertGetId($data_stock_opname);
																		
								}
								
								
								
								DB::commit();
								$message="Input Stock Opname Succes";
						} catch (\Exception $e){
							DB::rollback();
							$message="Input data Item Failed, please try again<br>Developer message:".$e;
					}
						return Redirect::to('stock_opname_raw_material_detail?app_stock_opname_raw_material_id='.$app_stock_opname_raw_material_id)
											->with("message",$message);			
		}
		
		function get_header($app_stock_opname_raw_material_id){
			$data_header=$data = AppStockOpnameRawMaterial::where('app_stock_opname_raw_material.app_stock_opname_raw_material_id', '=',$app_stock_opname_raw_material_id)->first();							
																					return $data_header;
		}
		
		function get_detail($app_stock_opname_raw_material_id){
			$data_detail=AppStockOpnameRawMaterialDetail::select('app_stock_opname_raw_material_detail.*','app_stock_opname_raw_material.*','app_raw_material.*',"app_raw_material.name as raw_material_name")
																					->leftJoin('app_stock_opname_raw_material','app_stock_opname_raw_material.app_stock_opname_raw_material_id','=','app_stock_opname_raw_material_detail.app_stock_opname_raw_material_id')
																					->leftJoin('app_raw_material','app_raw_material.app_raw_material_id','=','app_stock_opname_raw_material_detail.app_raw_material_id')
																					->where('app_stock_opname_raw_material_detail.app_stock_opname_raw_material_id', '=',$app_stock_opname_raw_material_id)->get();
			return $data_detail;
		}
		public function test(){
			echo 1;
		}
		
		public function download_pdf($app_stock_opname_raw_material_id){
			$data_header=$this->get_header($app_stock_opname_raw_material_id);
			$data_detail=$this->get_detail($app_stock_opname_raw_material_id);
			//echo "<pre>";
			//print_r($data_detail); 
			//echo "</pre>";
			//die();
			$data=array("data_header"=>$data_header,
									"data_detail"=>$data_detail
			);
			//echo "<pre>";
				//print_r($data);
			//echo "</pre>";
			//die();
				$pdf=PDF::loadView('AppStockOpnameRawMaterialDetail::stock_opname_pdf', compact('data'));
				return $pdf->download('stock_opname_pdf.pdf');
		}
		
}
