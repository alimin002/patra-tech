@extends('main')
@section('title', 'Stock Out Prediction')
@section('content')
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
				<div class="col-sm-12">
					<div class="form-group">
							<label class="control-label" for="purchase_date">Invoice Number</label>
							<input disabled id="description" name="description"  placeholder="" class="form-control"/>
					</div>
				</div>
			<h3 class="header smaller lighter blue">Stock Out Prediction</h3>
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
								Raw Material Name 
								
							</th>
							<th class="sorting" role="columnheader" tabindex="0" aria-controls="sample-table-2" rowspan="1" colspan="1" aria-label="Price: activate to sort column ascending">
								Composition
							</th>
							<th class="sorting" role="columnheader" tabindex="0" aria-controls="sample-table-2" rowspan="1" colspan="1" aria-label="Price: activate to sort column ascending">
								Action
							</th>									
						</tr>
					</thead>			
						<tbody role="alert" aria-live="polite" aria-relevant="all">
							
						</tbody>
				</tbody>
			</table>
		
			<div class="row">
			<div class="col-xs-6">
				<button class="btn btn-white btn-primary" data-toggle="modal" data-target="#modal-add"><i class="fa fa-plus">&nbsp;Use Prediction</i></button>
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
	</div>
@endsection