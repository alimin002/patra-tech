<script src="{{url('assets/js/jquery.min.js')}}"></script>
<script src="{{url('assets/js/common.js')}}"></script>
<script src="{{url('assets/js/date-time/moment.min.js')}}"></script>
<script src="{{url('assets/js/date-time/daterangepicker.min.js')}}"></script>
<script src="{{url('assets/js/date-time/bootstrap-datetimepicker.min.js')}}"></script>
<script>
				//to translate the daterange picker, please copy the "examples/daterange-fr.js" contents here before initialization
				$('input[name=date-range-picker]').daterangepicker({
					'applyClass' : 'btn-sm btn-success',
					'cancelClass' : 'btn-sm btn-default',
					locale: {
						applyLabel: 'Apply',
						cancelLabel: 'Cancel',
					}
				})
				.prev().on(ace.click_event, function(){
					$(this).next().focus();
				});
				
				function printReport(){
					//alert($("#id-date-range-picker-1").val());
					var date_start= $("#id-date-range-picker-1").val().split('-')[0];
					var date_end  = $("#id-date-range-picker-1").val().split('-')[1];
					//alert(formatDate(date_start));
					$("#date_start").val(formatDate(date_start));
					$("#date_end").val(formatDate(date_end));
					//alert(date_start);
					$("#frm-filter").submit();
				}
				//
				function downloadPdf(){
					//alert($("#id-date-range-picker-1").val());
					var date_start= $("#date_start").val();
					var date_end  = $("#date_end").val();
					//alert(date_start);
					var url="{{url('report_sales/download_pdf')}}"+"/"+date_start+"/"+date_end;
					window.open(url, '_blank');
					//alert(formatDate(date_start));
					//$("#date_start").val(formatDate(date_start));
					//$("#date_end").val(formatDate(date_end));
					//alert(date_start);
					//$("#frm-filter").submit();
				}
				
				//
				function sendReportViaEmail(){
					//alert($("#id-date-range-picker-1").val());
					
					$("#modal-form-email").modal("toggle");
					//alert(date_start);
					//var url="{{url('report_sales/send_report_to_email')}}"+"/"+date_start+"/"+date_end;
					//window.open(url, '_blank');
					//alert(formatDate(date_start));
					//$("#date_start").val(formatDate(date_start));
					//$("#date_end").val(formatDate(date_end));
					//alert(date_start);
					//$("#frm-filter").submit();
				}
				
				function doSendEmail(){
					var date_start     = $("#date_start").val();
					var date_end       = $("#date_end").val();
					var email_address  = $("#email_address").val();
					$("#modal-form-email").modal("hide");
					var url="{{url('report_sales/send_report_to_email')}}"+"/"+date_start+"/"+date_end+"/"+email_address;
					window.open(url, '_blank');
				}
				
		function expandData(id,app_sales_id){
			//$("#modal-expand").modal("toggle");
			var app_sales_detail_id=id;
			//alert(app_sales_id);
			$.ajax({ 
			type: 'GET', 
			url: '{{url("report_sales/edit")}}'+'/'+app_sales_detail_id +'/'+app_sales_id, 
			dataType: 'json',
			success: function (response){			
					$("#frm-expand #app_sales_id").val(response["app_sales_id"]);
					$("#frm-expand #invoice_number").val(response["invoice_number"]);
					$("#frm-expand #invoice_date").val(response["sale_date"]);
					$("#frm-expand #total_invoice").val(response["total_invoice"]);
					$("#frm-expand #customer_name").val(response["customer_name"]);
					$("#frm-expand #customer_email").val(response["customer_email"]);
					$("#frm-expand #description").val(response["description"]);				
					$("#modal-expand").modal("toggle");	
			}
			});		
	}
				
</script>