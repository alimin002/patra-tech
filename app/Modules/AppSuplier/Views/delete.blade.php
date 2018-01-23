<!-- Modal Add Data-->
<div class="modal fade" id="modal-delete" role="dialog">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Delete Suplier</h4>
			</div>
			<div class="modal-body">
					<form name="frm-delete" id="frm-delete" action="{{url('suplier/destroy')}}" method="post">
					{{ csrf_field() }}
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<p>The follwing data will be deleted, Are you sure to continue this process?</p>
								<label>Suplier Name</label> 
								<input type="text" disabled placeholder="" name="name" id="name" required="" class="form-control">
							</div>
							<div class="form-group">
								<label>Address</label> 
								<input type="text" disabled placeholder="" name="addres" id="addres" required="" class="form-control">
							</div>
							<div class="form-group">
								<label>Telephone Number</label> 
								<input type="text" disabled placeholder="" name="telephone_number" id="telephone_number" required="" class="form-control">
							</div>					
								<input type="hidden" placeholder="" name="app_suplier_id" id="app_suplier_id" required="" class="form-control">							
						</div>
					</form>																	
				 </div>														
			</div>
			<div class="modal-footer">
				<button onclick="doDelete()" type="button" class="btn btn-primary">Delete</button>
				<button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
			</div>										
		</div>
	</div>
</div>
<!--end modal add data-->