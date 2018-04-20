<!-- Modal Add Data-->
<div class="modal fade" id="modal-edit" role="dialog">
	<div class="modal-dialog md-12">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" onclick="cancelEditItem()">&times;</button>
				<h4 class="modal-title">Edit Item Stock Opname</h4>
			</div>
			<div class="modal-body">
					<form name="frm-edit" id="frm-edit" action="{{url('purchase_detail/update')}}" method="post">
					{{ csrf_field() }}
					<div class="row">
							<div class="col-sm-4">
							<div class="form-group">
								<label>Raw Material</label> 
								<select required="" id="app_raw_material_id" name="app_raw_material_id" class="form-control" onChange="getRawMaterialByIdEdit(this)">
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
							
						</div>
						<div class="col-sm-4">														
							<div class="form-group">
								<label>Stock</label> 
								<input type="text" readonly placeholder="" name="stock" id="stock" required="" class="form-control"/>
							</div>
						</div>
						<div class="col-sm-4">														
							<div class="form-group">
								<label>Available Stock</label> 
								<input type="text"  placeholder="" name="stock_opname" id="stock_opname" onchange="getDeviationEdit(this)" required="" class="form-control"/>
							</div>
						</div>
						<div class="col-sm-6">														
							<div class="form-group">
								<label>Deviation</label> 
								<input type="text" readonly placeholder="" name="deviation" id="deviation" required="" class="form-control"/>
							</div>
						</div>
						<div class="col-sm-6">														
							<div class="form-group">
								<label>Information</label> 
								<input type="text"  placeholder="" name="information" id="information" required="" class="form-control"/>
							</div>
						</div>
						<input readonly type="hidden" value="{{$data_header['app_purchase_id']}}" name="app_purchase_id" id="app_purchase_id" required="" class="form-control"/>
					</form>																	
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