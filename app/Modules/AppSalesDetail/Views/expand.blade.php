<!-- Modal Add Data-->
<div class="modal fade" id="modal-expand" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" onclick="closeExpand()">&times;</button>
				<h4 class="modal-title">Expand Columns Item @yield('title')</h4>
			</div>
			<div class="modal-body">
					<form name="frm-expand" id="frm-expand">
					{{ csrf_field() }}
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label>@yield('title')</label> 
								<select id="app_product_id" name="app_product_id" class="form-control" onChange="getProductById(this)" disabled>									
								@foreach($lookup_product as $key=>$values)
									<option value="{{$values['app_product_id']}}"> 
									{{$values["name"]}} 
									</option>
								@endforeach
								</select>
							</div>
							<div class="form-group">
								<label>Unit Price</label> 
								<input type="text" readonly placeholder="" name="unit_price" id="unit_price" required="" class="form-control" disabled />
							</div>
						</div>
						<div class="col-sm-6">														
							<div class="form-group">
								<label>Qty</label> 
								<input  type="text" onkeyup="getSubTotalEdit()" placeholder="" name="qty" id="qty" required="" class="form-control" disabled />
							</div>
							<div class="form-group">
								<label>Sub Total</label> 
								<input readonly type="text" placeholder="" name="sub_total" id="sub_total" required="" class="form-control" disabled />
							</div>
						</div>
						<div class="col-sm-12" style="display:none;">
							<div class="form-group">
								<label>Old Qty</label> 
								<input type="text" class="form-control" id="old_qty" name="old_qty" disabled >
							</div>
						</div>
						<div class="col-sm-12">
							<div class="form-group">
								<label>Description</label> 
								<textarea disabled name="description" id="description" class="form-control" disabled style="height:100px;"></textarea>
							</div>
						</div>
						<input readonly type="hidden" name="app_purchase_detail_id" id="app_purchase_detail_id" required="" class="form-control"/>
						<input readonly type="hidden" value="{{$data_header['app_sales_id']}}" name="app_sales_id" id="app_sales_id" required="" class="form-control"/>
						<!--selected row to delete-->
						<input readonly type="hidden" name="selected_element" id="selected_element" required="" class="form-control"/>
					</form>																	
				 </div>														
			</div>
			<div class="modal-footer">
				<button onclick="closeExpand()" type="button" class="btn btn-primary">Close</button>
			</div>										
		</div>
	</div>
</div>
<!--end modal add data-->