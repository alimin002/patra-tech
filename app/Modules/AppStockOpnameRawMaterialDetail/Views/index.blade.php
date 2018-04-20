@extends('main')
@section('title', 'Stock Opname Detail')
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
							<?php $app_stock_opname_raw_material_id = $data_header["app_stock_opname_raw_material_id"]; ?>
							<button class="btn btn-white btn-primary pull-right" onclick="editHeader('{{$app_stock_opname_raw_material_id}}')">
								<i class="fa fa-edit"></i>&nbsp;Edit Stock Opname Raw Material
							</button>
					</div>
			</div>
			<div class="col-sm-4">
					<div class="form-group">
							<label class="control-label" for="invoice_number">Stock Opname Number</label>
							<input type="text" value="{{$data_header['number_stock_opname']}}" readonly id="number_stock_opname" name="number_stock_opname"  placeholder="" class="form-control">
					</div>
			</div>
			<div class="col-sm-4">
					<div class="form-group">
							<label class="control-label" for="stock_opname_date">Stock Opname Date</label>
							<input type="text" readonly value="{{$data_header['stock_opname_date']}}" id="stock_opname_date" name="stock_opname_date" value="" placeholder="" class="form-control">
					</div>
			</div>
			<div class="col-sm-4">
					<div class="form-group">
							<label class="control-label" for="warehouse_supervisor">Warehouse Supervisor</label>
							<input type="text" readonly value="{{$data_header['warehouse_supervisor']}}" id="warehouse_supervisor" name="warehouse_supervisor"  placeholder="" class="form-control">
					</div>
			</div>
			<input type="hidden" readonly value="" id="app_stock_opname_raw_material_id" name="app_stock_opname_raw_material_id"  placeholder="" class="form-control"/>
			<div class="col-sm-12">
				<div class="dataTables_filter" id="sample-table-2_filter">
					<button class="btn btn-white btn-primary" data-toggle="modal" data-target="#modal-add"><i class="fa fa-plus">&nbsp;Add Item Stock Opname</i></button>
				</div>
			</div>	
		<div class="col-xs-12">
			<h3 class="header smaller lighter blue">Stock Opname Item</h3>
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
								<form action="{{url('stock_opname_raw_material_detail')}}" method="post">
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
								Stock 
							</th>
							<th class="sorting" role="columnheader" tabindex="0" aria-controls="sample-table-2" rowspan="1" colspan="1" aria-label="								
								Update
							: activate to sort column ascending">
								<i class="ace-icon fa fa-clock-o bigger-110 hidden-480"></i>
								Stock Opname
							</th>
							<th class="hidden-480 sorting" role="columnheader" tabindex="0" aria-controls="sample-table-2" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending">
								Deviation
							</th>
							<th class="sorting_disabled" role="columnheader" rowspan="1" colspan="1" aria-label=""></th>
						</tr>
					</thead>			
						<tbody role="alert" aria-live="polite" aria-relevant="all" id="tbody_stock_opname">
							<!--data duisplayed with javascript-->
						</tbody>
						</table>
						<div class="row">
						<div class="col-xs-6">
							<button class="btn btn-white btn-primary" onclick="doStockOpname()"><i class="fa fa-floppy-o" aria-hidden="true">&nbsp;Save Item @yield("title")</i></button>
									<div class="btn-group">
											<button class="btn btn-white btn-primary">others</button>
											<button data-toggle="dropdown" class="btn btn-white btn-primary">
												<span class="ace-icon fa fa-caret-down icon-only"></span>
											</button>

											<ul class="dropdown-menu dropdown-success">
												<li>
													<a href="{{url('stock_opname_raw_material_detail/preview_pdf/'.$app_stock_opname_raw_material_id)}}">Print Stock Opname</a>
												</li>
												<li>
													<a href="{{url('stock_opname_raw_material_detail/download_pdf/'.$app_stock_opname_raw_material_id)}}">Dowload Stock Opname</a>
												</li>									
												<li>
													<a href="#">Send Stock Opname To Email</a>
												</li>									
												<li class="divider"></li>
											</ul>
											<a href="{{url('stock_opname_raw_material')}}"><button class="btn btn-white btn-primary"><i class="ace-icon fa fa-angle-double-left" aria-hidden="true">&nbsp;Back to stock opname</i></button></a>
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
					<form name="frm-stock-opname-item" id="frm-stock-opname-item" action="{{url('stock_opname_raw_material_detail/save')}}" method="post">
						{{ csrf_field() }}
						<textarea class="col-md-12" name="data_stock_opname_item" id="data_stock_opname_item">{{$json_stock_opname_raw_material}}</textarea>
						<input readonly type="text" value="{{$data_header['app_stock_opname_raw_material_id']}}" name="app_stock_opname_raw_material_id_in_detail" id="app_stock_opname_raw_material_id_in_detail" required="" class="form-control"/>
					</form>
			</div>
		</div>
	</div>
	@include('AppStockOpnameRawMaterialDetail::create') 
	@include('AppStockOpnameRawMaterialDetail::edit_header')
	@include('AppStockOpnameRawMaterialDetail::action_js')
	@include('AppStockOpnameRawMaterialDetail::edit')						
	@include('AppStockOpnameRawMaterialDetail::delete')	
	@endsection