@extends('main')
@section('title', 'Budget Production')
@section('content')
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
					<div class="form-group">
							<?php $app_sales_id = $data_header["app_sales_id"]; ?>
							<button class="btn btn-white btn-primary pull-right" onclick="editHeader('{{$app_sales_id}}')">
								<i class="fa fa-edit"></i>&nbsp;Edit Sale
							</button>
					</div>
			</div>
			<div class="col-sm-4">
					<div class="form-group">
							<label class="control-label" for="invoice_number">Invoice Number</label>
							<input type="text" value="{{$data_header['invoice_number']}}" readonly id="invoice_number" name="invoice_number"  placeholder="" class="form-control">
					</div>
			</div>
			<div class="col-sm-4">
					<div class="form-group">
							<label class="control-label" for="customer_name">Customer Name</label>
							<input type="text" readonly value="{{$data_header['customer_name']}}" id="customer_name" name="customer_name" value="" placeholder="" class="form-control">
					</div>
			</div>
			<div class="col-sm-4">
					<div class="form-group">
							<label class="control-label" for="sales_date">Sales Date</label>
							<input type="text" readonly value="{{$data_header['sale_date']}}" id="sale_date" name="sale_date"  placeholder="" class="form-control">
					</div>
			</div>
			<input type="hidden" readonly value="" id="app_sales_id" name="app_sales_id"  placeholder="" class="form-control"/>			
		<div class="col-xs-12">
			<h3 class="header smaller lighter blue">Sales Item</h3>
			<div>
				
				<div id="sample-table-2_wrapper" class="dataTables_wrapper form-inline" role="grid">			
					<table id="sample-table-2" class="table table-striped table-bordered table-hover dataTable" aria-describedby="sample-table-2_info">
					<thead>
						<tr role="row">			
							<th class="sorting" role="columnheader" tabindex="0" aria-controls="sample-table-2" rowspan="1" colspan="1" aria-label="Domain: activate to sort column ascending">
								Product name
							</th>
							<th class="sorting" role="columnheader" tabindex="0" aria-controls="sample-table-2" rowspan="1" colspan="1" aria-label="Clicks: activate to sort column ascending">
								Unit Price
							</th>
							<th class="sorting" role="columnheader" tabindex="0" aria-controls="sample-table-2" rowspan="1" colspan="1" aria-label="Clicks: activate to sort column ascending">
								Quantity
							</th>
							<th class=" " role="columnheader" tabindex="0" aria-controls="sample-table-2" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending">
								Resources Prediction
							</th>
						</tr>
					</thead>			
						<tbody role="alert" aria-live="polite" aria-relevant="all" id="tbody_sales">
							<!--data duisplayed with javascript-->
						</tbody>
						</table>
						<div class="row">
						<div class="col-xs-6">
							<button class="btn btn-white btn-primary" onclick="doApprovePrediction()">Approve Prediction (Stock Out)</i></button>	
							<a href="{{url('sales')}}"><button class="btn btn-white btn-primary"><i class="ace-icon fa fa-angle-double-left" aria-hidden="true">&nbsp;Back to sales</i></button></a>
							<div class="dataTables_info" id="sample-table-2_info"><!--Showing 1 to 10 of 23 entries--></div>
						</div>
						<div class="col-xs-6">
						<div class="dataTables_paginate paging_bootstrap">
							<ul class="pagination">
							</ul>
						</div>
						</div>
						</div>
					</div>
			</div>
		</div>
		<div class="col-sm-12" style="display:none">
			<div class="form-group">
					<form name="frm-approve-prediction" id="frm-approve-prediction" method="post" action="{{url('budget_production/approve_prediction')}}">
						{{ csrf_field() }}
						<!--change data_sales_item to data_prediction_item -->
						<textarea class="col-md-12" name="data_sales_item" id="data_sales_item">{{$json_sales}}</textarea>
						<textarea class="col-md-12" name="data_composition" id="data_composition"></textarea>
						<input readonly type="text" value="{{$data_header['app_sales_id']}}" name="app_sales_id_in_detail" id="app_sales_id_in_detail" required="" class="form-control"/>
					</form>
			</div>
		</div>
	</div>
@include('AppBudgetProduction::create')
@include('AppBudgetProduction::action_js')
@include('AppBudgetProduction::edit')						
@include('AppBudgetProduction::delete')	
@endsection