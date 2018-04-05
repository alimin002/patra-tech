<!-- Modal Add Data-->
<div class="modal fade" id="modal-delete" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Delete Data @yield("title")</h4>
			</div>
			<div class="modal-body">
					<form name="frm-delete" id="frm-delete" action="{{url('product/destroy')}}" method="post">
					{{ csrf_field() }}
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<p>The following data will be deleted, are you sure to continue this process?</>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label>Product Name</label> 
								<input type="text" placeholder="" readonly="readonly" name="name" id="name" required="" class="form-control">
								<input type="hidden" placeholder="" name="app_product_id" id="app_product_id" required="" class="form-control">
							</div>																	
						</div>
						<div class="col-sm-6">
								<div class="form-group">
								<label>Unit</label> 
								<input type="text" readonly="readonly" placeholder="" name="unit" id="unit" required="" class="form-control">
								</div>	
						</div>
							<div class="col-sm-4">
							<div class="form-group">
								<label>Unit Price</label> 
								<input type="text" placeholder="" readonly="readonly" name="unit_price" id="unit_price" required="" class="form-control">
							</div>
						</div>
					
						<div class="col-sm-4">
							<div class="form-group">
								<label>Category</label> 
								<select class="form-control" readonly="readonly" name="app_category_id" id="app_category_id" class="form-control">
									
								</select>
							</div>
						</div>
							<div class="col-sm-4">
								<div class="form-group">
								<label>Stock</label> 
								<input disabled type="text" readonly="readonly" placeholder="notif to input stock if stock is null" name="stock" id="stock" required="" class="form-control" value="">
							</div>
						</div>
						<div class="col-sm-12">
							<div class="form-group">
								<label>Description</label> 
								<textarea name="description" readonly="readonly" id="description" class="form-control" style="height:100px;"></textarea>
							</div>
						</div>
					</form>																	
				 </div>														
			</div>
			<div class="modal-footer">
				<button onclick="doDelete()" type="button" class="btn btn-primary">Ok</button>
				<button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
			</div>										
		</div>
	</div>
</div>
<!--end modal add data-->