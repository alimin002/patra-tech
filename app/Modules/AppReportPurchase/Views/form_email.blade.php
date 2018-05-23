<!-- Modal Add Data-->
<div class="modal fade" id="modal-form-email" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Set Email Destination</h4>
			</div>
			<div class="modal-body">
					<form name="frm-email" id="frm-email" method="post">
					{{ csrf_field() }}
					<div class="row">
						
						<div class="col-sm-12">														
							<div class="form-group">
								<label>Email Address</label> 
								<input  type="text" placeholder="" name="email_address" id="email_address" required="" class="form-control"/>
							</div>
						</div>
					</form>																	
				 </div>														
			</div>
			<div class="modal-footer">
				<button onclick="doSendEmail()" type="button" class="btn btn-primary">Send</button>
				<button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
			</div>										
		</div>
	</div>
</div>
<!--end modal add data-->