<!-- Modal Add Data-->
<div class="modal fade" id="modal-add" role="dialog">
	<div class="modal-dialog modal-lg"><!---this tag is to determine the large of modal-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Add Product Composition</h4>
			</div>
			<div class="modal-body">
					<form name="frm-create" id="frm-create" action="{{url('cost_predictor/save')}}" method="post">
					{{ csrf_field() }}
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<label>Product Name</label> 
								<select required="" id="app_product_id" name="app_product_id" class="form-control">
									<option> 
										Choose Product
									</option>	
										@foreach($lookup_product as $key=>$values)
											<option value="{{$values['app_product_id']}}"> 
											{{$values["name"]}} 
											</option>
										@endforeach									
								</select>
							</div>							
						</div>
						<div class="col-sm-12">
							<div class="form-group">
								<button class="btn btn-primary" type="button" onclick="add_raw()">Add raw Material</button>
							</div>							
						</div>
						<div  class="col-sm-12" id="main-body" style="border:1px solid white;">																						
						</div>
						<div  class="col-sm-12" style="display:none">
								<textarea class="form-control" id="product_composition" name="product_composition"></textarea>
						</div>						
				</div>
			</form>
			<div class="modal-footer">
				<button onclick="doSave()" type="button" class="btn btn-primary">Save</button>
				<button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
			</div>										
		</div>
	</div>
</div>
</div>
<!--end modal add data-->