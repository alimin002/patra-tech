<!-- Modal Add Data-->
<div class="modal fade" id="modal-add" role="dialog">
	<div class="modal-dialog md-12">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Add Item Stock Opname</h4>
			</div>
			<div class="modal-body">
					<form name="frm-create" id="frm-create" method="post">
					{{ csrf_field() }}
					<div class="row">
						<div class="col-sm-4">
							<div class="form-group">
								<label>Raw Material</label> 
								<select required="" id="app_raw_material_id" name="app_raw_material_id" class="form-control" onChange="getRawMaterialById(this)">
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
								<input type="text"  placeholder="" name="stock_opname" id="stock_opname" onchange="getDeviation(this)" required="" class="form-control"/>
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
				 </div>														
			</div>
			<div class="modal-footer">
				<button onclick="addToStockOpname()" type="button" class="btn btn-primary">Save</button>
				<button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
			</div>										
		</div>
	</div>
</div>
<!--end modal add data-->