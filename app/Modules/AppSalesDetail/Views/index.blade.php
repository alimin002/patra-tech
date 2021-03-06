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
							<?php $app_sales_id = $data_header["app_sales_id"]; ?>
							<button class="btn btn-white btn-primary pull-right" onclick="editHeader('{{$app_sales_id}}')">
								<i class="fa fa-edit"></i>&nbsp;Edit Sale
							</button>
					</div>
			</div>
			<div class="col-sm-6">
					<div class="form-group">
							<label class="control-label" for="invoice_number">Invoice Number</label>
							<input type="text" value="{{$data_header['invoice_number']}}" readonly id="invoice_number" name="invoice_number"  placeholder="" class="form-control">
					</div>
			</div>
			<div class="col-sm-6">
					<div class="form-group">
							<label class="control-label" for="customer_name">Customer Name</label>
							<input type="text" readonly value="{{$data_header['customer_name']}}" id="customer_name" name="customer_name" value="" placeholder="" class="form-control">
					</div>
			</div>
			<div class="col-sm-6">
					<div class="form-group">
							<label class="control-label" for="customer_email">Customer Email</label>
							<input type="text" readonly value="{{$data_header['customer_email']}}" id="customer_email" name="customer_email" value="" placeholder="" class="form-control">
					</div>
			</div>
			<div class="col-sm-6">
					<div class="form-group">
							<label class="control-label" for="sales_date">Sale Date</label>
							<input type="text" readonly value="{{$data_header['sale_date']}}" id="sale_date" name="sale_date"  placeholder="" class="form-control">
					</div>
			</div>
			<input type="hidden" readonly value="" id="app_sales_id" name="app_sales_id"  placeholder="" class="form-control"/>
			{{--
			<div class="col-sm-12">
				<div class="dataTables_filter" id="sample-table-2_filter">
					<button class="btn btn-white btn-primary" onclick="addItem()"><i class="fa fa-plus">&nbsp;Add Item Sales</i></button>
				</div>
			</div>	
			--}}
		<div class="col-xs-12">
			<h3 class="header smaller lighter blue">Sales Item</h3>			
			<div>				
				<div id="sample-table-2_wrapper" class="dataTables_wrapper form-inline" role="grid">	
					<button  style="margin-bottom:5px;" class="btn btn-white btn-primary" onclick="addItem()"><i class="fa fa-plus">&nbsp;Add Item Sales</i></button>					
					<table id="sample-table-2" class="table table-striped table-bordered table-hover dataTable" aria-describedby="sample-table-2_info">
					<thead>
						<tr role="row">						
							<th class="sorting" role="columnheader" tabindex="0" aria-controls="sample-table-2" rowspan="1" colspan="1" aria-label="Domain: activate to sort column ascending">
								Product name
							</th>
							<th class="sorting" role="columnheader" tabindex="0" aria-controls="sample-table-2" rowspan="1" colspan="1" aria-label="Clicks: activate to sort column ascending">
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
							<button class="btn btn-white btn-primary" onclick="doSaleProduct()"><i class="fa fa-floppy-o" aria-hidden="true">&nbsp;Save Item @yield("title")</i></button>
									<div class="btn-group">
											<button class="btn btn-white btn-primary">others</button>
											<button data-toggle="dropdown" class="btn btn-white btn-primary" onclick="scrollToLowewst()">
												<span class="ace-icon fa fa-caret-down icon-only"></span>
											</button>
											<ul class="dropdown-menu dropdown-success">
												<li>
													<a href="{{url('sales_detail/preview_pdf/'.$app_sales_id)}}">Print Invoice</a>
												</li>
												<li>
													<a href="{{url('sales_detail/download_pdf/'.$app_sales_id)}}">Download Invoice To PDF</a>
												</li>										
												<li>
													<a href="{{url('sales_detail/send_invoice_to_email/'.$app_sales_id)}}">Send Invoice To Email</a>
												</li>									
												<li class="divider"></li>
											</ul>
											<a href="{{url('sales')}}"><button class="btn btn-white btn-primary"><i class="ace-icon fa fa-angle-double-left" aria-hidden="true">&nbsp;Back to sales</i></button></a>
										</div>
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
					<form name="frm-sales-item" id="frm-sales-item" action="{{url('sales_detail/save')}}" method="post">
						{{ csrf_field() }}
						<textarea class="col-md-12" name="data_sales_item" id="data_sales_item">{{$json_sales}}</textarea>
							<textarea class="col-md-12" name="deleted_item" id="deleted_item"></textarea>
						<input readonly type="text" value="{{$data_header['app_sales_id']}}" name="app_sales_id_in_detail" id="app_sales_id_in_detail" required="" class="form-control"/>
					</form>
			</div>
		</div>
	</div>
	@include('AppSalesDetail::expand') 
	@include('AppSalesDetail::create') 
	@include('AppSalesDetail::edit_header')
	@include('AppSalesDetail::action_js')
	@include('AppSalesDetail::edit')						
	@include('AppSalesDetail::delete')	
	@endsection