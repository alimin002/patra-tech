@extends('main')
@section('title', 'Rerturn Purchase')
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
			<h3 class="header smaller lighter blue">Data @yield("title")</h3>
			<div class="table-header">
				Results for "@yield('title')"
			</div>
			<div>
				<div id="sample-table-2_wrapper" class="dataTables_wrapper form-inline" role="grid">
					<div class="row">
						<div class="col-xs-6">
							<div class="dataTables_filter pull-left" id="sample-table-2_filter">
								<form action="{{url('return_purchase')}}" method="post">
									{{ csrf_field() }}
								<label>Search: <input placeholder="type keyword" name="keyword" type="text" aria-controls="sample-table-2"></label>
								</form>
							</div>
						</div>
					</div>
					<table id="sample-table-2" class="table table-striped table-bordered table-hover dataTable" aria-describedby="sample-table-2_info">
					<thead>
						<tr role="row">
							<!--
							<th class="center sorting_disabled" role="columnheader" rowspan="1" colspan="1" aria-label="">
								<label class="position-relative">
									<input type="checkbox" class="ace">
									<span class="lbl"></span>
								</label>
							</th>-->
							<th class="sorting" role="columnheader" tabindex="0" aria-controls="sample-table-2" rowspan="1" colspan="1" aria-label="Domain: activate to sort column ascending">
								Return Number
							</th>
							<th class="sorting" role="columnheader" tabindex="0" aria-controls="sample-table-2" rowspan="1" colspan="1" aria-label="Price: activate to sort column ascending">
								Suplier Name
							</th>
							<th class="sorting" role="columnheader" tabindex="0" aria-controls="sample-table-2" rowspan="1" colspan="1" aria-label="Clicks: activate to sort column ascending">
								Invoice Number
							</th>
							<th class="hidden-480 sorting" role="columnheader" tabindex="0" aria-controls="sample-table-2" rowspan="1" colspan="1" aria-label="								
								Update
							: activate to sort column ascending">
								Return Date
							</th>
							<th class="hidden-480 sorting" role="columnheader" tabindex="0" aria-controls="sample-table-2" rowspan="1" colspan="1" aria-label="Clicks: activate to sort column ascending">
								Return Reason
							</th>
							<th class="sorting_disabled" role="columnheader" rowspan="1" colspan="1" aria-label=""></th>
						</tr>
					</thead>			
				<tbody role="alert" aria-live="polite" aria-relevant="all">
				<?php $row_style=1; ?>
				@foreach($data as $key => $values)
				<tr @if($row_style % 2 ==0) class="odd" @else class="even"  @endif>
							{{--
							<td class="center  sorting_1">
								<label class="position-relative">
									<input type="checkbox" class="ace">
									<span class="lbl"></span>
								</label>
							</td>--}}
							<td class=" ">{{$values["return_purchase_number"]}}</td>
							<td class=" ">{{$values["suplier_name"]}}</td>
							<td class=" ">{{$values["invoice_number"]}}</td>
							<td class="hidden-480">{{$values["return_date"]}}</td>
							<td class="hidden-480">{{$values["return_reason"]}}</td>
							<td class=" ">
								<div class="hidden-sm hidden-xs action-buttons">
									<a class="green" href="#" onclick="edit('{{$values['app_return_purchase_id']}}')">
										<i class="ace-icon fa fa-pencil bigger-130"></i>
									</a>

									<a class="red" href="#" onclick="deleteData('{{$values['app_return_purchase_id']}}')">
										<i class="ace-icon fa fa-trash-o bigger-130"></i>
									</a>									
									<a class="red" href="#" onclick="detail('{{$values['app_return_purchase_id']}}')">
										<i class="ace-icon fa fa-list bigger-130"></i>
									</a>
								</div>

								<div class="hidden-md hidden-lg">
									<div class="inline position-relative">
										<button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
											<i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
										</button>

										<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
											<li>
												<a href="#" onclick="expandData('{{$values['app_return_purchase_id']}}')" class="tooltip-success" data-rel="tooltip" title="" data-original-title="Edit" >
													<span class="green">
														<i class="fa fa-expand"></i>
													</span>
												</a>
											</li>
											<li>
												<a href="#" onclick="edit('{{$values['app_return_purchase_id']}}')" class="tooltip-success" data-rel="tooltip" title="" data-original-title="Edit" >
													<span class="green">
														<i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
													</span>
												</a>
											</li>

											<li>
												<a href="#" onclick="deleteData('{{$values['app_return_purchase_id']}}')" class="tooltip-error" data-rel="tooltip" title="" data-original-title="Delete" onclick="deleteData('{{$values['app_raw_material_id']}}')">
													<span class="red">
														<i class="ace-icon fa fa-trash-o bigger-120"></i>
													</span>
												</a>
											</li>
											<li>
												<a href="#" onclick="detail('{{$values['app_return_purchase_id']}}')" class="tooltip-error" data-rel="tooltip" title="" data-original-title="Delete">
													<span class="red">
															<i class="ace-icon fa fa-list bigger-120"></i>
													</span>
												</a>
											</li>
										</ul>
									</div>
								</div>
							</td>
						</tr>
						<?php $row_style ++; ?>
						@endforeach
						</tbody>
						</table>
						<div class="row">
						<div class="col-xs-6">
							<button class="btn btn-white btn-primary" data-toggle="modal" data-target="#modal-add"><i class="fa fa-plus">&nbsp;Add</i></button>
							<div class="dataTables_info" id="sample-table-2_info"><!--Showing 1 to 10 of 23 entries--></div>
						</div>
						<div class="col-xs-6">
						<div class="dataTables_paginate paging_bootstrap">
							<ul class="pagination">
								{{$data->links()}}
							</ul>
						</div>
						</div>
						</div>
					</div>
			</div>
		</div>
	</div>
	@include('AppReturnPurchase::expand')
	@include('AppReturnPurchase::create')
	@include('AppReturnPurchase::action_js')
	@include('AppReturnPurchase::edit')
	@include('AppReturnPurchase::delete')			
@endsection