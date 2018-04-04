<!-- Modal Add Data-->
<div class="modal fade" id="modal-add" role="dialog">
	<div class="modal-dialog modal-small">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Add Data Product</h4>
			</div>
			<div class="modal-body">
					<form name="frm-create" id="frm-create" action="{{url('product/save')}}" method="post">
					{{ csrf_field() }}
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<label>Product Name</label> 
								<input type="text" placeholder="" name="name" id="name" required="" class="form-control">
							</div>
							<div class="form-group">
								<label>Unit</label> 
								<input type="text" placeholder="" name="unit" id="unit" required="" class="form-control">
							</div>
							<div class="form-group">
								<label>Unit Price</label> 
								<input type="text" placeholder="" name="unit_price" id="unit_price" required="" class="form-control">
							</div>
							<div class="form-group">
								<label>Category</label> 
								<select class="form-control" name="app_category_id" id="app_category_id" class="form-control">
								<option>Choose Category</option>
								@foreach($lookup_category as $key=>$values)
									<option value="{{$values['app_category_id']}}">{{$values['name']}}</option>
								@endforeach
								</select>
							</div>
							<div class="form-group">
								<label>Description</label> 
								<textarea name="description" id="description" class="form-control" style="height:100px;"></textarea>
							</div>
						</div>
					</form>																	
				 </div>														
			</div>
			<div class="modal-footer">
				<button onclick="doSave()" type="button" class="btn btn-primary">Save</button>
				<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
			</div>										
		</div>
	</div>
</div>
<!--end modal add data-->