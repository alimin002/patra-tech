<!-- Modal Add Data-->
<div class="modal fade" id="modal-edit" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" onclick="cancelEditItem()">&times;</button>
				<h4 class="modal-title">Edit Item Return</h4>
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
								<label>Stock</label> 
								<input type="text" value="" readonly="readonly" name="stock" id="stock" class="form-control"/>
							</div>						
						</div>
						<div class="col-sm-12" style="display:none">
							<div class="form-group">
								<label>Old Stock</label> 
								<input type="text" readonly="readonly" value="" name="old_stock" id="old_stock" class="form-control"/>
							</div>						
						</div>
						<div class="col-sm-12" style="display:none">
							<div class="form-group">
								<label>New Stock</label> 
								<input type="text" readonly="readonly" value="" name="new_stock" id="new_stock" class="form-control"/>
							</div>						
						</div>					
						<div class="col-sm-12">
							<div class="form-group">
								<label>Old Qty</label> 
								<input type="text" readonly="readonly" value="" name="old_qty" id="old_qty" class="form-control"/>
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
						<!--selected row to delete-->
						<input readonly type="hidden" name="selected_element" id="selected_element" required="" class="form-control"/>
					</form>																	
				 </div>														
			</div>
			<div class="modal-footer">
				<button onclick="doUpdateItem()" type="button" class="btn btn-primary">Update</button>
				<button onclick="cancelEditItem()" type="button" class="btn btn-primary">Cancel</button>
			</div>										
		</div>
	</div>
</div>
<!--end modal add data-->