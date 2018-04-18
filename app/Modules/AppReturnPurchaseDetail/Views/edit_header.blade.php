<!-- Modal Add Data-->
<div class="modal fade" id="modal-edit-header" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Edit Purchase</h4>
			</div>
				<div class="modal-body">
					<form name="frm-edit-header" id="frm-edit-header" action="{{url('return_purchase/update')}}" method="post">
					{{ csrf_field() }}
					<div class="row">
						<div class="col-sm-3">
							<div class="form-group">
								<label>Return Number</label> 
								<input type="text" placeholder=""  name="return_purchase_number" id="return_purchase_number" required="" class="form-control" readonly="readonly"/>
							</div>	
						</div>
							<div class="col-sm-3">
							<div class="form-group">
								<label>Suplier Name</label> 
								<select class="form-control"  name="app_suplier_id" id="app_suplier_id" class="form-control" />								
								</select>
							</div>					
						</div>
						<div class="col-sm-3">
							<div class="form-group">
								<label>Invoice Number</label> 
								<input type="text" placeholder="" name="invoice_number" id="invoice_number" required="" class="form-control"/>
							</div>
						</div>
						<div class="col-sm-3">
							<div class="form-group">
								<label>Return Date</label> 
								<input type="text" placeholder="" name="return_date" id="return_date" required="" class="form-control"/>
							</div>
						</div>
						<div class="col-sm-12">
							<div class="form-group">
								<label>Return Reason</label> 
								<textarea name="return_reason" id="return_reason" class="form-control" style="height:100px;"></textarea>
								<input type="hidden" placeholder="" name="app_return_purchase_id" id="app_return_purchase_id" required="" class="form-control">
							</div>
						</div>
					</form>																	
				 </div>														
			</div>
			<div class="modal-footer">
				<button onclick="doUpdateHeader()" type="button" class="btn btn-primary">Update</button>
				<button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
			</div>										
		</div>
	</div>
</div>
<!--end modal add data-->