<!-- Modal Add Data-->
<div class="modal fade" id="modal-delete" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" onclick="cancelDeleteItem()">&times;</button>
				<h4 class="modal-title">Delete Item Purchase</h4>
			</div>
			<div class="modal-body">
					<form name="frm-delete" id="frm-delete" action="{{url('purchase_detail/destroy')}}" method="post">
					{{ csrf_field() }}
					<div class="row">
					<div class="col-sm-12">
							<div class="form-group">
								<p>The following data will be deleted are you sure to continue this process?</p>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label>Raw Material</label> 
								<input type="text" class="form-control" readonly="readonly" name="raw_material_name" id="raw_material_name"/>
								<input type="hidden" class="form-control" name="app_raw_material_id" id="app_raw_material_id"/>
							</div>
							<div class="form-group">
								<label>Unit Price</label> 
								<input disabled type="text" readonly placeholder="" name="unit_price" id="unit_price" required="" class="form-control"/>
							</div>
						</div>
						<div class="col-sm-6">														
							<div class="form-group">
								<label>Qty</label> 
								<input  type="text" disabled onkeyup="getSubTotalEdit()" placeholder="" name="qty" id="qty" required="" class="form-control"/>
							</div>
							<div class="form-group">
								<label>Sub Total</label> 
								<input readonly type="text" placeholder="" name="sub_total" id="sub_total" required="" class="form-control"/>
							</div>
						</div>						
						<div class="col-sm-12">
							<div class="form-group">
								<label>Description</label> 
								<textarea disabled name="description" id="description" class="form-control" style="height:100px;"></textarea>
							</div>
						</div>
						<input readonly type="hidden" name="app_purchase_detail_id" id="app_purchase_detail_id" required="" class="form-control"/>
						<input readonly type="hidden" value="{{$data_header['app_purchase_id']}}" name="app_purchase_id" id="app_purchase_id" required="" class="form-control"/>
					</form>																	
				 </div>														
			</div>
			<div class="modal-footer">
				<button onclick="doDeleteItem()" type="button" class="btn btn-primary">Delete</button>
				<button type="button" class="btn btn-primary" data-dismiss="modal" onclick="cancelDeleteItem()">Cancel</button>
			</div>										
		</div>
	</div>
</div>
<!--end modal add data-->