<script>
	function doSave(){
		$("#modal-add").modal("hide");
		$("#frm-create").submit();
	}
	
		function edit(id){
		var app_suplier_id=id;
		//alert(app_suplier_id);
		$.ajax({ 
    type: 'GET', 
    url: '{{url("suplier/edit")}}'+'/'+app_suplier_id, 
    dataType: 'json',
			success: function (response){ 
					$("#frm-edit #name").val(response["name"]);
					$("#frm-edit #addres").val(response["addres"]);
					$("#frm-edit #telephone_number").val(response["telephone_number"]);
					$("#frm-edit #app_suplier_id").val(response["app_suplier_id"]);
					$("#modal-edit").modal("toggle");
			}
		});		
	}
	
	function doUpdate(){
		$("#modal-edit").modal("hide");
		$("#frm-edit").submit();
	}
	
	function deleteData(id){
		var app_suplier_id=id;
		$.ajax({ 
    type: 'GET', 
     url: '{{url("suplier/edit")}}'+'/'+app_suplier_id, 
    dataType: 'json',
    success: function (response){ 
				  $("#frm-delete #name").val(response["name"]);
					$("#frm-delete #addres").val(response["addres"]);
					$("#frm-delete #telephone_number").val(response["telephone_number"]);
					$("#frm-delete #app_suplier_id").val(response["app_suplier_id"]);
					$("#modal-delete").modal("toggle");
    }
		});
	}
	function doDelete(){
		$("#modal-delete").modal("hide");
		$("#frm-delete").submit();
	}
	
</script>