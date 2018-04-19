<!-- Modal Add Data-->
<div class="modal fade" id="modal-edit" role="dialog">
	<div class="modal-dialog md-12">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Edit Stock Opname</h4>
			</div>
			<div class="modal-body">
					<form name="frm-edit" id="frm-edit" action="{{url('stock_opname_raw_material/update')}}" method="post">
					{{ csrf_field() }}
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<label>Stock Opname Number</label> 
								<input type="text" readonly="readonly" placeholder="" name="number_stock_opname" id="number_stock_opname" required="" class="form-control">
							</div>
							<div class="form-group">
								<label>Warehouse Supervisor</label> 
								<input type="text"  placeholder="" name="warehouse_supervisor" id="warehouse_supervisor" required="" class="form-control">
							</div>							
							<input type="hidden" readonly="readonly" placeholder="" name="app_stock_opname_raw_material_id" id="app_stock_opname_raw_material_id" required="" class="form-control">
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