<!-- Modal Add Data-->
<div class="modal fade" id="modal-edit-header" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Edit Purchase</h4>
			</div>
			<div class="modal-body">
					<form name="frm-edit" id="frm-edit-header" action="{{url('purchase_detail/update_header')}}" method="post">
					{{ csrf_field() }}
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group col-sm-4">
								<label>Purcahse Number</label> 
								<input type="text" readonly="readonly" placeholder="" name="purchase_number" id="purchase_number" required="" class="form-control">
							</div>
							<div class="form-group col-sm-4">
								<label>Suplier Name</label> 
								<select id="app_suplier_id" name="app_suplier_id" class="form-control">
								@foreach($lookup_suplier as $key=>$values)
									<option value="{{$values['app_suplier_id']}}"> 
									{{$values["name"]}} 
									</option>
								@endforeach
								</select>
							</div>						
							<div class="form-group col-sm-4">
								<label>Purchase Date</label>
								<input type="text" readonly  placeholder="" name="purchase_date" id="purchase_date" required="" class="form-control" aria-describedby="popover56283"/>
							</div>
							<div class="form-group col-sm-12">
								<label>Description</label>
								<textarea  placeholder="" name="description" id="description" required="" class="form-control" ></textarea>
							</div>
							<input type="hidden" readonly="readonly" placeholder="" name="app_purchase_id" id="app_purchase_id" required="" class="form-control">
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