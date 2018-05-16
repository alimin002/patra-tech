@extends('main')
@section('title', 'Dashboards')
@section('content')
	<div class="page-content">
	{{--
		<div class="col-sm-12">
			<a href="{{url('sales')}}" class="btn btn-app btn-info btn-sm no-radius">
				<i class="ace-icon fa fa-shopping-cart bigger-230"></i>
				 Sales
			</a>
			<a href="{{url('product')}}" class="btn btn-app btn-info btn-sm no-radius">
				<i class="ace-icon fa fa-diamond bigger-230"></i>
				 Product
			</a>
			<a href="{{url('purchase')}}" class="btn btn-app btn-info btn-sm no-radius" style="width:auto;">
				<i class="ace-icon fa fa-shopping-basket bigger-230"></i>
				 Purchase Order
			</a>
			<a href="{{url('raw_material')}}" class="btn btn-app btn-info btn-sm no-radius" style="width:auto;">
				<i class="ace-icon fa fa-truck bigger-230"></i>
				 Raw Materials
			</a>
			<a href="{{url('suplier')}}" class="btn btn-app btn-info btn-sm no-radius">
				<i class="ace-icon fa fa-male bigger-230"></i>
				 Suplier
			</a>
			<a href="{{url('stock_opname')}}" class="btn btn-app btn-info btn-sm no-radius" style="width:auto;">
				<i class="ace-icon fa fa-list-alt  bigger-230"></i>
				 Stock Opname
			</a>
			<a href="{{url('return_purchase')}}" class="btn btn-app btn-info btn-sm no-radius">
				<i class="ace-icon fa fa-backward bigger-230"></i>
				 Return Purchase
			</a>
			<a href="{{url('report_sale')}}" class="btn btn-app btn-info btn-sm no-radius" style="width:auto;">
				<i class="ace-icon fa fa-file-pdf-o bigger-230"></i>
				 Report Sale
			</a>
			<a href="{{url('report_purchase')}}" class="btn btn-app btn-info btn-sm no-radius" style="width:auto;">
				<i class="ace-icon fa fa-file-pdf-o bigger-230"></i>
				 Report Purchase
			</a>
			<a href="{{url('product_composition')}}" class="btn btn-app btn-info btn-sm no-radius" style="width:auto;">
				<i class="ace-icon fa fa fa-eyedropper bigger-230"></i>
				 Product Composition
			</a>
				<a href="{{url('logout')}}" class="btn btn-app btn-info btn-sm no-radius">
				<i class="ace-icon fa fa fa-power-off bigger-230"></i>
				 Log Out
			</a>
		</div>
	--}}
	<div class="col-sm-7 infobox-container">
									<!-- #section:pages/dashboard.infobox -->
									<div class="infobox infobox-green">
										<div class="infobox-icon">
											<i class="ace-icon fa fa-shopping-cart"></i>
										</div>

										<div class="infobox-data">
											<span class="infobox-data-number">32</span>
											<div class="infobox-content">Total Data Purchase</div>
										</div>

										<!-- #section:pages/dashboard.infobox.stat -->
										{{--<div class="stat stat-success">8%</div>--}}

										<!-- /section:pages/dashboard.infobox.stat -->
									</div>

									<div class="infobox infobox-blue">
										<div class="infobox-icon">
											<i class="ace-icon fa fa-diamond"></i>
										</div>

										<div class="infobox-data">
											<span class="infobox-data-number">11</span>
											<div class="infobox-content">Total Data Product</div>
										</div>
										{{--
										<div class="badge badge-success">
											+32%
											<i class="ace-icon fa fa-diamond"></i>
										</div>
										--}}
									</div>

									<div class="infobox infobox-pink">
									<div class="infobox-icon">
											<i class="ace-icon fa fa-truck"></i>
										</div>

										<div class="infobox-data">
											<span class="infobox-data-number">11</span>
											<div class="infobox-content">Total Data Rawmaterial</div>
										</div>
										<div class="stat stat-important">4 critical stock</div>
									</div>

									<div class="infobox infobox-red">
										<div class="infobox-icon">
											<i class="ace-icon fa fa-shopping-basket"></i>
										</div>

										<div class="infobox-data">
											<span class="infobox-data-number">7</span>
											<div class="infobox-content">Total Data Sales Order</div>
										</div>
									</div>

									<div class="infobox infobox-orange2">
									<div class="infobox-icon">
											<i class="ace-icon fa fa fa-male"></i>
										</div>

										<div class="infobox-data">
											<span class="infobox-data-number">7</span>
											<div class="infobox-content">Total Data Suplier</div>
										</div>
									</div>

									<div class="infobox infobox-blue2">
										<div class="infobox-icon">
											<i class="ace-icon fa fa-list-alt"></i>
										</div>

										<div class="infobox-data">
											<span class="infobox-data-number">7</span>
											<div class="infobox-content">Total Data</div>
										</div>
									</div>

									<!-- /section:pages/dashboard.infobox -->
									<div class="space-6"></div>
									<!-- /section:pages/dashboard.infobox.dark -->
								</div>
  </div><!-- /.page-content -->
<script>

</script>
@endsection