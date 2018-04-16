<!-- Modal Add Data-->
<div class="modal fade" id="modal-edit-header" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Edit Sales</h4>
			</div>
			<div class="modal-body">
					<form name="frm-edit" id="frm-edit-header" action="{{url('sales_detail/update_header')}}" method="post">
					{{ csrf_field() }}
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group col-sm-4">
								<label>Invoice Number</label> 
								<input type="text" readonly="readonly"  placeholder="" name="invoice_number" id="invoice_number" required="" class="form-control">
							</div>
							<div class="form-group col-sm-4">
								<label>Customer Name</label> 
								<input type="text"  placeholder="" name="customer_name" id="customer_name" required="" class="form-control">
							</div>						
							<div class="form-group col-sm-4">
								<label>Sales Date</label>
								<input type="text" readonly="readonly"  placeholder="" name="sales_date" id="sales_date" required="" class="form-control" aria-describedby="popover56283"/>
							</div>
							<div class="form-group col-sm-12">
								<label>Description</label>
								<textarea  placeholder="" name="description" id="description" required="" class="form-control" ></textarea>
							</div>
							<input type="hidden" placeholder="" name="app_sales_id" id="app_sales_id" required="" class="form-control">
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