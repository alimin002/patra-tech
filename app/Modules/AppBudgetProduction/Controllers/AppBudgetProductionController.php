<?php

namespace App\Modules\AppBudgetProduction\Controllers;

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
				$data_detail=AppSalesDetail::select('app_sales_detail.*','app_sales.*','app_products.*',"app_products.name as product_name")
																					->leftJoin('app_sales','app_sales.app_sales_id','=','app_sales_detail.app_sales_detail_id')
																					->leftJoin('app_products','app_products.app_product_id','=','app_sales_detail.app_product_id')
																					->where('app_sales_detail.app_sales_id', '=',$app_sales_id)->get();
				$lookup_product	= Lookup::getLookupProduct();	
				$data_sales				= json_decode(json_encode($data_detail),true);
				$json_sales=json_encode($data_sales);
				
        return view("AppBudgetProduction::index")
								->with("lookup_product",$lookup_product)
								->with("json_sales",$json_sales)
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
}
