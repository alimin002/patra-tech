<!-- Modal Add Data-->
<div class="modal fade" id="modal-add" role="dialog">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Add @yield("title")</h4>
			</div>
			<div class="modal-body">
					<form name="frm-create" id="frm-create" action="{{url('test_post')}}" method="post">
					{{ csrf_field() }}
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<label>Category Product</label> 
								<input type="text" placeholder="" name="name" id="name" required="" class="form-control">
							</div>
							<div class="form-group">
								<label>Category ID</label> 
								<input type="text" placeholder="" name="app_category_id" id="app_category_id" required="" class="form-control">
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