<!-- Modal Delete Data-->
<div class="modal fade" id="modal-delete" role="dialog">
	<div class="modal-dialog md-12">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Delete Sales</h4>
			</div>
			<div class="modal-body">
					<form name="frm-delete" id="frm-delete" action="{{url('cost_predictor/destroy')}}" method="post">
					{{ csrf_field() }}
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
							<p>The following data will be deleted, are you sure to continue this process!</p> 
								<label>Product Name</label> 
								<input type="text" readonly="readonly" placeholder="" name="product_name" id="product_name" required="" class="form-control">
							</div>								
							<input type="hidden" readonly="readonly" placeholder="" name="app_product_composition_id" id="app_product_composition_id" required="" class="form-control">
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