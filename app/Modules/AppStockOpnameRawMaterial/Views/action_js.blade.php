<script>
	function scrollToLowewst(){
		//alert(1);
		$('html,body').animate({scrollTop: document.body.scrollHeight},"fast");
	}
	
	function expandData(id){
		var app_stock_opname_raw_material_id=id;
		$.ajax({ 
    type: 'GET', 
		url: '{{url("stock_opname_raw_material/edit")}}'+'/'+app_stock_opname_raw_material_id, 
    dataType: 'json',
    success: function (response){ 
				$("#frm-expand #app_stock_opname_raw_material_id").val(response["app_stock_opname_raw_material_id"]);
				$("#frm-expand #number_stock_opname").val(response["number_stock_opname"]);
				$("#frm-expand #warehouse_supervisor").val(response["warehouse_supervisor"]);	
				$("#modal-expand").modal("toggle");
    }
		});		
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
		var app_stock_opname_raw_material_id=id;
		$.ajax({ 
    type: 'GET', 
		url: '{{url("stock_opname_raw_material/edit")}}'+'/'+app_stock_opname_raw_material_id, 
    dataType: 'json',
    success: function (response){ 
				$("#frm-edit #app_stock_opname_raw_material_id").val(response["app_stock_opname_raw_material_id"]);
				$("#frm-edit #number_stock_opname").val(response["number_stock_opname"]);
				$("#frm-edit #warehouse_supervisor").val(response["warehouse_supervisor"]);				
				
				$("#modal-edit").modal("toggle");
    }
		});		
	}
	
	function detail(id){
		var app_stock_opname_raw_material_id=id;
		var url='{{url("stock_opname_raw_material_detail")}}?'+'app_stock_opname_raw_material_id='+app_stock_opname_raw_material_id;
		location.href = url;
	}
	
	function deleteData(id){
		var app_stock_opname_raw_material_id=id;
		$.ajax({ 
    type: 'GET', 
		url: '{{url("stock_opname_raw_material/edit")}}'+'/'+app_stock_opname_raw_material_id, 
    dataType: 'json',
    success: function (response){ 
				$("#frm-delete #app_stock_opname_raw_material_id").val(response["app_stock_opname_raw_material_id"]);
				$("#frm-delete #number_stock_opname").val(response["number_stock_opname"]);
				$("#frm-delete #warehouse_supervisor").val(response["warehouse_supervisor"]);	
				$("#modal-delete").modal("toggle");
    }
		});		
	}
</script>