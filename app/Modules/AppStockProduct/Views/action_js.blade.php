<script>
	function add()
	{
		$("#modal-add").modal("toggle");
		$("#frm-create #app_stock_id").val("");
		$("#frm-create #stock").val("");
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
	
	function renderLookupProduct(){
		$.ajax({ 
    type: 'GET', 
    url: '{{url("stock_product/render_lookup_product")}}', 
    dataType: 'json',
    success: function (response){
				//alert(response);
				for(var i=0; i< response.length -1; i++ ){
					var product_name=response[i]["name"];
					var app_product_id_id=response[i]["app_product_id"];
					$("#frm-edit #app_product_id").append("<option value="+app_product_id_id+">"+product_name+"</option>");
				}
			}
		});
	}
	
	
	function edit(id){
		//alert(1);
		var app_stock_product_id=id;
		$.ajax({ 
    type: 'GET', 
    url: '{{url("stock_product/edit")}}'+'/'+app_stock_product_id, 
    dataType: 'json',
    success: function (response){ 
				$("#frm-edit #app_stock_id").val(response["app_stock_id"]);
				$("#frm-edit #stock").val(response["stock"]);
				$("#frm-edit #description").val(response["description"]);				
				var app_product_id=response["app_product_id"];
				var raw_material_name=response["name"];
				$("#frm-edit #app_product_id").empty();
				$("#frm-edit #app_product_id").prepend("<option value="+app_product_id+">"+raw_material_name+"</option>");
				renderLookupProduct();
						
				$("#frm-edit #description").val(response["description"]);
				$("#frm-edit #stock").val(response["stock"]);					
				$("#frm-edit #app_product_id").val(response["app_product_id"])					
				$("#modal-edit").modal("toggle");
    }
		});
		
		
		
	}
	
	function deleteData(id){
		var app_stock_id=id;
		$.ajax({ 
    type: 'GET', 
    url: '{{url("stock_product/edit")}}'+'/'+app_stock_id, 
    dataType: 'json',
    success: function (response){ 
				$("#frm-delete #app_stock_id").val(response["app_stock_id"]);
				$("#frm-delete #stock").val(response["stock"]);
				$("#frm-delete #description").val(response["description"]);				
				var app_product_id=response["app_product_id"];
				var raw_material_name=response["name"];
				$("#frm-delete #app_product_id").empty();
				$("#frm-delete #app_product_id").prepend("<option value="+app_product_id+">"+raw_material_name+"</option>");
				renderLookupProduct();
						
				$("#frm-delete #description").val(response["description"]);
				$("#frm-delete #stock").val(response["stock"]);					
				$("#frm-delete #app_product_id").val(response["app_product_id"])					
				$("#modal-delete").modal("toggle");
    }
		});

	}
</script>