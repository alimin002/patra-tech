<?php

namespace App\Modules\AppReportSales\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\AppSalesDetail\Models\AppSalesDetail;
use App\Modules\AppSales\Models\AppSales;
use app\Providers\Common;
Use Redirect;
use DB;
use PDF;
use Session;
use Mail;
class AppReportSalesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("AppReportSales::index");
    }
		
		public function print_report(Request $request){
			//echo $request["date-range-picker"];
			$from="2018-04-03";
			$to="2018-04-17";
			$data=AppSalesDetail::select('app_sales_detail.*','app_sales.*')
																					->leftJoin('app_sales','app_sales.app_sales_id','=','app_sales_detail.app_sales_id')																				
																					->whereBetween('sale_date', array($from, $to))
																					->get();
																					/***
																					echo "<pre>";
																						print_r($data);
																					echo "</pre>";
																					die();
																					***/
																					
								return view("AppReportSales::report_sale")
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
