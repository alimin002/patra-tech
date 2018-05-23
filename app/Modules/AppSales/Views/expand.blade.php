<!-- Modal Add Data-->
<div class="modal fade" id="modal-expand" role="dialog">
	<div class="modal-dialog md-12">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Expand Sales Columns</h4>
			</div>
			<div class="modal-body">
					<form name="frm-expand" id="frm-expand">
					{{ csrf_field() }}
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<p>Detail Record</p> 
								<label>Invoice Number</label> 
								<input type="text" readonly="readonly" placeholder="" name="invoice_number" id="invoice_number" required="" class="form-control">
							</div>	
							<div class="form-group">
								<label>Customer Name</label> 
								<input type="text" readonly="readonly" placeholder="" name="customer_name" id="customer_name" required="" class="form-control">
							</div>
							<div class="form-group">
								<label>Customer Email</label> 
								<input type="text" readonly="readonly" placeholder="" name="customer_email" id="customer_email" required="" class="form-control">
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
				<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
			</div>										
		</div>
	</div>
</div>
<!--end modal add data-->