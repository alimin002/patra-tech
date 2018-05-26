@extends('main')
@section('title', 'Report Sales')
@section('content')
<?php use app\Providers\Common; ?>
<link rel="stylesheet" href="{{url('assets/css/datepicker.css')}}" />
<link rel="stylesheet" href="{{url('assets/css/bootstrap-timepicker.css')}}" />
<link rel="stylesheet" href="{{url('assets/css/daterangepicker.css')}}" />
<link rel="stylesheet" href="{{url('assets/css/bootstrap-datetimepicker.css')}}" />
<div class="page-content">
		<div class="col-xs-12">
				@if(session()->has('message'))							
					<div class="alert alert-block alert-success">
						<button type="button" class="close" data-dismiss="alert">
							<i class="ace-icon fa fa-times"></i>
						</button>

						<i class="ace-icon fa fa-check green"></i>

						{{session()->get('message')}}
					</div>
				@endif
			
			<h3 class="header smaller lighter blue">Data @yield("title")</h3>
			<div>
				<div id="sample-table-2_wrapper" class="dataTables_wrapper form-inline" role="grid">
					<div class="row">
						<div class="col-xs-12">
							<div class="input-group">
								<span class="input-group-addon">
									<i class="fa fa-calendar bigger-110"></i>
								</span>
								<form id="frm-filter" name="frm-filter" action="{{url('report_sales/print_report')}}" method="post">
									{{ csrf_field() }}
								<input placeholder="Choose Report Period" class="form-control" type="text" name="date-range-picker" id="id-date-range-picker-1" required="" onchange="printReport(this)"/>						
								<input type="hidden" @if(isset($date_start)) value="{{$date_start}}" @endif name="date_start" id="date_start"/>
								<input type="hidden" @if(isset($date_end)) value="{{$date_end}}" @endif name="date_end" id="date_end"/>
							</div>
								<br/>
								</form>
						<button class="btn btn-info" onclick="printReport()">&nbsp;Create Report</button>
						</div>
						
						
						<!-- /section:plugins/date-time.daterangepicker -->
					</div>
					<table id="sample-table-2" class="table table-striped table-bordered table-hover dataTable" aria-describedby="sample-table-2_info">
					<thead>
						<tr role="row">
							<th class="sorting" role="columnheader" tabindex="0" aria-controls="sample-table-2" rowspan="1" colspan="1" aria-label="Domain: activate to sort column ascending">
								Invoice Number
							</th>
							<th class="sorting" role="columnheader" tabindex="0" aria-controls="sample-table-2" rowspan="1" colspan="1" aria-label="Price: activate to sort column ascending">
								Invoice Date
							</th>
							<th class="sorting" role="columnheader" tabindex="0" aria-controls="sample-table-2" rowspan="1" colspan="1" aria-label="Clicks: activate to sort column ascending">
								Customer Name
							</th>
							<th class="hidden-480" role="columnheader" tabindex="0" aria-controls="sample-table-2" rowspan="1" colspan="1" aria-label="								
								Update
							: activate to sort column ascending">
								<i class="ace-icon fa fa-clock-o bigger-110 hidden-480"></i>
								Total Invoice
							</th>
							<th class="hidden-md hidden-lg">
								
							</th>
						</tr>
					</thead>			
					<tbody role="alert" aria-live="polite" aria-relevant="all">
						<tbody role="alert" aria-live="polite" aria-relevant="all">
						@if((isset($data)))
							<?php 							
								$row_style=1;
								//if(isset($data)){}
							?>
							@foreach($data as $key => $values)
							<tr @if($row_style % 2 ==0) class="odd" @else class="even"  @endif>							
									<td class="sorting">{{$values["invoice_number"]}}</td>
									<td class="sorting">{{$values["sale_date"]}}</td>
									<td class="sorting">{{$values["customer_name"]}}</td>									
									<td class="hidden-480">{{Common::number_with_commas($values["total_invoice"])}}</td>
									<td class="hidden-md hidden-lg">
										<div class="inline position-relative">
										<button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
											<i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
										</button>

										<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
											<li>
												<a href="#" onclick="expandData('{{$values['app_sales_detail_id']}}','{{$values['app_sales_id']}}')" class="tooltip-success" data-rel="tooltip" title="" data-original-title="Edit" >
													<span class="green" >
														<i class="fa fa-expand"></i>
													</span>
												</a>
											</li>																	
										</ul>
									</div>
									</td>
							</tr>
						<?php 
								$row_style ++; 
							
						?>
						@endforeach
						@endif
				</tbody>
				</tbody>
			</table>
			<div class="row">
				<div class="col-xs-6">
					<button onclick="downloadPdf()" @if(isset($data)==false) disabled ="disabled" @endif class="btn btn-white btn-primary"><i class="fa fa-print">&nbsp;Print Report</i></button>				
					<button onclick="sendReportViaEmail()" @if(isset($data)==false) disabled ="disabled" @endif class="btn btn-white btn-primary"><i class="fa fa-paper-plane">&nbsp;Send Report Via Email</i></button>
					<div class="dataTables_info" id="sample-table-2_info"><!--Showing 1 to 10 of 23 entries--></div>
				</div>
				<div class="col-xs-6">
				<div class="dataTables_paginate paging_bootstrap">
					<ul class="pagination">
					{{--	{{$data->links()}}--}}
					</ul>
				</div>
				</div>
			</div>
					</div>
			</div>
		</div>
	</div>
@include('AppReportSales::action_js')
@include('AppReportSales::form_email')
@include('AppReportSales::expand')
@endsection