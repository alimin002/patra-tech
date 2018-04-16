@extends('main')
@section('title', 'Dashboards')
@section('content')
	<div class="page-content">
		<div class="widget-box">
   <div class="widget-header widget-header-flat widget-header-small">
      <h5 class="widget-title">
         <i class="ace-icon fa fa-signal"></i>
         Product Sales
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
         <div id="piechart-placeholder" style="width: 90%; min-height: 150px; padding: 0px; position: relative;">
            <canvas class="flot-base" width="444" height="134" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 494px; height: 150px;"></canvas>
            <canvas class="flot-overlay" width="444" height="134" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 494px; height: 150px;"></canvas>
            <div class="legend">
               <div style="position: absolute; width: 90px; height: 111px; top: 15px; right: -30px; background-color: rgb(255, 255, 255); opacity: 0.85;"> </div>
               <table style="position:absolute;top:15px;right:-30px;;font-size:smaller;color:#545454">
                  <tbody>
                     <tr>
                        <td class="legendColorBox">
                           <div style="border:1px solid null;padding:1px">
                              <div style="width:4px;height:0;border:5px solid #68BC31;overflow:hidden"></div>
                           </div>
                        </td>
                        <td class="legendLabel">Kemeja Lengan Panjang</td>
                     </tr>
                     <tr>
                        <td class="legendColorBox">
                           <div style="border:1px solid null;padding:1px">
                              <div style="width:4px;height:0;border:5px solid #2091CF;overflow:hidden"></div>
                           </div>
                        </td>
                        <td class="legendLabel">Kemeja Lengan Pendek</td>
                     </tr>
                     <tr>
                        <td class="legendColorBox">
                           <div style="border:1px solid null;padding:1px">
                              <div style="width:4px;height:0;border:5px solid #AF4E96;overflow:hidden"></div>
                           </div>
                        </td>
                        <td class="legendLabel">Celana Jeans</td>
                     </tr>
                     <tr>
                        <td class="legendColorBox">
                           <div style="border:1px solid null;padding:1px">
                              <div style="width:4px;height:0;border:5px solid #DA5430;overflow:hidden"></div>
                           </div>
                        </td>
                        <td class="legendLabel">Tas Jeans</td>
                     </tr>
                     <tr>
                        <td class="legendColorBox">
                           <div style="border:1px solid null;padding:1px">
                              <div style="width:4px;height:0;border:5px solid #FEE074;overflow:hidden"></div>
                           </div>
                        </td>
                        <td class="legendLabel">other</td>
                     </tr>
                  </tbody>
               </table>
            </div>
         </div>
         <!-- /section:plugins/charts.flotchart -->
         <div class="hr hr8 hr-double"></div>
        
      </div>
      <!-- /.widget-main -->
   </div>
	 
	 
   <!-- /.widget-body -->
</div>
  </div><!-- /.page-content -->
<script>

</script>
@endsection