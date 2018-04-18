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
	
	function renderlookupSuplier(){
		$.ajax({ 
    type: 'GET', 
    url: '{{url("raw_material/render_lookup_suplier")}}', 
    dataType: 'json',
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
	
	function renderlookupCategory(){
		$.ajax({ 
    type: 'GET', 
    url: '{{url("raw_material/render_lookup_category")}}', 
    dataType: 'json',
    success: function (response){
				//alert(response);
				for(var i=0; i< response.length -1; i++ ){
					var category_name=response[i]["name"];
					var app_category_raw_material_id=response[i]["app_category_raw_material_id"];
					$("#frm-edit #app_category_raw_material_id").append("<option value="+app_category_raw_material_id+">"+category_name+"</option>");
				}
			}
		});
	}
	
	function edit(id){
		//alert(1);
		var app_return_purchase_id=id;
		$.ajax({ 
    type: 'GET', 
    url: '{{url("return_purchase/edit")}}'+'/'+app_return_purchase_id, 
    dataType: 'json',
    success: function (response){ 
        //alert(JSON.stringify(response));
				$("#frm-edit #return_purchase_number").val(response["return_purchase_number"]);
				$("#frm-edit #unit_price").val(response["unit_price"]);
				
				var app_suplier_id=response["app_suplier_id"];
				var suplier_name=response["suplier_name"];
				$("#frm-edit #app_suplier_id").empty();
				$("#frm-edit #app_suplier_id").prepend("<option value="+app_suplier_id+">"+suplier_name+"</option>");
				renderlookupSuplier();
				
				
				$("#frm-edit #invoice_number").val(response["invoice_number"]);
				$("#frm-edit #return_reason").val(response["return_reason"]);					
				$("#frm-edit #app_return_purchase_id").val(response["app_return_purchase_id"])					
				$("#modal-edit").modal("toggle");
    }
		});
		
		
		
	}
	
	function deleteData(id){
			var app_return_purchase_id=id;
		$.ajax({ 
    type: 'GET', 
    url: '{{url("return_purchase/edit")}}'+'/'+app_return_purchase_id, 
    dataType: 'json',
    success: function (response){ 
        //alert(JSON.stringify(response));
				$("#frm-delete #return_purchase_number").val(response["return_purchase_number"]);
				$("#frm-delete #unit_price").val(response["unit_price"]);
				
				var app_suplier_id=response["app_suplier_id"];
				var suplier_name=response["suplier_name"];
				$("#frm-delete #app_suplier_id").empty();
				$("#frm-delete #app_suplier_id").prepend("<option value="+app_suplier_id+">"+suplier_name+"</option>");
				renderlookupSuplier();
				
				
				$("#frm-delete #invoice_number").val(response["invoice_number"]);
				$("#frm-delete #return_reason").val(response["return_reason"]);					
				$("#frm-delete #app_return_purchase_id").val(response["app_return_purchase_id"])					
				$("#modal-delete").modal("toggle");
    }
		});
		
		

	}
</script>