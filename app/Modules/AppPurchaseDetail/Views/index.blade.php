@extends('main')
@section('title', 'Purchase Detail')
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
							<?php $app_purchase_id=$data_header["app_purchase_id"];?>
							<button class="btn btn-white btn-primary pull-right" onclick="editHeader('{{$app_purchase_id}}')">
								<i class="fa fa-edit"></i>&nbsp;Edit Purchase
							</button>
					</div>
			</div>
			<div class="col-sm-6">
					<div class="form-group">
							<label class="control-label" for="purchase_number">Purchase Number</label>
							<input type="text" value="{{$data_header['purchase_number']}}" readonly id="purchase_number" name="purchase_number"  placeholder="" class="form-control">
					</div>
			</div>
			<div class="col-sm-6">
					<div class="form-group">
							<label class="control-label" for="suplier_name">Suplier Name</label>
							<input type="text" readonly value="{{$data_header['suplier_name']}}" id="suplier_name" name="suplier_name" value="" placeholder="" class="form-control">
					</div>
			</div>
			<div class="col-sm-6">
					<div class="form-group">
							<label class="control-label" for="purchase_date">Purchase Date</label>
							<input type="text" readonly value="{{$data_header['purchase_date']}}" id="purchase_date" name="purchase_date"  placeholder="" class="form-control">
					</div>
			</div>
			<div class="col-sm-6">
					<div class="form-group">
							<label class="control-label" for="purchase_date">Email</label>
							<input type="text" readonly value="{{$data_header['email']}}" id="purchase_date" name="email"  placeholder="" class="form-control">
					</div>
			</div>
			<div class="col-sm-12">
					<div class="form-group">
							<label class="control-label" for="purchase_date">Description</label>
							<textarea disabled id="description" name="description"  placeholder="" class="form-control">{{$data_header['description']}}</textarea>
					</div>
			</div>
			<input type="hidden" readonly value="{{$data_header['app_purchase_id']}}" id="app_purchase_id" name="app_purchase_id"  placeholder="" class="form-control"/>
			<div class="col-sm-12">
				<div class="dataTables_filter" id="sample-table-2_filter">
					<button class="btn btn-white btn-primary" onclick="addItem()"><i class="fa fa-plus">&nbsp;Add Item Purchase</i></button>
				</div>
			</div>	
		<div class="col-xs-12">
			<h3 class="header smaller lighter blue">Purchase Item</h3>
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
								<form action="{{url('raw_material')}}" method="post">
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
								Raw Material name
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
						<tbody role="alert" aria-live="polite" aria-relevant="all" id="tbody_purchase">
							<!--data duisplayed with javascript-->
						</tbody>
						</table>
						<div class="row">
						<div class="col-xs-6">
							<button class="btn btn-white btn-primary" onclick="doPurchaseRawMaterial()"><i class="fa fa-floppy-o" aria-hidden="true">&nbsp;Save Item Purchase</i></button>
								<div class="btn-group">
											<button class="btn btn-white btn-primary">others</button>
											<button data-toggle="dropdown" class="btn btn-white btn-primary">
												<span class="ace-icon fa fa-caret-down icon-only"></span>
											</button>

											<ul class="dropdown-menu dropdown-success">
												<li>
													<a href="{{url('purchase_detail/download_pdf/'.$app_purchase_id)}}">Print Document PO</a>
												</li>

												<li>
													<a href="{{url('purchase_detail/send_po_to_email/'.$app_purchase_id)}}">Send PO To Email</a>
												</li>									
												<li class="divider"></li>
											</ul>
									</div>
									<a href="{{url('purchase')}}"><button class="btn btn-white btn-primary"><i class="ace-icon fa fa-angle-double-left" aria-hidden="true">&nbsp;Back to purchase</i></button></a>
							<div class="dataTables_info" id="sample-table-2_info"><!--Showing 1 to 10 of 23 entries--></div>
						</div>
						<div class="col-xs-6">
						<div class="dataTables_paginate paging_bootstrap">
							<ul class="pagination">
							{{--{{$data->links()}}--}}
							</ul>
						</div>
						</div>
						</div>
					</div>
			</div>
		</div>
		<div class="col-sm-12" style="display:none">
			<div class="form-group">
					<form name="frm-purchase-item" id="frm-purchase-item" action="{{url('purchase_detail/save')}}" method="post">
						{{ csrf_field() }}
						<textarea class="col-md-12" name="data_purchase_item" id="data_purchase_item">{{$json_purchase}}</textarea>
						<textarea class="col-md-12" name="deleted_item" id="deleted_item"></textarea>
						<input readonly type="text" value="{{$data_header['app_purchase_id']}}" name="app_purchase_idx" id="app_purchase_idx" required="" class="form-control"/>
					</form>
			</div>
		</div>
	</div>
@include('AppPurchaseDetail::create') 
@include('AppPurchaseDetail::edit_header')
@include('AppPurchaseDetail::action_js')
@include('AppPurchaseDetail::edit')						
@include('AppPurchaseDetail::delete')	
@endsection