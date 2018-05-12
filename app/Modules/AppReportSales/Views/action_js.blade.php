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
					$("#frm-filter").submit();
				}
</script>