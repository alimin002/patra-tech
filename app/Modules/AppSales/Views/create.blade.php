<!-- Modal Add Data-->
<div class="modal fade" id="modal-add" role="dialog">
	<div class="modal-dialog md-12">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Add Sales</h4>
			</div>
			<div class="modal-body">
					<form name="frm-create" id="frm-create" action="{{url('sales/save')}}" method="post">
					{{ csrf_field() }}
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<label>Invoice Number</label> 
								<input type="text" readonly="readonly" placeholder="" value="{{$invoice_number}}" name="invoice_number" id="invoice_number" required="" class="form-control">
							</div>	
							<div class="form-group">
								<label>Customer Name</label> 
								<input type="text" placeholder="" name="customer_name" id="customer_name" required="" class="form-control">
							</div>
							<div class="form-group">
								<label>Customer Email</label> 
								<input type="text" placeholder="" name="customer_email" id="customer_email" required="" class="form-control">
							</div>									
							<div class="form-group">
								<label>Description</label> 
								<textarea placeholder="" name="description" id="description" required="" class="form-control"></textarea>
							</div>
						</div>
					</form>																	
				 </div>														
			</div>
			<div class="modal-footer">
				<button onclick="doSave()" type="button" class="btn btn-primary">Save</button>
				<button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
			</div>										
		</div>
	</div>
</div>
<!--end modal add data-->