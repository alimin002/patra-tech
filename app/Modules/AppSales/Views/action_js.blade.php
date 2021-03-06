<script>

function expandData(id){
		var app_sales_id=id;
		$.ajax({ 
    type: 'GET', 
		url: '{{url("sales/edit")}}'+'/'+app_sales_id, 
    dataType: 'json',
    success: function (response){ 
				$("#frm-expand #app_sales_id").val(response["app_sales_id"]);
				$("#frm-expand #invoice_number").val(response["invoice_number"]);
				$("#frm-expand #customer_name").val(response["customer_name"]);
				$("#frm-expand #customer_email").val(response["customer_email"]);
				$("#frm-expand #description").val(response["description"]);				
			
				$("#modal-expand").modal("toggle");
    }
		});		
	}
	
	function add()
	{
		$("#modal-add").modal("toggle");
		$("#frm-create #customer_name").val("");		
		$("#frm-create #description").val("");	
	}
	function doSave(){
		$("#modal-add").modal("hide");
		$("#frm-create").submit();
	}
	
	function doDelete(){
		$("#modal-delete").modal("hide");
		$("#frm-delete").submit();
	}
	
	function doUpdate(){
		$("#modal-edit").modal("hide");
		$("#frm-edit").submit();
	}
	
	function renderLookupSuplier(){
		$.ajax({ 
    type: 'GET', 
    url: '{{url("purchase/render_lookup_suplier")}}', 
    dataType:'json',
    success: function (response){
				//alert(response);
				for(var i=0; i< response.length -1; i++ ){
					var suplier_name=response[i]["name"];
					var app_suplier_id=response[i]["app_suplier_id"];
					$("#frm-edit #app_suplier_id").append("<option value="+app_suplier_id+">"+suplier_name+"</option>");
				}
			}
		});
	}
	
	
	function edit(id){
		var app_sales_id=id;
		$.ajax({ 
    type: 'GET', 
		url: '{{url("sales/edit")}}'+'/'+app_sales_id, 
    dataType: 'json',
    success: function (response){ 
				$("#frm-edit #app_sales_id").val(response["app_sales_id"]);
				$("#frm-edit #invoice_number").val(response["invoice_number"]);
				$("#frm-edit #customer_name").val(response["customer_name"]);		
				$("#frm-edit #description").val(response["description"]);	
				$("#frm-edit #customer_email").val(response["customer_email"]);							
				$("#modal-edit").modal("toggle");
    }
		});		
	}
	
	function detail(id){
		var app_sales_id=id;
		var url='{{url("sales_detail")}}?'+'sales_id='+app_sales_id;
		location.href = url;
	}
	
	function deleteData(id){
		var app_sales_id=id;
		$.ajax({ 
    type: 'GET', 
		url: '{{url("sales/edit")}}'+'/'+app_sales_id, 
    dataType: 'json',
    success: function (response){ 
				$("#frm-delete #app_sales_id").val(response["app_sales_id"]);
				$("#frm-delete #invoice_number").val(response["invoice_number"]);
				$("#frm-delete #customer_name").val(response["customer_name"]);
				$("#frm-delete #customer_email").val(response["customer_email"]);
				$("#frm-delete #description").val(response["description"]);				
				
				$("#modal-delete").modal("toggle");
    }
		});		
	}
	
		function budget_production(id){
			var app_purchase_id=id;
			var url='{{url("budget_production")}}?'+'sales_id='+app_purchase_id;
			location.href = url;
		}
</script>