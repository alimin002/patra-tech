<!-- Modal Add Data-->
<div class="modal fade" id="modal-expand" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Expand Columns Item Purchase</h4>
			</div>
			<div class="modal-body">
					<form name="frm-expand" id="frm-expand" >
					{{ csrf_field() }}
					<div class="row">
						<div class="col-sm-6">
								<div class="form-group">
								<label>Purchase Number</label> 
								<input disabled  type="text" placeholder="" name="purchase_number" id="purchase_number" required="" class="form-control"/>
							</div>
							<div class="form-group">
								<label>Purchase date</label> 
								<input disabled type="text" readonly placeholder="" name="purchase_date" id="purchase_date" required="" class="form-control"/>
							</div>
						</div>
						
						<div class="col-sm-6">														
							<div class="form-group">
								<label>Suplier Name</label> 
								<input disabled  type="text" placeholder="" name="suplier_name" id="suplier_name" required="" class="form-control"/>
							</div>
						</div>

						<div class="col-sm-6">														
							<div class="form-group">
								<label>Total Purchase</label> 
								<input disabled  type="text" placeholder="" name="total_purchase" id="total_purchase" required="" class="form-control"/>
							</div>
						</div>							
						<!--selected row to delete-->
						<input readonly type="hidden" name="selected_element" id="selected_element" required="" class="form-control"/>
					</form>																	
				 </div>														
			</div>
			<div class="modal-footer">
				<button data-dismiss="modal" type="button" class="btn btn-primary">Close</button>
			</div>										
		</div>
	</div>
</div>
<!--end modal add data-->