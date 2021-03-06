<script>
	function add()
	{
		$("#modal-add").modal("toggle");
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
		var app_purchase_id=id;
		$.ajax({ 
    type: 'GET', 
		url: '{{url("purchase/edit")}}'+'/'+app_purchase_id, 
    dataType: 'json',
    success: function (response){ 
				//start clear data residue from begining operation
				$("#frm-edit #app_purchase_id").val("");
				$("#frm-edit #description").val("");
				//end clear data residue from begining operation
				
				$("#frm-edit #app_purchase_id").val(response["app_purchase_id"]);
				$("#frm-edit #purchase_number").val(response["purchase_number"]);
				$("#frm-edit #description").val(response["description"]);				
				var app_suplier_id=response["app_suplier_id"];
				var suplier_name=response["suplier_name"];
				$("#frm-edit #app_suplier_id").empty();
				$("#frm-edit #app_suplier_id").prepend("<option value="+app_suplier_id+">"+suplier_name+"</option>");
				renderLookupSuplier();				
				$("#modal-edit").modal("toggle");
    }
		});		
	}
	
	function detail(id){
		var app_purchase_id=id;
		var url='{{url("purchase_detail")}}?'+'purchase_id='+app_purchase_id;
		location.href = url;
	}
	
	function expandData(id){
		var app_purchase_id=id;
		$.ajax({ 
    type: 'GET', 
		url: '{{url("purchase/edit")}}'+'/'+app_purchase_id, 
    dataType: 'json',
    success: function (response){ 
				$("#frm-expand #app_purchase_id").val(response["app_purchase_id"]);
				$("#frm-expand #purchase_number").val(response["purchase_number"]);
				$("#frm-expand #description").val(response["description"]);				
				var app_suplier_id=response["app_suplier_id"];
				var suplier_name=response["suplier_name"];
				$("#frm-expand #app_suplier_id").empty();
				$("#frm-expand #app_suplier_id").prepend("<option value="+app_suplier_id+">"+suplier_name+"</option>");
				renderLookupSuplier();				
				$("#modal-expand").modal("toggle");
    }
		});		
	}
	
	function deleteData(id){
		var app_purchase_id=id;
		$.ajax({ 
    type: 'GET', 
		url: '{{url("purchase/edit")}}'+'/'+app_purchase_id, 
    dataType: 'json',
    success: function (response){ 
				$("#frm-delete #app_purchase_id").val(response["app_purchase_id"]);
				$("#frm-delete #purchase_number").val(response["purchase_number"]);
				$("#frm-delete #description").val(response["description"]);				
				var app_suplier_id=response["app_suplier_id"];
				var suplier_name=response["suplier_name"];
				$("#frm-delete #app_suplier_id").empty();
				$("#frm-delete #app_suplier_id").prepend("<option value="+app_suplier_id+">"+suplier_name+"</option>");
				renderLookupSuplier();				
				$("#modal-delete").modal("toggle");
    }
		});		
	}
</script>