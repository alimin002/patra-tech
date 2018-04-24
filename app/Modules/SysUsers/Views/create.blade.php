<!-- Modal Add Data-->
<div class="modal fade" id="modal-add" role="dialog">
	<div class="modal-dialog md-12">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Add User</h4>
			</div>
			<div class="modal-body">
					<form name="frm-create" id="frm-create" action="{{url('sys_user/save')}}" method="post">
					{{ csrf_field() }}
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<label>Username</label> 
								<input type="text" placeholder="" name="username" id="username" required="" class="form-control">
							</div>	
							<div class="form-group">
								<label>Role</label> 
								<select class="form-control" id="sys_roles_id" name="sys_roles_id" required="">
									<option value="">Select Roles</option>
									@foreach($lookup_roles as $key =>$values)
									<option value="{{$values['sys_roles_id']}}">{{$values["role_name"]}}</option>
									@endforeach
								</select>
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