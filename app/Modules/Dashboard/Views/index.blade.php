@extends('main')
@section('title', 'Dashboards')
@section('content')
	<div class="page-content">
	 <div class="col-sm-6">
									<div class="widget-box transparent">
										<div class="widget-header widget-header-flat">
											<h4 class="widget-title lighter">
												<i class="ace-icon fa fa-star orange"></i>
												Critical Resourcess (Raw Material)
											</h4>

											<div class="widget-toolbar">
												<a href="#" data-action="collapse">
													<i class="ace-icon fa fa-chevron-up"></i>
												</a>
											</div>
										</div>

										<div class="widget-body">
											<div class="widget-main no-padding">
												<table class="table table-bordered table-striped">
													<thead class="thin-border-bottom">
														<tr>
															<th>
																<i class="ace-icon fa fa-caret-right blue"></i>name
															</th>

															<th>
																<i class="ace-icon fa fa-caret-right blue"></i>price
															</th>

															<th class="hidden-480">
																<i class="ace-icon fa fa-caret-right blue"></i>status
															</th>
														</tr>
													</thead>

													<tbody>
														<tr>
															<td>internet.com</td>

															<td>
																<small>
																	<s class="red">$29.99</s>
																</small>
																<b class="green">$19.99</b>
															</td>

															<td class="hidden-480">
																<span class="label label-info arrowed-right arrowed-in">on sale</span>
															</td>
														</tr>

														<tr>
															<td>online.com</td>

															<td>
																<small>
																	<s class="red"></s>
																</small>
																<b class="green">$16.45</b>
															</td>

															<td class="hidden-480">
																<span class="label label-success arrowed-in arrowed-in-right">approved</span>
															</td>
														</tr>

														<tr>
															<td>newnet.com</td>

															<td>
																<small>
																	<s class="red"></s>
																</small>
																<b class="green">$15.00</b>
															</td>

															<td class="hidden-480">
																<span class="label label-danger arrowed">pending</span>
															</td>
														</tr>

														<tr>
															<td>web.com</td>

															<td>
																<small>
																	<s class="red">$24.99</s>
																</small>
																<b class="green">$19.95</b>
															</td>

															<td class="hidden-480">
																<span class="label arrowed">
																	<s>out of stock</s>
																</span>
															</td>
														</tr>

														<tr>
															<td>domain.com</td>

															<td>
																<small>
																	<s class="red"></s>
																</small>
																<b class="green">$12.00</b>
															</td>

															<td class="hidden-480">
																<span class="label label-warning arrowed arrowed-right">SOLD</span>
															</td>
														</tr>
													</tbody>
												</table>
											</div><!-- /.widget-main -->
										</div><!-- /.widget-body -->
									</div><!-- /.widget-box -->
								</div>
								<div class="col-sm-6">
									<div class="widget-box">
										<div class="widget-header widget-header-flat widget-header-small">
											<h5 class="widget-title">
												<i class="ace-icon fa fa-signal"></i>
											 Sale Statistics
											</h5>

											<div class="widget-toolbar no-border">
												<div class="inline dropdown-hover">
													<button class="btn btn-minier btn-primary">
														This Week
														<i class="ace-icon fa fa-angle-down icon-on-right bigger-110"></i>
													</button>

													<ul class="dropdown-menu dropdown-menu-right dropdown-125 dropdown-lighter dropdown-close dropdown-caret">
														<li class="active">
															<a href="#" class="blue">
																<i class="ace-icon fa fa-caret-right bigger-110">&nbsp;</i>
																This Week
															</a>
														</li>

														<li>
															<a href="#">
																<i class="ace-icon fa fa-caret-right bigger-110 invisible">&nbsp;</i>
																Last Week
															</a>
														</li>

														<li>
															<a href="#">
																<i class="ace-icon fa fa-caret-right bigger-110 invisible">&nbsp;</i>
																This Month
															</a>
														</li>

														<li>
															<a href="#">
																<i class="ace-icon fa fa-caret-right bigger-110 invisible">&nbsp;</i>
																Last Month
															</a>
														</li>
													</ul>
												</div>
											</div>
										</div>

										<div class="widget-body">
											<div class="widget-main">
												<!-- #section:plugins/charts.flotchart -->
												<div id="piechart-placeholder" style="width: 90%; min-height: 150px; padding: 0px; position: relative;"><canvas class="flot-base" width="395" height="134" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 440px; height: 150px;"></canvas><canvas class="flot-overlay" width="395" height="134" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 440px; height: 150px;"></canvas><div class="legend"><div style="position: absolute; width: 91px; height: 111px; top: 15px; right: -30px; background-color: rgb(255, 255, 255); opacity: 0.85;"> </div><table style="position:absolute;top:15px;right:-30px;;font-size:smaller;color:#545454"><tbody><tr><td class="legendColorBox"><div style="border:1px solid null;padding:1px"><div style="width:4px;height:0;border:5px solid #68BC31;overflow:hidden"></div></div></td><td class="legendLabel">social networks</td></tr><tr><td class="legendColorBox"><div style="border:1px solid null;padding:1px"><div style="width:4px;height:0;border:5px solid #2091CF;overflow:hidden"></div></div></td><td class="legendLabel">search engines</td></tr><tr><td class="legendColorBox"><div style="border:1px solid null;padding:1px"><div style="width:4px;height:0;border:5px solid #AF4E96;overflow:hidden"></div></div></td><td class="legendLabel">ad campaigns</td></tr><tr><td class="legendColorBox"><div style="border:1px solid null;padding:1px"><div style="width:4px;height:0;border:5px solid #DA5430;overflow:hidden"></div></div></td><td class="legendLabel">direct traffic</td></tr><tr><td class="legendColorBox"><div style="border:1px solid null;padding:1px"><div style="width:4px;height:0;border:5px solid #FEE074;overflow:hidden"></div></div></td><td class="legendLabel">other</td></tr></tbody></table></div></div>

												<!-- /section:plugins/charts.flotchart -->
												<div class="hr hr8 hr-double"></div>

												<div class="clearfix">
													<!-- #section:custom/extra.grid -->
													<div class="grid3">
														<span class="grey">
															<i class="ace-icon fa fa-facebook-square fa-2x blue"></i>
															&nbsp; likes
														</span>
														<h4 class="bigger pull-right">1,255</h4>
													</div>

													<div class="grid3">
														<span class="grey">
															<i class="ace-icon fa fa-twitter-square fa-2x purple"></i>
															&nbsp; tweets
														</span>
														<h4 class="bigger pull-right">941</h4>
													</div>

													<div class="grid3">
														<span class="grey">
															<i class="ace-icon fa fa-pinterest-square fa-2x red"></i>
															&nbsp; pins
														</span>
														<h4 class="bigger pull-right">1,050</h4>
													</div>

													<!-- /section:custom/extra.grid -->
												</div>
											</div><!-- /.widget-main -->
										</div><!-- /.widget-body -->
									</div>
								</div>
								<div class="col-sm-7">
									<div class="widget-box transparent">
										<div class="widget-header widget-header-flat">
											<h4 class="widget-title lighter">
												<i class="ace-icon fa fa-signal"></i>
												Summary
											</h4>

											<div class="widget-toolbar">
												<a href="#" data-action="collapse">
													<i class="ace-icon fa fa-chevron-up"></i>
												</a>
											</div>
										</div>

										<div class="widget-body">
											<div class="widget-main padding-4">
												<div class="infobox-chart">
													<span class="sparkline" data-values="3,4,2,3,4,4,2,2"><canvas width="39" height="19" style="display: inline-block; vertical-align: top; width: 39px; height: 19px;"></canvas></span>
												</div>
											</div><!-- /.widget-main -->
										</div><!-- /.widget-body -->
									</div><!-- /.widget-box -->
								</div>
  </div><!-- /.page-content -->
<script>

</script>
@endsection