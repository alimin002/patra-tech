
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>@yield("title")</title>

		<meta name="description" content="overview &amp; stats" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="{{url('assets/css/bootstrap.min.css')}}" />
		<link rel="stylesheet" href="{{url('assets/css/font-awesome.min.css')}}" />
		<link rel="stylesheet" href="{{URL('assets/font-awesome/css/font-awesome.css')}}" />
		<!-- page specific plugin styles -->

		<!-- text fonts -->
		<link rel="stylesheet" href="{{url('assets/css/ace-fonts.css')}}"/>

		<!-- ace styles -->
		<link rel="stylesheet" href="{{url('assets/css/ace.min.css')}}" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="../assets/css/ace-part2.min.css" />
		<![endif]-->
		<link rel="stylesheet" href="{{url('assets/css/ace-skins.min.css')}}" />
		<link rel="stylesheet" href="{{url('assets/css/ace-rtl.min.css')}}" />

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="../assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->
		<script src="{{url('assets/js/ace-extra.min.js')}}"></script>

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="../assets/js/html5shiv.js"></script>
		<script src="../assets/js/respond.min.js"></script>
		<![endif]-->
	</head>

	<body class="no-skin">
		<!-- #section:basics/navbar.layout -->
		<div id="navbar" class="navbar navbar-default">
			<script type="text/javascript">
				try{ace.settings.check('navbar' , 'fixed')}catch(e){}
			</script>

			<div class="navbar-container" id="navbar-container">
				<!-- #section:basics/sidebar.mobile.toggle -->
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler">
					<span class="sr-only">Toggle sidebar</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>
				</button>

				<!-- /section:basics/sidebar.mobile.toggle -->
				<div class="navbar-header pull-left">
					<!-- #section:basics/navbar.layout.brand -->
					<small>
					<a href="#" class="navbar-brand">
						Patra  Application
					</a>
					</small>

					<!-- /section:basics/navbar.layout.brand -->

					<!-- #section:basics/navbar.toggle -->

					<!-- /section:basics/navbar.toggle -->
				</div>
				
				<!-- #section:basics/navbar.dropdown -->
				<div class="navbar-buttons navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">
						<!-- #section:basics/navbar.user_menu -->
						<!--notification bar-->
						{{--
						<li class="purple">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<i class="ace-icon fa fa-bell"></i>
								<span class="badge badge-important">8</span>
							</a>
							
							<ul class="dropdown-menu-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-close">
								<li class="dropdown-header">
									<i class="ace-icon fa fa-exclamation-triangle"></i>
									8 Notifications
								</li>

								<li>
									<a href="{{url('cost_predictor/stock_out_prediction/1')}}">
										<div class="clearfix">
											<span class="pull-left">
												<i class="btn btn-xs no-hover btn-pink fa fa-comment"></i>
												Raw Material Stock Out
											</span>
											<span class="pull-right badge badge-info">+12</span>
										</div>
									</a>
								</li>
							</ul>
							
						</li>
						--}}
						<!---->
						
						<li class="light-blue">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<img class="nav-user-photo" src="{{url('assets/avatars/avatar2.png')}}" alt="Jason's Photo" />
								<span class="user-info">
									<small>Welcome,</small>
									{{ session('session_login')['username'] }}
								</span>

								<i class="ace-icon fa fa-caret-down"></i>
							</a>

							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								<li>
									<a href="#">
										<i class="ace-icon fa fa-cog"></i>
										Settings
									</a>
								</li>

								<li>
									<a href="profile.html">
										<i class="ace-icon fa fa-user"></i>
										Profile
									</a>
								</li>

								<li class="divider"></li>

								<li>
									<a href="{{url('logout')}}">
										<i class="ace-icon fa fa-power-off"></i>
										Logout
									</a>
								</li>
							</ul>
						</li>

						<!-- /section:basics/navbar.user_menu -->
					</ul>
				</div>

				<!-- /section:basics/navbar.dropdown -->
			</div><!-- /.navbar-container -->
		</div>

		<!-- /section:basics/navbar.layout -->
		<div class="main-container" id="main-container">
			<script type="text/javascript">
				try{ace.settings.check('main-container' , 'fixed')}catch(e){}
			</script>

			<!-- #section:basics/sidebar -->
			<div id="sidebar" class="sidebar                  responsive">
				<script type="text/javascript">
					try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
				</script>
				<ul class="nav nav-list">
					<li class="active">
						<a href="{{url('')}}">
							<i class="menu-icon fa fa-tachometer"></i>
							<span class="menu-text"> Dashboard </span>
						</a>

						<b class="arrow"></b>
					</li>

					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-folder-o"></i>
							<span class="menu-text">Master</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="{{url('raw_material')}}">
									<i class="menu-icon fa fa-caret-right"></i>
									Raw Materials
									<b class="arrow fa fa-angle-down"></b>
								</a>
							</li>

							<li class="">
								<a href="{{url('suplier')}}">
									<i class="menu-icon fa fa-caret-right"></i>
									Suplier
								</a>
							</li>

							<li class="">
								<a href="{{url('stock_raw_material')}}">
									<i class="menu-icon fa fa-caret-right"></i>
									Stock Raw Materials
								</a>
							</li>

							<li class="">
								<a href="{{url('product')}}">
									<i class="menu-icon fa fa-caret-right"></i>
									Product
								</a>
							</li>
							<li class="">
								<a href="{{url('category_product')}}">
									<i class="menu-icon fa fa-caret-right"></i>
									Category Product
								</a>
							</li>

							<li class="">
								<a href="{{url('')}}">
									<i class="menu-icon fa fa-caret-right"></i>
									Company
								</a>
							</li>							
						</ul>
					</li>

					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-money"></i>
							<span class="menu-text">Transaction</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="{{url('purchase')}}">
									<i class="menu-icon fa fa-caret-right"></i>
									Purchase
								</a>

								<b class="arrow"></b>
							</li>
						
							<li class="">
								<a href="{{url('sales')}}">
									<i class="menu-icon fa fa-caret-right"></i>
									Sale
								</a>

								<b class="arrow"></b>
							</li>
						</ul>
					</li>
					
					<li class="">
						<a href="{{url('stock_opname_raw_material')}}" onclick="goToStockOpname()" class="dropdown-toggle">
							<i class="menu-icon fa fa-sticky-note"></i>
							<span class="menu-text">Stock Opname</span>
						</a>
					</li>
					<script>
						function goToStockOpname(){
							location.href = "{{url('stock_opname_raw_material')}}";
						}
					</script>
					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-thumbs-down"></i>
							<span class="menu-text">Return</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<!--
							<li class="">
								<a href="{{url('return_sale')}}">
									<i class="menu-icon fa fa-caret-right"></i>
									Return Sale
								</a>

							<b class="arrow"></b>
							</li>
						-->
							<li class="">
								<a href="{{url('return_purchase')}}">
									<i class="menu-icon fa fa-caret-right"></i>
									Return Purchase
								</a>

								<b class="arrow"></b>
							</li>
						</ul>
					</li>
					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-file-text"></i>
							<span class="menu-text"> Reports </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>
						<ul class="submenu">
							<li class="">
								<a href="tables.html">
									<i class="menu-icon fa fa-caret-right"></i>
									Report Sale
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="jqgrid.html">
									<i class="menu-icon fa fa-caret-right"></i>
									Report Purchase
								</a>

								<b class="arrow"></b>
							</li>
						</ul>
					
					</li>
					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-cogs"></i>
							<span class="menu-text"> Tools </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>
						<ul class="submenu">
							<li class="">
								<a href="{{url('cost_predictor')}}">
									<i class="menu-icon fa fa-caret-right"></i>
									Cost Predictor
								</a>
								<b class="arrow"></b>
							</li>
						</ul>
					
					</li>
					{{--
					<li class="">
						<a href="widgets.html">
							<i class="menu-icon fa fa-list-alt"></i>
							<span class="menu-text"> Refferences </span>
						</a>

						<b class="arrow"></b>
						<b class="arrow"></b>
						<ul class="submenu">
							<li class="">
								<a href="tables.html">
									<i class="menu-icon fa fa-caret-right"></i>
									Category
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="jqgrid.html">
									<i class="menu-icon fa fa-caret-right"></i>
									Stock
								</a>

								<b class="arrow"></b>
							</li>
						</ul>
					</li>--}}
						<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-wrench"></i>
							<span class="menu-text">Return</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="tables.html">
									<i class="menu-icon fa fa-caret-right"></i>
									Users
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="jqgrid.html">
									<i class="menu-icon fa fa-caret-right"></i>
									Company
								</a>

								<b class="arrow"></b>
							</li>
						</ul>
					</li>
				</ul><!-- /.nav-list -->

				<!-- #section:basics/sidebar.layout.minimize -->
				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>

				<!-- /section:basics/sidebar.layout.minimize -->
				<script type="text/javascript">
					try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
				</script>
			</div>

			<!-- /section:basics/sidebar -->
			<div class="main-content">
				<!-- #section:basics/content.breadcrumbs -->
				<div class="breadcrumbs" id="breadcrumbs">
					<script type="text/javascript">
						try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
					</script>

					<ul class="breadcrumb">
						<li>
							<i class="ace-icon fa fa-home home-icon"></i>
							<a href="#">Home</a>
						</li>
						<li class="active">@yield("title")</li>
					</ul><!-- /.breadcrumb -->

					<!-- #section:basics/content.searchbox -->
					<div class="nav-search" id="nav-search">
						<form class="form-search">
							<span class="input-icon">
								<input type="text" placeholder="Global Search" class="nav-search-input" id="nav-search-input" autocomplete="off" />
								<i class="ace-icon fa fa-search nav-search-icon"></i>
							</span>
						</form>
					</div><!-- /.nav-search -->

					<!-- /section:basics/content.searchbox -->
				</div>

				<!-- /section:basics/content.breadcrumbs -->
				<!--content-->
					@yield('content')
				<!--content-->
			</div><!-- /.main-content -->


			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->
		

		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script type="text/javascript">
			window.jQuery || document.write("<script src='{{url('assets/js/jquery.min.js')}}'>"+"<"+"/script>");
		</script>

		<!-- <![endif]-->

		<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='../assets/js/jquery1x.min.js'>"+"<"+"/script>");
</script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='../assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="{{url('assets/js/bootstrap.min.js')}}"></script>

		<!-- page specific plugin scripts -->

		<!--[if lte IE 8]>
		  <script src="../assets/js/excanvas.min.js"></script>
		<![endif]-->
		<script src="{{url('assets/js/jquery-ui.custom.min.js')}}"></script>
		<script src="{{url('assets/js/jquery.ui.touch-punch.min.js')}}"></script>
		<script src="{{url('assets/js/jquery.easypiechart.min.js')}}"></script>
		<script src="{{url('assets/js/jquery.sparkline.min.js')}}"></script>
		<script src="{{url('assets/js/flot/jquery.flot.min.js')}}"></script>
		<script src="{{url('assets/js/flot/jquery.flot.pie.min.js')}}"></script>
		<script src="{{url('assets/js/flot/jquery.flot.resize.min.js')}}"></script>

		<!-- ace scripts -->
		<script src="{{url('assets/js/ace-elements.min.js')}}"></script>
		<script src="{{url('assets/js/ace.min.js')}}"></script>

		<!-- inline scripts related to this page -->
		<script type="text/javascript">
		
		</script>

		<link rel="stylesheet" href="{{url('assets/css/ace.onpage-help.css')}}" />
			{{--
		<link rel="stylesheet" href="{{url('docs/assets/js/themes/sunburst.css')}}" />

		<script type="text/javascript"> ace.vars['base'] = '..'; </script>
		<script src="{{url('assets/js/ace/ace.onpage-help.js')}}"></script>
		<script src="{{url('docs/assets/js/rainbow.js')}}"></script>
		<script src="{{url('docs/assets/js/language/generic.js')}}"></script>
		<script src="{{url('docs/assets/js/language/html.js')}}"></script>
		<script src="{{url('docs/assets/js/language/css.js')}}"></script>
		<script src="{{url('docs/assets/js/language/javascript.js')}}"></script>
			--}}
	</body>
</html>
