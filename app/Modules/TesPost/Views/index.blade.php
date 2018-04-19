<form name="frm-create" id="frm-create" action="{{url('tes/save')}}" method="post">
					{{ csrf_field() }}
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<label>Suplier Name</label> 
								<input type="text" placeholder="" name="name" id="name" required="" class="form-control">
							</div>
							<div class="form-group">
								<label>Address</label> 
								<input type="text" placeholder="" name="addres" id="addres" required="" class="form-control">
							</div>
							<div class="form-group">
								<label>Telephone Number</label> 
								<input type="text" placeholder="" name="telephone_number" id="telephone_number" required="" class="form-control">
							</div>
						</div> 
					<button type="submit"> TEST </button>
					</form>	