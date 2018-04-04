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
	
	function renderlookupRawMaterial(){
		$.ajax({ 
    type: 'GET', 
    url: '{{url("stock_raw_material/render_lookup_raw_material")}}', 
    dataType: 'json',
    success: function (response){
				//alert(response);
				for(var i=0; i< response.length -1; i++ ){
					var raw_material_name=response[i]["name"];
					var app_raw_material_id_id=response[i]["app_raw_material_id"];
					$("#frm-edit #app_raw_material_id").append("<option value="+app_raw_material_id_id+">"+raw_material_name+"</option>");
				}
			}
		});
	}
	
	
	function edit(id){
		//alert(1);
		var app_stock_raw_material_id=id;
		$.ajax({ 
    type: 'GET', 
    url: '{{url("stock_raw_material/edit")}}'+'/'+app_stock_raw_material_id, 
    dataType: 'json',
    success: function (response){ 
				$("#frm-edit #app_stock_raw_material_id").val(response["app_stock_raw_material_id"]);
				$("#frm-edit #stock").val(response["stock"]);
				$("#frm-edit #description").val(response["description"]);				
				var app_raw_material_id=response["app_raw_material_id"];
				var raw_material_name=response["name"];
				$("#frm-edit #app_raw_material_id").empty();
				$("#frm-edit #app_raw_material_id").prepend("<option value="+app_raw_material_id+">"+raw_material_name+"</option>");
				renderlookupRawMaterial();
						
				$("#frm-edit #description").val(response["description"]);
				$("#frm-edit #stock").val(response["stock"]);					
				$("#frm-edit #app_raw_material_id").val(response["app_raw_material_id"])					
				$("#modal-edit").modal("toggle");
    }
		});
		
		
		
	}
	
	function deleteData(id){
		var app_stock_raw_material_id=id;
		$.ajax({ 
    type: 'GET', 
    url: '{{url("stock_raw_material/edit")}}'+'/'+app_stock_raw_material_id, 
    dataType: 'json',
    success: function (response){ 
				$("#frm-delete #app_stock_raw_material_id").val(response["app_stock_raw_material_id"]);
				$("#frm-delete #stock").val(response["stock"]);
				$("#frm-delete #description").val(response["description"]);				
				var app_raw_material_id=response["app_raw_material_id"];
				var raw_material_name=response["name"];
				$("#frm-delete #app_raw_material_id").empty();
				$("#frm-delete #app_raw_material_id").prepend("<option value="+app_raw_material_id+">"+raw_material_name+"</option>");
				renderlookupRawMaterial();
						
				$("#frm-delete #description").val(response["description"]);
				$("#frm-delete #stock").val(response["stock"]);					
				$("#frm-delete #app_raw_material_id").val(response["app_raw_material_id"])					
				$("#modal-delete").modal("toggle");
    }
		});

	}
</script>