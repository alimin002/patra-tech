<!-- Modal Add Data-->
<div class="modal fade" id="modal-expand" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Expand Return Purchase</h4>
			</div>
			<div class="modal-body">
					<form name="frm-expand" id="frm-expand" action="{{url('return_purchase/destroy')}}" method="post">
					{{ csrf_field() }}
					<div class="row">
					<div class="col-sm-12">
							<div class="form-group">
								<p>Detail record</>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label>Return Number</label> 
								<input type="text" placeholder=""  name="return_purchase_number" id="return_purchase_number" required="" class="form-control" readonly="readonly"/>
							</div>	
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label>Invoice Number</label> 
								<input type="text" placeholder="" name="invoice_number" id="invoice_number" required="" class="form-control" readonly="readonly"/>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label>Suplier</label> 
								<select class="form-control" name="app_suplier_id" id="app_suplier_id" class="form-control" readonly="readonly" />								
								</select>
							</div>					
						</div>
						<div class="col-sm-12">
							<div class="form-group">
								<label>Return Reason</label> 
								<textarea name="return_reason" id="return_reason" class="form-control" style="height:100px;" readonly="readonly"></textarea>
								<input type="hidden" placeholder="" name="app_return_purchase_id" id="app_return_purchase_id" required="" class="form-control"/>
							</div>
						</div>
					</form>																	
				 </div>														
			</div>
			<div class="modal-footer">
				<button onclick="doDelete()" type="button" class="btn btn-primary">Close</button>
			</div>										
		</div>
	</div>
</div>
<!--end modal add data-->