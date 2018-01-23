@extends('main')
@section('title', 'Purchase Detail')
@section('content')
		<div class="row wrapper border-bottom white-bg page-heading">
			<div class="col-lg-10">
					<h2>Purchase Detail</h2>
					<ol class="breadcrumb">
							<li>
									<a href="{{url('')}}">Home</a>
							</li>
							<li>
									<a href="{{url('purchase')}}">Purchase</a>
							</li>
							<li class="active">
									<strong>Purchase Detail</strong>
							</li>
					</ol>
			</div>
			<div class="col-lg-2">

			</div>
	</div>
	<div class="wrapper wrapper-content animated fadeInRight ecommerce">
		<div class="ibox-content m-b-sm border-bottom">
			@if(session()->has('message'))							
				<div class="alert alert-info">
					{{session()->get('message')}}
				</div>
			@endif
				<div class="row">
						<div class="col-sm-12">
								<div class="form-group">
										<?php $app_purchase_id=$data_header["app_purchase_id"];?>
										<button class="btn btn-default buttons-html5 pull-right" onclick="editHeader('{{$app_purchase_id}}')">
											<i class="fa fa-edit"></i>&nbsp;Edit Purchase
										</button>
								</div>
						</div>
						<div class="col-sm-4">
								<div class="form-group">
										<label class="control-label" for="purchase_number">Purchase Number</label>
										<input type="text" value="{{$data_header['purchase_number']}}" readonly id="purchase_number" name="purchase_number"  placeholder="" class="form-control">
								</div>
						</div>
						<div class="col-sm-4">
								<div class="form-group">
										<label class="control-label" for="suplier_name">Suplier Name</label>
										<input type="text" readonly value="{{$data_header['suplier_name']}}" id="suplier_name" name="suplier_name" value="" placeholder="" class="form-control">
								</div>
						</div>
						<div class="col-sm-4">
								<div class="form-group">
										<label class="control-label" for="purchase_date">Purchase Date</label>
										<input type="text" readonly value="{{$data_header['purchase_date']}}" id="purchase_date" name="purchase_date"  placeholder="" class="form-control">
								</div>
						</div>
						<div class="col-sm-12">
								<div class="form-group">
										<label class="control-label" for="purchase_date">Description</label>
										<textarea disabled id="description" name="description"  placeholder="" class="form-control">{{$data_header['description']}}</textarea>
								</div>
						</div>
						<input type="hidden" readonly value="{{$data_header['app_purchase_id']}}" id="app_purchase_id" name="app_purchase_id"  placeholder="" class="form-control"/>
				</div>                
		</div>

		<div class="row">
				<div class="col-lg-12">
						<div class="ibox">
								<div class="ibox-content">									
									<div class="html5buttons">
										<div class="dt-buttons btn-group">
											<a class="btn btn-default buttons-html5" onClick="doPurchaseRawMaterial()">
												<i class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp;<span>Save Purchase </span>
											</a>
										</div>
										<div class="dt-buttons btn-group">
											<a class="btn btn-default buttons-html5" data-toggle="modal" data-target="#modal-add">
												<i class="fa fa-plus"></i>&nbsp;<span>Add Purchase Item </span>
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
										<span class="pull-left">Total Data {{ $data_detail->total() }}</span>
										<span class="pull-right">Page {{ $data_detail->currentPage() }} Of {{ $data_detail->lastPage() }}</span>
									</div>
										<table class="footable table table-stripped toggle-arrow-tiny default footable-loaded" data-page-size="15">
												<thead>
												<tr>
														<th class="footable-visible footable-first-column footable-sortable">
															Raw Material Name
															<span class="footable-sort-indicator"></span>
														</th>
														<th data-hide="phone" class="footable-visible footable-sortable">
															Price
															<span class="footable-sort-indicator"></span>
														</th>
														<th data-hide="phone" class="footable-visible footable-sortable">
															Qty
															<span class="footable-sort-indicator"></span>
														</th> 
														<th data-hide="phone" class="footable-visible footable-sortable">
															Sub Total
															<span class="footable-sort-indicator"></span>
														</th>  																		
														<th class="text-right footable-visible footable-last-column footable-sortable">
															Action
															<span class="footable-sort-indicator"></span>
														</th>

												</tr>
												</thead>
												<tbody id="tbody_purchase">
													@foreach($data_detail as $key=>$values)
													<tr class="footable-even" style="">
															<td class="footable-visible footable-first-column"><span class="footable-toggle"></span>
																{{$values["raw_material_name"]}}
															</td>
															<td class="footable-visible">
																{{$values["unit_price"]}}
															</td>
															<td class="footable-visible">
																{{$values["qty"]}}
															</td>
															<td class="footable-visible">
																{{$values["sub_total"]}}
															</td>
															<?php $app_purchase_detail_id = $values["app_purchase_detail_id"]; ?>
															<td class="text-right footable-visible footable-last-column">
																<button class="btn btn-primary">
																	<i class="fa fa-edit" onclick="edit('{{$app_purchase_detail_id}}')"></i>
																</button>
																<button class="btn btn-primary" onclick="deleteData('{{$app_purchase_detail_id}}')">
																	<i class="fa fa-trash"></i>
																</button>
															</td>
													</tr>
													@endforeach
												</tbody>												
										</table>
										<div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
											{{$data_detail->appends(array("purchase_id"=>$data_header['app_purchase_id']))->links()}}
										</div>
								</div>
						</div>
				</div>
		</div>
		<div class="row" style="">
			<form name="frm-purchase-item" id="frm-purchase-item" action="{{url('purchase_detail/save')}}" method="post">
				{{ csrf_field() }}
				<textarea class="col-md-12" name="data_purchase_item" id="data_purchase_item">{{$json_purchase}}</textarea>
				<input readonly type="text" value="{{$data_header['app_purchase_id']}}" name="app_purchase_idx" id="app_purchase_idx" required="" class="form-control"/>
			</form>
		</div>
 </div>
@include('AppPurchaseDetail::create') 
@include('AppPurchaseDetail::edit_header')
@include('AppPurchaseDetail::action_js')
@include('AppPurchaseDetail::edit')						
@include('AppPurchaseDetail::delete')	
@endsection