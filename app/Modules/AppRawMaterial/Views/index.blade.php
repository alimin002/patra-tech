@extends('main')
@section('title', 'Raw Material')
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
							<th class="sorting" role="columnheader" tabindex="0" aria-controls="sample-table-2" rowspan="1" colspan="1" aria-label="Price: activate to sort column ascending">
								Unit
							</th>
							<th class="hidden-480 sorting" role="columnheader" tabindex="0" aria-controls="sample-table-2" rowspan="1" colspan="1" aria-label="Clicks: activate to sort column ascending">
								Unit Price
							</th>
							<th class="sorting" role="columnheader" tabindex="0" aria-controls="sample-table-2" rowspan="1" colspan="1" aria-label="								
								Update
							: activate to sort column ascending">
								<i class="ace-icon fa fa-clock-o bigger-110 hidden-480"></i>
								Stock
							</th>
							<th class="hidden-480 sorting" role="columnheader" tabindex="0" aria-controls="sample-table-2" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending">
								Suplier Name
							</th>
							<th class="sorting_disabled" role="columnheader" rowspan="1" colspan="1" aria-label=""></th>
						</tr>
					</thead>			
				<tbody role="alert" aria-live="polite" aria-relevant="all">
				<?php $row_style=1; ?>
				@foreach($data as $key => $values)
				<tr @if($row_style % 2 ==0) class="odd" @else class="even"  @endif>
							<td class="center  sorting_1">
								<label class="position-relative">
									<input type="checkbox" class="ace">
									<span class="lbl"></span>
								</label>
							</td>
							<td class=" ">{{$values["raw_name"]}}</td>
							<td class=" ">{{$values["unit"]}}</td>
							<td class="hidden-480 ">{{$values["unit_price"]}}</td>
							<td class=" ">
								@if ($values["stock"] == "")
									<p>
										Please go to <a href="{{url('stock_raw_material')}}"><b>menu stock</b></a>&nbsp;to assign number of stock for this raw material! 
									</p>
								@elseif ($values["stock"] == 0)
									<p style="color:red">
										{{$values["stock"]}}&nbsp;{{$values["unit"]}}
									</p>
								@else
									{{$values["stock"]}}&nbsp;{{$values["unit"]}}
								@endif
								
							</td>
							<td class="hidden-480 ">{{$values["unit_price"]}}	</td>
							<td class=" ">
								<div class="hidden-sm hidden-xs action-buttons">
									<a class="green" href="#" onclick="edit('{{$values['app_raw_material_id']}}')">
										<i class="ace-icon fa fa-pencil bigger-130"></i>
									</a>

									<a class="red" href="#" onclick="deleteData('{{$values['app_raw_material_id']}}')">
										<i class="ace-icon fa fa-trash-o bigger-130"></i>
									</a>
								</div>

								<div class="hidden-md hidden-lg">
									<div class="inline position-relative">
										<button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
											<i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
										</button>

										<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
											<li>
												<a href="#" onclick="edit('{{$values['app_raw_material_id']}}')" class="tooltip-success" data-rel="tooltip" title="" data-original-title="Edit" >
													<span class="green" >
														<i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
													</span>
												</a>
											</li>

											<li>
												<a href="#" onclick="deleteData('{{$values['app_raw_material_id']}}')" class="tooltip-error" data-rel="tooltip" title="" data-original-title="Delete" onclick="deleteData('{{$values['app_raw_material_id']}}')">
													<span class="red">
														<i class="ace-icon fa fa-trash-o bigger-120"></i>
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
							<button onclick="add()" class="btn btn-white btn-primary"><i class="fa fa-plus">&nbsp;Add</i></button>
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
	@include('AppRawMaterial::create')
	@include('AppRawMaterial::edit')
	@include('AppRawMaterial::delete')
	@include('AppRawMaterial::action_js')
@endsection