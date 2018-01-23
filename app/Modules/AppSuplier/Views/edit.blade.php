<!-- Modal Add Data-->
<div class="modal fade" id="modal-edit" role="dialog">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Update Suplier</h4>
			</div>
			<div class="modal-body">
					<form name="frm-edit" id="frm-edit" action="{{url('suplier/update')}}" method="post">
					{{ csrf_field() }}
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<label>Suplier Name</label> 
								<input type="text" placeholder="" name="name" id="name" required="" class="form-control">
							</div>
							<div class="form-group">
								<label>Address</label> 
								<input type="text" placeholder="" name="addres" id="addres" required="" class="form-control">
							</div>
							<div class="form-group">
								<label>Telephone Number</label> 
								<input type="text" placeholder="" name="telephone_number" id="telephone_number" required="" class="form-control">
							</div>					
								<input type="hidden" placeholder="" name="app_suplier_id" id="app_suplier_id" required="" class="form-control">							
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