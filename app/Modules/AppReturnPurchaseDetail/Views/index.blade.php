@extends('main')
@section('title', 'Return Purchase Detail')
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
							<?php $app_return_purchase_id = $data_header["app_return_purchase_id"]; ?>
							<button class="btn btn-white btn-primary pull-right" onclick="editHeader('{{$app_return_purchase_id}}')">
								<i class="fa fa-edit"></i>&nbsp;Edit Return Purchase
							</button>
					</div>
			</div>
			<div class="col-sm-3">
					<div class="form-group">
							<label class="control-label" for="invoice_number">Return Number</label>
							<input type="text" value="{{$data_header['return_purchase_number']}}" readonly id="return_purchase_number" name="return_purchase_number"  placeholder="" class="form-control">
					</div>
			</div>
			<div class="col-sm-3">
					<div class="form-group">
							<label class="control-label" for="suplier_name">Suplier Name</label>
							<input type="text" readonly value="{{$data_header['suplier_name']}}" id="suplier_name" name="suplier_name" value="" placeholder="" class="form-control"/>
					</div>
			</div>
			<div class="col-sm-3">
					<div class="form-group">
							<label class="control-label" for="invoice_number">Invoice Number</label>
							<input type="text" readonly value="{{$data_header['invoice_number']}}" id="invoice_number" name="invoice_number" value="" placeholder="" class="form-control"/>
					</div>
			</div>
			<div class="col-sm-3">
					<div class="form-group">
							<label class="control-label" for="return_date">Return Date</label>
							<input type="text" readonly value="{{$data_header['return_date']}}" id="return_date" name="return_date"  placeholder="" class="form-control">
					</div>
			</div>
			<div class="col-sm-12">
					<div class="form-group">
							<label class="control-label" for="return_date">Return Reason</label>
							<textarea class="form-control" readonly="readonly">{{$data_header["return_reason"]}}</textarea>
					</div>
			</div>
			<input type="hidden" readonly value="" id="app_return_purchase_id" name="app_return_purchase_id"  placeholder="" class="form-control"/>
			<div class="col-sm-12">
				<div class="dataTables_filter" id="sample-table-2_filter">
					<button class="btn btn-white btn-primary" data-toggle="modal" data-target="#modal-add"><i class="fa fa-plus">&nbsp;Add Return Item</i></button>
				</div>
			</div>	
		<div class="col-xs-12">
			<h3 class="header smaller lighter blue">Return Item</h3>
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
								Raw Material Name
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
						<tbody role="alert" aria-live="polite" aria-relevant="all" id="tbody_return_purchase">
							<!--data duisplayed with javascript-->
						</tbody>
				</table>
				<div class="row">
					<div class="col-xs-6">
						<button class="btn btn-white btn-primary" onclick="doReturnRawMaterial()"><i class="fa fa-floppy-o" aria-hidden="true">&nbsp;Save Item @yield("title")</i></button>
								<div class="btn-group">
										<button class="btn btn-white btn-primary">others</button>
										<button data-toggle="dropdown" class="btn btn-white btn-primary">
											<span class="ace-icon fa fa-caret-down icon-only"></span>
										</button>

										<ul class="dropdown-menu dropdown-success">
											<li>
												<a href="{{url('return_purchase_detail/preview_pdf/'.$app_return_purchase_id)}}">Print Return</a>
											</li>
											<li>
												<a href="{{url('return_purchase_detail/download_pdf/'.$app_return_purchase_id)}}">Download Return To PDF</a>
											</li>
											<li>
												<a href="#">Export Return To Excel</a>
											</li>
											<li>
												<a href="#">Send Invoice To Email</a>
											</li>									
											<li class="divider"></li>
										</ul>
										<a href="{{url('return_purchase')}}"><button class="btn btn-white btn-primary"><i class="ace-icon fa fa-angle-double-left" aria-hidden="true">&nbsp;Back to Return Purchase</i></button></a>
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
					<form name="frm-return-purchase-item" id="frm-return-purchase-item" action="{{url('return_purchase_detail/save')}}" method="post">
						{{ csrf_field() }}
						<textarea class="col-md-12" name="data_return_purchase_item" id="data_return_purchase_item">{{$json_return_purchase}}</textarea>
						<input readonly type="text" value="{{$data_header['app_return_purchase_id']}}" name="app_return_purchase_id_in_detail" id="app_return_purchase_id_in_detail" required="" class="form-control"/>
					</form>
			</div>
		</div>
	</div>
	@include('AppReturnPurchaseDetail::create') 
	@include('AppReturnPurchaseDetail::edit_header')
	@include('AppReturnPurchaseDetail::action_js')
	@include('AppReturnPurchaseDetail::edit')						
	@include('AppReturnPurchaseDetail::delete')	
	@endsection