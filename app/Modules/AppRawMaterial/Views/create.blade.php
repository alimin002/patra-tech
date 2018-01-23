<!-- Modal Add Data-->
<div class="modal fade" id="modal-add" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Add data Raw Material</h4>
			</div>
			<div class="modal-body">
					<form name="frm-create" id="frm-create" action="{{url('raw_material/save')}}" method="post">
					{{ csrf_field() }}
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label>Raw Material Name</label> 
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
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label>Suplier</label> 
								<select class="form-control" name="app_suplier_id" id="app_suplier_id" class="form-control">
									<option>Choose Suplier</option>
									@foreach($lookup_suplier as $key =>$values)
									<option value="{{$values['app_suplier_id']}}">{{$values["name"]}}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group">
								<label>Category</label> 
								<select class="form-control" name="app_category_raw_material_id" id="app_category_raw_material_id" class="form-control">
								<option>Choose Category</option>
								@foreach($lookup_category as $key=>$values)
									<option value="{{$values['app_category_raw_material_id']}}">{{$values['name']}}</option>
								@endforeach
								</select>
							</div>
							<div class="form-group">
								<label>Stock</label> 
								<input disabled type="text" placeholder="notif to input stock if stock is null" name="" id="" required="" class="form-control">
							</div>
						</div>
						<div class="col-sm-12">
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