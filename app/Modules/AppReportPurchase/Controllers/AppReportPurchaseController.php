<?php

namespace App\Modules\AppReportPurchase\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\AppPurchaseDetail\Models\AppPurchaseDetail;
use App\Modules\AppSales\Models\AppSales;
use app\Providers\Common;
Use Redirect;
use DB;
use PDF;
use Session;
use Mail;

class AppReportPurchaseController extends Controller
{
		public function download_pdf($date_start,$date_end){
			
			//echo $date_start;
			//echo $date_end;	
			$data_header=array("date_start"=>$date_start,"date_end"=>$date_end);			
			$data_detail=AppPurchaseDetail::select('app_purchase_detail.*','app_purchase.*')																						
																					->leftJoin('app_purchase','app_purchase.app_purchase_id','=','app_purchase_detail.app_purchase_id')
																					->selectRaw('SUM(sub_total) total_purchase')																					
																					->whereBetween('purchase_date', array($date_start,$date_end))																					
																					->groupBy("app_purchase_detail.app_purchase_id")																																										
																					->get();	
			$data=array("data_header"=>$data_header,"data_detail"=>$data_detail);																	
			$pdf=PDF::loadView('AppReportPurchase::report_purchase_pdf', compact('data'));
			return $pdf->download('report_purchase_pdf.pdf');
			
		
		}
		
		//
		public function print_report(Request $request){
			//echo $request["date-range-picker"];
			$from=$request["date_start"];
			$to  =$request["date_end"];
			$data=AppPurchaseDetail::select('app_purchase_detail.*','app_purchase.*','app_suplier.*','app_suplier.name as suplier_name')																						
																					->leftJoin('app_purchase','app_purchase.app_purchase_id','=','app_purchase_detail.app_purchase_id')
																					->leftJoin('app_suplier','app_suplier.app_suplier_id','=','app_suplier.app_suplier_id')
																					->selectRaw('SUM(sub_total) total_purchase')																					
																					->whereBetween('purchase_date', array($from, $to))																					
																					->groupBy("app_purchase_detail.app_purchase_id")																																										
																					->get();	
								//echo "<pre>";																					
								///print_r($data);
								//echo "</pre>";
								//die();								
								return view("AppReportPurchase::index")
								->with("date_start",$from)
								->with("date_end",$to)
				        ->with("data",$data);
		}
		
			public function sendReportToEmail($date_start,$date_end,$email_address){
			
			//echo $date_start;
			//echo $date_end;	
			$data_header=array("date_start"=>$date_start,"date_end"=>$date_end);			
			$data_detail=AppPurchaseDetail::select('app_purchase_detail.*','app_purchase.*','app_suplier.*','app_suplier.name as suplier_name')																						
																					->leftJoin('app_purchase','app_purchase.app_purchase_id','=','app_purchase_detail.app_purchase_id')
																					->leftJoin('app_suplier','app_suplier.app_suplier_id','=','app_suplier.app_suplier_id')
																					->selectRaw('SUM(sub_total) total_purchase')																					
																					->whereBetween('purchase_date', array($date_start, $date_end))																					
																					->groupBy("app_purchase_detail.app_purchase_id")																																										
																					->get();
																					
				$data = array('data'=>array("data_header"=>$data_header,
									  "data_detail"=>$data_detail)									
										);																	
				//echo $suplier_email; die();	
			$email_data=array("email_to"=>$email_address,
												"email_from"=>"patradigitalgarage@gmail.com"
			);
      Mail::send('AppReportPurchase::email_report_purchase', $data, function($email_message)use($email_data){
         $email_message->to($email_data["email_to"], 'Report Purchase')->subject('Report Purchase');
         $email_message->from($email_data["email_from"],'Alimin');
      });
      $message="email has sent...";
			return Redirect::to('report_purchase')
												->with("message",$message);
			
		
		}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("AppReportPurchase::index");
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
