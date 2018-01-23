@extends('main')
@section('title', 'Purchase')
@section('content')
	<div class="row wrapper border-bottom white-bg page-heading">
			<div class="col-lg-10">
					<h2>Purchase</h2>
					<ol class="breadcrumb">
							<li>
									<a href="{{url('')}}">Home</a>
							</li>
							<li class="active">
									<strong>Purchase Raw Material</strong>
							</li>
					</ol>
			</div>
			<div class="col-lg-2">

			</div>
	</div>
			<?php // release this code when begin to test view file $data=array(); ?>
			<div class="wrapper wrapper-content">
			<div class="row">
					<div class="col-lg-12">									
						<div class="ibox-content">
						@if(session()->has('message'))							
							<div class="alert alert-info">
								{{session()->get('message')}}
							</div>
						@endif
						 <div class="table-responsive">
							<div id="DataTables_Table_0_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
								<div class="html5buttons">
									<div class="dt-buttons btn-group">
										<a class="btn btn-default buttons-html5" data-toggle="modal" data-target="#modal-add">
											<i class="fa fa-plus"></i>&nbsp;<span>Add Data</span>
										</a>
									</div>
								</div>
								<div id="DataTables_Table_0_filter" class="dataTables_filter">
									<label>											
										<form action="{{url('stock_raw_material')}}" method="post">
										 {{ csrf_field() }}
											Search: <input style="width:300px;" name="keyword" type="search" class="form-control input-sm" placeholder="type keyword and press enter" aria-controls="DataTables_Table_0">
										</form>
									</label>
								</div>
								<div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">
									<span class="pull-left">Total Data {{$data->total()}}</span>
									<span class="pull-right">Page{{$data->currentPage()}} Of {{$data->lastPage()}}</span>
								</div>
								<table class="table table-striped table-bordered table-hover dataTables-example dataTable" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info" role="grid">
									<thead>
										<tr role="row">
											<th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 206.566px;">
												Purchase Number
											</th>
											<th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 256.566px;">
												Purchase Date
											</th>
											<th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 229.899px;">
												Supplier Name
											</th>
											<th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 229.899px;">
												Description
											</th>
											<th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 176.566px;">
												Action
											</th>
										</tr>
									</thead>
								<tbody>
								
								@foreach($data as $key => $values)
								<tr class="gradeA odd" role="row">
										<td>{{$values["purchase_number"]}}</td>
										<td>{{$values["purchase_date"]}}</td>
										<td>{{$values["suplier_name"]}}</td>
										<td>{{$values["description"]}}</td>
										<?php
											$app_purchase_id=$values['app_purchase_id'];
										?>
										<td>
											<button class="btn btn-primary" onclick="deleteData('{{$values['app_purchase_id']}}')">
												<i class="fa fa-trash"></i>
											</button>
											<button class="btn btn-primary" onclick="edit('{{$values['app_purchase_id']}}')">
												<i class="fa fa-edit"></i>
											</button>
											<button class="btn btn-primary" onclick="detail('{{$values['app_purchase_id']}}')">
												<i class="fa fa-list" aria-hidden="true"></i>
											</button>
										</td>
								</tr>
								@endforeach
								
								</tbody>              
							 </table>
							<div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
							{{$data->links()}}
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@include('AppPurchase::create')
@include('AppPurchase::action_js')
@include('AppPurchase::edit')						
@include('AppPurchase::delete')	
@endsection