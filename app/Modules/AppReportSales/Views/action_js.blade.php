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
				
</script>