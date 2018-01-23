<!-- Modal Add Data-->
<div class="modal fade" id="modal-add" role="dialog">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Add Stock Raw Material</h4>
			</div>
			<div class="modal-body">
					<form name="frm-create" id="frm-create" action="{{url('stock_raw_material/save')}}" method="post">
					{{ csrf_field() }}
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<label>Raw Material Name</label> 
								<select id="app_raw_material_id" name="app_raw_material_id" class="form-control">
								@foreach($lookup_raw_material as $key=>$values)
									<option value="{{$values['app_raw_material_id']}}"> 
									{{$values["name"]}} 
									</option>
								@endforeach
								</select>
							</div>
							<div class="form-group">
								<label>Stock</label> 
								<input type="text" placeholder="" name="stock" id="stock" required="" class="form-control">
							</div>
							<div class="form-group">
								<label>Description</label> 
								<textarea placeholder="" name="description" id="description" required="" class="form-control"></textarea>
							</div>
						</div>
					</form>																	
				 </div>														
			</div>
			<div class="modal-footer">
				<button onclick="doSave()" type="button" class="btn btn-primary">Save</button>
				<button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
			</div>										
		</div>
	</div>
</div>
<!--end modal add data-->