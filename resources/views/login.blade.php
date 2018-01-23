	<div class="widget-body">
	<div class="widget-main">
		<h4 class="header blue lighter bigger">
			<i class="ace-icon fa fa-coffee green"></i>
			Please Enter Your Information
		</h4>

		<div class="space-6"></div>

		 <form class="m-t" role="form" action="{{url('do_login')}}" method="POST">
		 {{ csrf_field() }}
			<fieldset>
				<label class="block clearfix">
					<span class="block input-icon input-icon-right">
						<input type="text" id="username" name="username" class="form-control" placeholder="Username" />
						<i class="ace-icon fa fa-user"></i>
					</span>
				</label>

				<label class="block clearfix">
					<span class="block input-icon input-icon-right">
						<input type="password" name="password" id="password" class="form-control" placeholder="Password" />
						<i class="ace-icon fa fa-lock"></i>
					</span>
				</label>
				
				<label class="block clearfix">
					<span class="block input-icon input-icon-right">
						 <select name="role" id="role" class="form-control" placeholder="Password" required="">
								<option>Select Roles</option>
								@foreach($sys_roles as $key => $value)
								<option value="{{$value['name']}}">{{$value['name']}}</option>
								@endforeach
							</select>
						<i class="ace-icon fa fa-user"></i>
					</span>
				</label>

				<div class="space"></div>

				<div class="clearfix">
					<label class="inline">
						<input type="checkbox" class="ace" />
						<span class="lbl"> Remember Me</span>
					</label>

					<button type="submit" class="width-35 pull-right btn btn-sm btn-primary">
						<i class="ace-icon fa fa-key"></i>
						<span class="bigger-110">Login</span>
					</button>
				</div>

				<div class="space-4"></div>
			</fieldset>
		</form>

		<div class="social-or-login center">
			<span class="bigger-110">Or Login Using</span>
		</div>

		<div class="space-6"></div>

		<div class="social-login center">
			<a class="btn btn-primary">
				<i class="fa fa-facebook"></i>
			</a>

			<a class="btn btn-info">
				<i class="fa fa-twitter"></i>
			</a>

			<a class="btn btn-danger">
				<i class="fa fa-google-plus"></i>
			</a>
		</div>
	</div><!-- /.widget-main -->

	<div class="toolbar clearfix">
		<div>
			<a href="#" data-target="#forgot-box" class="forgot-password-link">
				<i class="ace-icon fa fa-arrow-left"></i>
				I forgot my password
			</a>
		</div>

		<div>
			<a href="#" data-target="#signup-box" class="user-signup-link">
				I want to register
				<i class="ace-icon fa fa-arrow-right"></i>
			</a>
		</div>
	</div>
</div><!-- /.widget-body -->