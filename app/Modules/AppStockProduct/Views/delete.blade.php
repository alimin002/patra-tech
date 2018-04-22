<!-- Modal Add Data-->
<div class="modal fade" id="modal-delete" role="dialog">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Delete Stock Product</h4>
			</div>
			<div class="modal-body">
					<form name="frm-delete" id="frm-delete" action="{{url('stock_product/destroy')}}" method="post">
					{{ csrf_field() }}
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<p>This following data will be deleted, are you sure to continue this process?</p>
								<label>Product Name</label> 
								<select disabled id="app_product_id" name="app_product_id" class="form-control">								
								</select>
							</div>
							<div class="form-group">
								<label>Stock</label> 
								<input disabled type="text" placeholder="" name="stock" id="stock" required="" class="form-control"/>
							</div>
							<div class="form-group">
								<label>Description</label> 
								<textarea disabled class="form-control" id="description" name="description"></textarea>
							</div>
							<input type="hidden" placeholder="" name="app_stock_id" id="app_stock_id" required="" class="form-control"/>
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