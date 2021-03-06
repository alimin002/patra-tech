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
			$from=$request["date_start"];
			$to  =$request["date_end"];
			$data=AppSalesDetail::select('app_sales_detail.*','app_sales.*')																						
																					->leftJoin('app_sales','app_sales.app_sales_id','=','app_sales_detail.app_sales_id')
																					->selectRaw('SUM(sub_total) total_invoice')																					
																					->whereBetween('sale_date', array($from, $to))																					
																					->groupBy("app_sales_detail.app_sales_id")																																										
																					->get();																																																							
																					
								return view("AppReportSales::index")
								->with("date_start",$from)
								->with("date_end",$to)
				        ->with("data",$data);
		}
		
		public function download_pdf($date_start,$date_end){
			
			//echo $date_start;
			//echo $date_end;	
			$data_header=array("date_start"=>$date_start,"date_end"=>$date_end);			
			$data_detail=AppSalesDetail::select('app_sales_detail.*','app_sales.*')																						
																					->leftJoin('app_sales','app_sales.app_sales_id','=','app_sales_detail.app_sales_id')
																					->selectRaw('SUM(sub_total) total_invoice')																					
																					->whereBetween('sale_date', array($date_start,$date_end))																					
																					->groupBy("app_sales_detail.app_sales_id")																																										
																					->get();	
			$data=array("data_header"=>$data_header,"data_detail"=>$data_detail);																	
			$pdf=PDF::loadView('AppReportSales::report_sales_pdf', compact('data'));
			return $pdf->download('report_sales_pdf.pdf');
			
		
		}
		
		public function sendReportToEmail($date_start,$date_end,$email_address){
			
			//echo $date_start;
			//echo $date_end;	
			$data_header=array("date_start"=>$date_start,"date_end"=>$date_end);			
			$data_detail=AppSalesDetail::select('app_sales_detail.*','app_sales.*')																						
																					->leftJoin('app_sales','app_sales.app_sales_id','=','app_sales_detail.app_sales_id')
																					->selectRaw('SUM(sub_total) total_invoice')																					
																					->whereBetween('sale_date', array($date_start,$date_end))																					
																					->groupBy("app_sales_detail.app_sales_id")																																										
																					->get();	
																					
				$data = array('data'=>array("data_header"=>$data_header,
									  "data_detail"=>$data_detail)									
										);																	
				//echo $suplier_email; die();	
			$email_data=array("email_to"=>$email_address,
												"email_from"=>"patradigitalgarage@gmail.com"
			);
      Mail::send('AppReportSales::email_report_sales', $data, function($email_message)use($email_data){
         $email_message->to($email_data["email_to"], 'Report Sales')->subject('Report Sales');
         $email_message->from($email_data["email_from"],'Alimin');
      });
      $message="email has sent...";
			return Redirect::to('report_sales')
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
    public function edit($app_sales_detail_id,$app_sales_id)
    {
        //
				$data_detail=AppSalesDetail::select('app_sales_detail.*','app_sales.*','app_products.*',"app_products.name as product_name")
																					->leftJoin('app_sales','app_sales.app_sales_id','=','app_sales_detail.app_sales_id')
																					->leftJoin('app_products','app_products.app_product_id','=','app_sales_detail.app_product_id')
																					->where('app_sales_detail.app_sales_detail_id', '=',$app_sales_detail_id)->first();
																					
				$data_sum=AppSalesDetail::select('app_sales_detail.*','app_sales.*','app_products.*',"app_products.name as product_name")
																					->leftJoin('app_sales','app_sales.app_sales_id','=','app_sales_detail.app_sales_id')
																					->leftJoin('app_products','app_products.app_product_id','=','app_sales_detail.app_product_id')
																					->where('app_sales_detail.app_sales_id', '=',$app_sales_id)
																					->sum('sub_total');
																					
																					//echo $data_detail["invoice_number"];
																					//die();
																					
			$data_report=array(
				"invoice_number" =>$data_detail["invoice_number"],
				"sale_date"      =>$data_detail["sale_date"],
				"customer_name"  =>$data_detail["customer_name"],
				"customer_email" =>$data_detail["customer_email"],
				"total_invoice"  =>$data_sum
			);
		
			//echo "<pre>";
				//print_r($data_sum);
			//echo "<pre>";
			//die();
																					
				return json_encode($data_report);
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
