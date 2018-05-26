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
					var url="{{url('report_purchase/download_pdf')}}"+"/"+date_start+"/"+date_end;
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
					var url="{{url('report_purchase/send_report_to_email')}}"+"/"+date_start+"/"+date_end+"/"+email_address;
					window.open(url, '_blank');
				}
				
				function expandData(id,app_purchase_id){
					var app_purchase_detail_id=id;
					$.ajax({ 
					type: 'GET', 
					url: '{{url("report_purchase/edit")}}'+'/'+app_purchase_detail_id +'/'+app_purchase_id, 
					dataType: 'json',
					success: function (response){						
							$("#frm-expand #purchase_number").val(response["purchase_number"]);
							$("#frm-expand #purchase_date").val(response["purchase_date"]);
							$("#frm-expand #suplier_name").val(response["suplier_name"]);	
							$("#frm-expand #total_purchase").val(response["total_purchase"]);		
							$("#modal-expand").modal("toggle");
							
					}
					});		
				}
				
</script>