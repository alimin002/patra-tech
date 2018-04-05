@extends('main')
@section('title', 'Sales Detail')
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
						
							<button class="btn btn-default buttons-html5 pull-right" onclick="">
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
			<div class="col-sm-12">
				<div class="dataTables_filter" id="sample-table-2_filter">
					<button class="btn btn-default" data-toggle="modal" data-target="#modal-add"><i class="fa fa-plus">&nbsp;Add Item Sales</i></button>
				</div>
			</div>	
		<div class="col-xs-12">
			<h3 class="header smaller lighter blue">Sales Item</h3>
			<div class="table-header">
				Results for "@yield('title')"
			</div>
			<div>
				
				<div id="sample-table-2_wrapper" class="dataTables_wrapper form-inline" role="grid">
					<div class="row">
						<div class="col-xs-6">
							<div id="sample-table-2_length" class="dataTables_length">
								<label>Display <select size="1" name="sample-table-2_length" aria-controls="sample-table-2"><option value="10" selected="selected">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> records</label>
							</div>
						</div>
						<div class="col-xs-6">
							<div class="dataTables_filter" id="sample-table-2_filter">
								<form action="{{url('detail_sales')}}" method="post">
									{{ csrf_field() }}
								<label>Search: <input placeholder="type keyword" name="keyword" type="text" aria-controls="sample-table-2"></label>
								</form>
							</div>
						</div>
					</div>
					<table id="sample-table-2" class="table table-striped table-bordered table-hover dataTable" aria-describedby="sample-table-2_info">
					<thead>
						<tr role="row">
							<th class="center sorting_disabled" role="columnheader" rowspan="1" colspan="1" aria-label="">
								<label class="position-relative">
									<input type="checkbox" class="ace">
									<span class="lbl"></span>
								</label>
							</th>
							<th class="sorting" role="columnheader" tabindex="0" aria-controls="sample-table-2" rowspan="1" colspan="1" aria-label="Domain: activate to sort column ascending">
								Product name
							</th>
							<th class="hidden-480 sorting" role="columnheader" tabindex="0" aria-controls="sample-table-2" rowspan="1" colspan="1" aria-label="Clicks: activate to sort column ascending">
								Unit Price
							</th>
							<th class="sorting" role="columnheader" tabindex="0" aria-controls="sample-table-2" rowspan="1" colspan="1" aria-label="								
								Update
							: activate to sort column ascending">
								<i class="ace-icon fa fa-clock-o bigger-110 hidden-480"></i>
								QTY
							</th>
							<th class="hidden-480 sorting" role="columnheader" tabindex="0" aria-controls="sample-table-2" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending">
								Sub Total
							</th>
							<th class="sorting_disabled" role="columnheader" rowspan="1" colspan="1" aria-label=""></th>
						</tr>
					</thead>			
						<tbody role="alert" aria-live="polite" aria-relevant="all" id="tbody_sales">
							<!--data duisplayed with javascript-->
						</tbody>
						</table>
						<div class="row">
						<div class="col-xs-6">
							<button class="btn btn-white btn-primary" onclick="doPurchaseRawMaterial()"><i class="fa fa-floppy-o" aria-hidden="true">&nbsp;Save Item @yield("title")</i></button>
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
		<div class="col-sm-12" style="display:block">
			<div class="form-group">
					<form name="frm-sales-item" id="frm-sale-item" action="{{url('purchase_detail/save')}}" method="post">
						{{ csrf_field() }}
						<textarea class="col-md-12" name="data_sales_item" id="data_sales_item">{{$json_sales}}</textarea>
						<input readonly type="text" value="" name="app_purchase_idx" id="app_purchase_idx" required="" class="form-control"/>
					</form>
			</div>
		</div>
	</div>
	@include('AppSalesDetail::create') 
	@include('AppSalesDetail::edit_header')
	@include('AppSalesDetail::action_js')
	@include('AppSalesDetail::edit')						
	@include('AppSalesDetail::delete')	
	@endsection