@extends('main')
@section('title', 'Report Sales')
@section('content')
<link rel="stylesheet" href="{{url('assets/css/datepicker.css')}}" />
<link rel="stylesheet" href="{{url('assets/css/bootstrap-timepicker.css')}}" />
<link rel="stylesheet" href="{{url('assets/css/daterangepicker.css')}}" />
<link rel="stylesheet" href="{{url('assets/css/bootstrap-datetimepicker.css')}}" />
<div class="page-content">
		<div class="col-sm-12">
				<h3 class="header smaller lighter blue">@yield("title")</h3>
				@if(session()->has('message'))							
				<div class="alert alert-block alert-success">
					<button type="button" class="close" data-dismiss="alert">
						<i class="ace-icon fa fa-times"></i>
					</button>
					<i class="ace-icon fa fa-check green"></i>
					{{session()->get('message')}}
				</div>
			@endif
		</div>
		<div class="row">
			<div class="col-sm-6">
				<div class="col-xs-8 col-sm-11">
					<!-- #section:plugins/date-time.daterangepicker -->
					<div class="input-group">
						<span class="input-group-addon">
							<i class="fa fa-calendar bigger-110"></i>
						</span>
						<form id="frm-filter" name="frm-filter" action="{{url('report_sales/print_report')}}" method="post">
							{{ csrf_field() }}
						<input placeholder="Choose Report Period" class="form-control" type="text" name="date-range-picker" id="id-date-range-picker-1" required="" onchange="printReport(this)">						
					</div>
					<br/>
					 </form>
					<button class="btn btn-info" onclick="printReport()"><i class="fa fa-print" aria-hidden="true"></i>&nbsp;Print Report</button>
					
					<!-- /section:plugins/date-time.daterangepicker -->
				</div>
			</div>
		</div>
		<div class="row">
		<div class="col-sm-12">
		<div class="col-xs-8 col-sm-11">
				<table id="sample-table-2" class="table table-striped table-bordered table-hover dataTable" aria-describedby="sample-table-2_info">
					<thead>
						<tr role="row">
							<th class="sorting" role="columnheader" tabindex="0" aria-controls="sample-table-2" rowspan="1" colspan="1" aria-label="Domain: activate to sort column ascending">
								Invoice Number
							</th>
							<th class="sorting" role="columnheader" tabindex="0" aria-controls="sample-table-2" rowspan="1" colspan="1" aria-label="Price: activate to sort column ascending">
								Invoice Date
							</th>
							<th class="hidden-480 sorting" role="columnheader" tabindex="0" aria-controls="sample-table-2" rowspan="1" colspan="1" aria-label="Clicks: activate to sort column ascending">
								Customer Name
							</th>
							<th class="sorting" role="columnheader" tabindex="0" aria-controls="sample-table-2" rowspan="1" colspan="1" aria-label="								
								Update
							: activate to sort column ascending">
								<i class="ace-icon fa fa-clock-o bigger-110 hidden-480"></i>
								Total Invoice
							</th>
						</tr>
					</thead>			
				<tbody role="alert" aria-live="polite" aria-relevant="all">
						<tbody role="alert" aria-live="polite" aria-relevant="all">
							<?php $row_style=1; ?>
							@foreach($data as $key => $values)
							<tr @if($row_style % 2 ==0) class="odd" @else class="even"  @endif>							
									<td class=" ">{{$values["invoice_number"]}}</td>
									<td class=" ">{{$values["sale_date"]}}</td>
									<td class="hidden-480 ">{{$values["customer_name"]}}</td>
									<td class="hidden-480 ">{{$values["customer_email"]}}</td>
									<td class=" ">{{$values["description"]}}</td>
							</tr>
						<?php $row_style ++; ?>
						@endforeach
				</tbody>
				</tbody>
			</table>
			</div>
			</div>
		</div>
</div>
@include('AppReportSales::action_js')
@endsection