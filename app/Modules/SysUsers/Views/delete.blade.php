<!-- Modal Add Data-->
<div class="modal fade" id="modal-delete" role="dialog">
	<div class="modal-dialog md-12">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Delete Sales</h4>
			</div>
			<div class="modal-body">
					<form name="frm-delete" id="frm-delete" action="{{url('sales/destroy')}}" method="post">
					{{ csrf_field() }}
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<p>The following data will be deleted, are you sure to continue this process!</p> 
								<label>Purcahse Number</label> 
								<input type="text" readonly="readonly" placeholder="" name="invoice_number" id="invoice_number" required="" class="form-control">
							</div>	
							<div class="form-group">
								<label>Customer Name</label> 
								<input type="text" readonly="readonly" placeholder="" name="customer_name" id="customer_name" required="" class="form-control">
							</div>	
							<div class="form-group">
								<label>Description</label> 
								<textarea disabled placeholder="" name="description" id="description" required="" class="form-control"></textarea>
							</div>
							<input type="hidden" readonly="readonly" placeholder="" name="app_sales_id" id="app_sales_id" required="" class="form-control">
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