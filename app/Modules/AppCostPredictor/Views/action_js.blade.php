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
	
		function renderLookupRawMaterial(row_id){
		$.ajax({ 
    type: 'GET', 
    url: '{{url("purchase_detail/render_lookup_raw_material")}}', 
    dataType:'json',
    success: function (response){
				//alert(response);
				for(var i=0; i< response.length -1; i++ ){
					var raw_material_name=response[i]["name"];
					var app_raw_material_id=response[i]["app_raw_material_id"];
					$("#app_raw_material_id_"+row_id).append("<option value="+app_raw_material_id+">"+raw_material_name+"</option>");
				}
			}
		});
	}
	
	var num=0;
	function add_raw(){
		num ++;
		num_string= "'"+num+"'";
			 var html="<div class='col-sm-12' style='border:1px solid red;'>"+	
										"<div class='col-sm-4'>"+	
											"<div class='form-group'>"+	
												"<label>Raw Material&nbsp;"+num+"</label>"+	
													"<select required='' id="+"'app_raw_material_id_"+num+"'"+" name="+"'app_raw_material_id_"+num+"'"+" class='form-control' onchange=getRawMaterialById(this,"+num_string+")>"+
														"<option>"+ 
															"Choose Raw Material"+	
														"</option>"+
													"</select>"+	
												"</div>"+
											"</div>"+	
											"<div class='col-sm-4'>"+
												"<div class='form-group'>"+	
													"<label>Unit Price</label>"+
													"<input type='text'  placeholder='' value='' id='unit_price_"+num+"' name='unit_price_"+num+"' required='' class='form-control'>"+	
												"</div>"+
											"</div>"+
												"<div class='col-sm-4'>"+
												"<div class='form-group'>"+	
													"<label>Unit</label>"+
													"<input type='text'  placeholder='' id='unit_"+num+"' name='unit_"+num+"' value='' required='' class='form-control'>"+	
												"</div>"+
											"</div>"+
										"</div>"+										
									"</div>";
									renderLookupRawMaterial(num);
			$("#main-body").append(html);
				
		}
	

	function getRawMaterialById(select_object,row_id){
		//alert(select_object.value);
		alert(select_object.value);
		var app_raw_material_id=select_object.value;
		$.ajax({ 
    type: 'GET', 
    url: '{{url("raw_material/edit")}}'+'/'+app_raw_material_id, 
    dataType: 'json',
    success: function (response){
				//bind in form create
				$("#frm-create #unit_price_"+row_id).val(response["unit_price"]);
				$("#frm-create #unit_"+row_id).val(response["unit"]);
				//get sub total edit
				getSubTotalEdit();
    }
		});	
	}
	
</script>