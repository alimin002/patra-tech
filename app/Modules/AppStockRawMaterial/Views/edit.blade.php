<!-- Modal Add Data-->
<div class="modal fade" id="modal-edit" role="dialog">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Edit Stock Raw Material</h4>
			</div>
			<div class="modal-body">
					<form name="frm-edit" id="frm-edit" action="{{url('stock_raw_material/update')}}" method="post">
					{{ csrf_field() }}
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<label>Raw Material Name</label> 
								<select id="app_raw_material_id" name="app_raw_material_id" class="form-control">								
								</select>
							</div>
							<div class="form-group">
								<label>Stock</label> 
								<input type="text" placeholder="" name="stock" id="stock" required="" class="form-control"/>
							</div>
							<div class="form-group">
								<label>Description</label> 
								<textarea class="form-control" id="description" name="description"></textarea>
							</div>
							<input type="hidden" placeholder="" name="app_stock_raw_material_id" id="app_stock_raw_material_id" required="" class="form-control"/>
						</div>
					</form>																	
				 </div>														
			</div>
			<div class="modal-footer">
				<button onclick="doUpdate()" type="button" class="btn btn-primary">Update</button>
				<button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
			</div>										
		</div>
	</div>
</div>
<!--end modal add data-->