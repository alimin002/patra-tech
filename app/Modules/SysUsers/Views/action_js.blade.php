<script>
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
		var sys_user_id=id;
		$.ajax({ 
    type: 'GET', 
		url: '{{url("sys_user/edit/")}}'+'/'+sys_user_id, 
    dataType: 'json',
    success: function (response){ 
		var sys_roles_id=response["sys_roles_id"];
		var role_name   =response["role_name"];
			$("#frm-edit #sys_users_id").val("");
			$("#frm-edit #sys_roles_id").empty();
			$("#frm-edit #username").val("");
			
			$("#frm-edit #username").val(response["username"]);	
			$("#frm-edit #sys_users_id").val(response["sys_users_id"]);
				//$("#frm-edit #sys_roles_id").val(response["sys_roles_id"]);	
				$("#frm-edit #sys_roles_id").prepend("<option value="+sys_roles_id+">"+role_name+"</option>");
				$("#frm-edit #username").val(response["username"]);	
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