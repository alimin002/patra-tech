@extends('main')
@section('title', 'Dashboards')
@section('content')
	<div class="page-content">
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
  </div><!-- /.page-content -->
<script>

</script>
@endsection