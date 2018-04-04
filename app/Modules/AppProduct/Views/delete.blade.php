<!-- Modal Add Data-->
<div class="modal fade" id="modal-delete" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Edit data Raw Material</h4>
			</div>
			<div class="modal-body">
					<form name="frm-delete" id="frm-delete" action="{{url('raw_material/destroy')}}" method="post">
					{{ csrf_field() }}
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<p>The following data will be deleted, are you sure to continue this process?</>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label>Raw Material Name</label> 
								<input type="text" disabled placeholder="" name="name" id="name" required="" class="form-control">
								<input type="hidden" placeholder="" name="app_raw_material_id" id="app_raw_material_id" required="" class="form-control">
							</div>
							<div class="form-group">
								<label>Unit</label> 
								<input type="text" disabled placeholder="" name="unit" id="unit" required="" class="form-control">
							</div>
							<div class="form-group">
								<label>Unit Price</label> 
								<input type="text" disabled placeholder="" name="unit_price" id="unit_price" required="" class="form-control">
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label>Suplier</label> 
								<select class="form-control" disabled name="app_suplier_id" id="app_suplier_id" class="form-control">
									<option></option>
								</select>
							</div>
							<div class="form-group">
								<label>Category</label> 
								<select class="form-control" disabled name="app_category_raw_material_id" id="app_category_raw_material_id" class="form-control">
									<option></option>
								</select>
							</div>
							<div class="form-group">
								<label>Stock</label> 
								<input disabled type="text" disabled placeholder="notif to input stock if stock is null" name="" id="" required="" class="form-control">
							</div>
						</div>
						<div class="col-sm-12">
							<div class="form-group">
								<label>Description</label> 
								<textarea name="description" disabled id="description" class="form-control" style="height:100px;"></textarea>
							</div>
						</div>
					</form>																	
				 </div>														
			</div>
			<div class="modal-footer">
				<button onclick="doDelete()" type="button" class="btn btn-primary">Ok</button>
				<button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
			</div>										
		</div>
	</div>
</div>
<!--end modal add data-->