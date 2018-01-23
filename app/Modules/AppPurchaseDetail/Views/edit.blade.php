<!-- Modal Add Data-->
<div class="modal fade" id="modal-edit" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Edit Item Purchase</h4>
			</div>
			<div class="modal-body">
					<form name="frm-edit" id="frm-edit" action="{{url('purchase_detail/update')}}" method="post">
					{{ csrf_field() }}
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label>Raw Material</label> 
								<select id="app_raw_material_id" name="app_raw_material_id" class="form-control" onChange="getRawMaterialById(this)">
									<option> 
										Choose Raw Material
									</option>
								@foreach($lookup_raw_material as $key=>$values)
									<option value="{{$values['app_raw_material_id']}}"> 
									{{$values["name"]}} 
									</option>
								@endforeach
								</select>
							</div>
							<div class="form-group">
								<label>Unit Price</label> 
								<input type="text" readonly placeholder="" name="unit_price" id="unit_price" required="" class="form-control"/>
							</div>
						</div>
						<div class="col-sm-6">														
							<div class="form-group">
								<label>Qty</label> 
								<input  type="text" onkeyup="getSubTotalEdit()" placeholder="" name="qty" id="qty" required="" class="form-control"/>
							</div>
							<div class="form-group">
								<label>Sub Total</label> 
								<input readonly type="text" placeholder="" name="sub_total" id="sub_total" required="" class="form-control"/>
							</div>
						</div>
						<div class="col-sm-12">
							<div class="form-group">
								<label>Description</label> 
								<textarea disabled name="description" id="description" class="form-control" style="height:100px;"></textarea>
							</div>
						</div>
						<input readonly type="hidden" name="app_purchase_detail_id" id="app_purchase_detail_id" required="" class="form-control"/>
						<input readonly type="hidden" value="{{$data_header['app_purchase_id']}}" name="app_purchase_id" id="app_purchase_id" required="" class="form-control"/>
					</form>																	
				 </div>														
			</div>
			<div class="modal-footer">
				<button onclick="doUpdate()" type="button" class="btn btn-primary">Update</button>
				<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
			</div>										
		</div>
	</div>
</div>
<!--end modal add data-->