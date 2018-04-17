<!-- Modal Add Data-->
<div class="modal fade" id="modal-add" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Add Return Purchase</h4>
			</div>
			<div class="modal-body">
					<form name="frm-create" id="frm-create" action="{{url('return_purchase/save')}}" method="post">
					{{ csrf_field() }}
					<div class="row">
						<div class="col-sm-4">
							<div class="form-group">
								<label>Return Number</label> 
								<input type="text" placeholder="" value="{{$return_number}}" name="return_purchase_number" id="return_purchase_number" required="" class="form-control">
							</div>	
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label>Invoice Number</label> 
								<input type="text" placeholder="" name="invoice_number" id="invoice_number" required="" class="form-control">
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label>Suplier</label> 
								<select class="form-control" name="app_suplier_id" id="app_suplier_id" class="form-control">
									<option>Choose Suplier</option>
									@foreach($lookup_suplier as $key =>$values)
									<option value="{{$values['app_suplier_id']}}">{{$values["name"]}}</option>
									@endforeach
								</select>
							</div>					
						</div>
						<div class="col-sm-12">
							<div class="form-group">
								<label>Return Reason</label> 
								<textarea name="return_reason" id="return_reason" class="form-control" style="height:100px;"></textarea>
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