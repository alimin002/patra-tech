<!-- Modal Add Data-->
<div class="modal fade" id="modal-delete" role="dialog">
	<div class="modal-dialog md-12">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Delete Purchase</h4>
			</div>
			<div class="modal-body">
					<form name="frm-delete" id="frm-delete" action="{{url('purchase/destroy')}}" method="post">
					{{ csrf_field() }}
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<p>The following data will be deleted, are you sure to continue this process!</p> 
								<label>Purcahse Number</label> 
								<input type="text" readonly="readonly" placeholder="" name="purchase_number" id="purchase_number" required="" class="form-control">
							</div>
							<div class="form-group">
								<label>Suplier Name</label> 
								<select disabled id="app_suplier_id" name="app_suplier_id" class="form-control">
								@foreach($lookup_suplier as $key=>$values)
									<option value="{{$values['app_suplier_id']}}"> 
									{{$values["name"]}} 
									</option>
								@endforeach
								</select>
							</div>						
							<div class="form-group">
								<label>Description</label> 
								<textarea disabled placeholder="" name="description" id="description" required="" class="form-control"></textarea>
							</div>
							<input type="hidden" readonly="readonly" placeholder="" name="app_purchase_id" id="app_purchase_id" required="" class="form-control">
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