<script>
	function add()
	{
		$("#modal-add").modal("toggle");
		$("#frm-create #name").val("");
		$("#frm-create #unit").val("");
		$("#frm-create #unit_price").val("");
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
    url: '{{url("product/render_lookup_category")}}', 
    dataType: 'json',
    success: function (response){
			
				for(var i=0; i< response.length; i++ ){
					var category_name=response[i]["name"];
					var app_category_id=response[i]["app_category_id"];
					$("#frm-edit #app_category_id").append("<option value="+app_category_id+">"+category_name+"</option>");
				}
			}
		});
	}
	
	function edit(id){
		var app_product_id=id;
		$.ajax({ 
    type: 'GET', 
    url: "{{url('product/edit')}}"+"/"+app_product_id, 
    dataType: 'json',
    success: function (response){ 
        //alert(response["product_name"]);
				$("#frm-edit #name").val(response["product_name"]);
				$("#frm-edit #unit").val(response["unit"]);
				$("#frm-edit #unit_price").val(response["unit_price"]);
				
				var app_category_product_id=response["app_category_id"];
				var category_name								=response["category_name"];
				$("#frm-edit #app_category_id").empty();
				$("#frm-edit #app_category_id").prepend("<option value= "+ app_category_product_id +">"+category_name+"</option>");
				renderlookupCategory();
				
				$("#frm-edit #description").val(response["description"]);
				$("#frm-edit #stock").val(response["stock"]+' '+response["unit"]);					
				$("#frm-edit #app_product_id").val(response["app_product_id"])					
				$("#modal-edit").modal("toggle");
    }
		});
		
		
		
	}
	
	function deleteData(id){
		var app_product_id=id;
		$.ajax({ 
    type: 'GET', 
    url: '{{url("product/edit")}}'+'/'+app_product_id, 
    dataType: 'json',
    success: function (response){ 
				$("#frm-delete #name").val(response["product_name"]);
				$("#frm-delete #unit").val(response["unit"]);
				$("#frm-delete #unit_price").val(response["unit_price"]);
				
				var app_category_product_id=response["app_category_id"];
				var category_name								=response["category_name"];
				$("#frm-delete #app_category_id").empty();
				$("#frm-delete #app_category_id").prepend("<option value= "+ app_category_product_id +">"+category_name+"</option>");
				renderlookupCategory();
				
				$("#frm-delete #description").val(response["description"]);
				$("#frm-delete #stock").val(response["stock"]+' '+response["unit"]);					
				$("#frm-delete #app_product_id").val(response["app_product_id"])		
				$("#modal-delete").modal("toggle");
    }
		});

	}

</script>