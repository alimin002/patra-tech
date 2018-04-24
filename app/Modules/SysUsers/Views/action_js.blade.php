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
	
	function renderLookupRoles(){
		$.ajax({ 
    type: 'GET', 
    url: '{{url("sys_user/render_lookup_roles")}}', 
    dataType:'json',
    success: function (response){
				//alert(response);
				for(var i=0; i< response.length -1; i++ ){
					var roles_role_name=response[i]["role_name"];
					var sys_roles_id=response[i]["sys_roles_id"];
					$("#frm-edit #sys_roles_id").append("<option value="+sys_roles_id+">"+roles_role_name+"</option>");
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
			$("#frm-edit #sys_user_id").val("");
			$("#frm-edit #sys_roles_id").empty();
			$("#frm-edit #username").val("");
			
			$("#frm-edit #username").val(response["username"]);	
			$("#frm-edit #sys_user_id").val(response["sys_user_id"]);
			
			//binding lokkup
			$("#frm-edit #sys_roles_id").prepend("<option value="+sys_roles_id+">"+role_name+"</option>");
			renderLookupRoles();
			//end binding lokkup		
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
		var sys_user_id=id;
		$.ajax({ 
    type: 'GET', 
		url: '{{url("sys_user/edit/")}}'+'/'+sys_user_id, 
    dataType: 'json',
    success: function (response){ 
		var sys_roles_id=response["sys_roles_id"];
		var role_name   =response["role_name"];
			$("#frm-delete #sys_user_id").val("");
			$("#frm-delete #sys_roles_id").empty();
			$("#frm-delete #username").val("");
			
			$("#frm-delete #username").val(response["username"]);	
			$("#frm-delete #sys_user_id").val(response["sys_user_id"]);
			//binding lokkup
			$("#frm-delete #sys_roles_id").prepend("<option value="+sys_roles_id+">"+role_name+"</option>");
			renderLookupRoles();
			//end binding lokkup		
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