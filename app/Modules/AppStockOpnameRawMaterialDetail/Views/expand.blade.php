<!-- Modal Add Data-->
<div class="modal fade" id="modal-delete" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" onclick="cancelDeleteItem()">&times;</button>
				<h4 class="modal-title">Delete Item Stockopnamee</h4>
			</div>
			<div class="modal-body">
					<form name="frm-delete" id="frm-delete" action="{{url('purchase_detail/update')}}" method="post">
					{{ csrf_field() }}
					<div class="row">
							<div class="col-sm-4">
							<div class="form-group">
								<label>Raw Material</label> 
								<select disabled required="" id="app_raw_material_id" name="app_raw_material_id" class="form-control" onChange="getRawMaterialByIdEdit(this)">
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
								<input disabled type="text" readonly placeholder="" name="stock" id="stock" required="" class="form-control"/>
							</div>
						</div>
						<div class="col-sm-4">														
							<div class="form-group">
								<label>Available Stock</label> 
								<input disabled type="text"  placeholder="" name="stock_opname" id="stock_opname" onchange="getDeviationEdit(this)" required="" class="form-control"/>
							</div>
						</div>
						<div class="col-sm-6">														
							<div class="form-group">
								<label>Deviation</label> 
								<input disabled type="text" readonly placeholder="" name="deviation" id="deviation" required="" class="form-control"/>
							</div>
						</div>
						<div class="col-sm-6">														
							<div class="form-group">
								<label>Information</label> 
								<input disabled type="text"  placeholder="" name="information" id="information" required="" class="form-control"/>
							</div>
						</div>
						<input readonly type="hidden" value="{{$data_header['app_purchase_id']}}" name="app_purchase_id" id="app_purchase_id" required="" class="form-control"/>
					</form>																	
						<input readonly type="hidden" name="app_purchase_detail_id" id="app_purchase_detail_id" required="" class="form-control"/>
						<input readonly type="hidden" value="{{$data_header['app_purchase_id']}}" name="app_purchase_id" id="app_purchase_id" required="" class="form-control"/>
						<!--selected row to delete-->
						<input readonly  type="hidden" name="selected_element" id="selected_element" required="" class="form-control"/>
					</form>																	
				 </div>														
			</div>
			<div class="modal-footer">
				<button onclick="doDeleteItem()" type="button" class="btn btn-primary">Delete</button>
				<button type="button" class="btn btn-primary" data-dismiss="modal" onclick="cancelDeleteItem()">Cancel</button>
			</div>										
		</div>
	</div>
</div>
<!--end modal add data-->