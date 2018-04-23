
<script src="{{url('assets/js/jquery.min.js')}}"></script>
<script>
	//bind data composition	
	function productComposition(json_composition){		
			//alert(json_composition);
			var obj_composition=JSON.parse(json_composition);
			
			var section_head="<table >"+
														"<thead>"+
															"<tr>"+
																"<th>"+
																	"<i class='fa fa-truck' aria-hidden='true'></i>&nbsp;Raw material"+
																"</th>"+
																"<th style='margin-left:10px;'>"+
																	"<i class='fa fa-balance-scale' aria-hidden='true'></i>&nbsp;Amount"+
																"</th>"+
															"</tr>"+
														"</thead>"+
														"<tbody>";	
			var row_composition="";														
			for(var i=0; i<= obj_composition.length-1; i++){
				var app_raw_material_id=obj_composition[i]["app_raw_material_id"];
				var raw_material=getRawMaterialByIdInEdit(app_raw_material_id);
				row_composition=row_composition+"<tr>"+
																"<td style='margin-left:10px;'>"+
																	raw_material.raw_name+
																"</td>"+
																"<td>"+
																	obj_composition[i]["amount"]+"&nbsp;"+raw_material.unit+
																"</td>"+
															"</tr>";
			}
			var section_foot="</tbody></table>";
			
			var html_composition=section_head+row_composition+section_foot;
			//alert(html_composition);
			//document.write(html_composition);
			return html_composition;
	}
	$(document).ready(function() {
		for(var i=0; i<= $(".col-composition").length-1; i++ ){
			var json_composition=$(".col-composition:eq("+i+") input").val();
			var composition = productComposition(json_composition);	
			//alert(composition);
			$(".col-composition:eq("+i+")").append(composition);
		}
	
	});
	//bindProductComposition();
	function doSave(){
		array_composition=[];
		//$("#product_composition").val(JSON.stringify(array_composition));
		for(var i=0; i<= num-1; i++){
			var app_raw_material_id=$("#frm-create .col-raw-material:eq("+i+") div select").val();
			var unit_price 				 =$("#frm-create .col-unit-price:eq("+i+") div input").val();
			var unit							 =$("#frm-create .col-unit:eq("+i+") div input").val();
			var amount						 =$("#frm-create .col-amount:eq("+i+") div input").val();
			
			json_composition	 ={"app_raw_material_id":app_raw_material_id,"amount":amount};
			array_composition[i]=json_composition;
		}
		$("#frm-create #product_composition").val(JSON.stringify(array_composition));
		//alert(JSON.stringify(array_composition));
		$("#frm-create").submit();
	}
	
	function doDelete(){
		$("#modal-delete").modal("hide");
		$("#frm-delete").submit();
	}
	
	function doUpdate(){
		array_composition=[];
		//alert( $('.main-cover').length);
		for(var i=0; i<= $('.main-cover').length-1; i++){
			var app_raw_material_id=$("#frm-edit .col-raw-material:eq("+i+") div select").val();
			var unit_price 				 =$("#frm-edit .col-unit-price:eq("+i+") div input").val();
			var unit							 =$("#frm-edit .col-unit:eq("+i+") div input").val();
			var amount						 =$("#frm-edit .col-amount:eq("+i+") div input").val();
			
			json_composition	 ={"app_raw_material_id":app_raw_material_id,"amount":amount};
			array_composition[i]=json_composition;
		}
		$("#frm-edit #product_composition").val(JSON.stringify(array_composition));
		$("#modal-edit").modal("hide");
		$("#frm-edit").submit();
	}
	
	function renderLookupSuplier(){
		//ajax for header
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
	
	function getComposition(id){
		var app_composition_id=id;
		//alert(app_composition_id);
		var httpRequest=$.ajax({ 
    type: 'GET', 
		async:false,
		url: '{{url("cost_predictor/edit")}}'+'/'+app_composition_id, 
    dataType: 'json',
    success: function (response){ 
			//alert(response.data_composition);
    }
		});	
		//alert(httpRequest.responseText);
		var data= JSON.parse(httpRequest.responseText);	
    var obj_composition = JSON.parse(data.data_composition);
		//alert(obj_composition[0].app_raw_material_id);
		return obj_composition;
	}
	
	function addComposition(){
		$("#frm-create #main-body").empty();
		$("#modal-add").modal("toggle");
	}
	
	function edit(id,app_product_composition_id){
		//alert(app_product_composition_id);
		var app_product_id=id;
		alert(app_product_id);
		$.ajax({ 
    type: 'GET', 
		url: '{{url("product/edit")}}'+'/'+app_product_id, 
    dataType: 'json',
    success: function (response){ 
				//alert(response.product_name);
				$("#frm-edit #app_product_id").empty();
				var obj_composition = getComposition(app_product_composition_id);
				//alert(JSON.stringify(obj_composition));
				var super_html="";
				$("#frm-edit #main-body").empty();
				for (var i =0; i<=obj_composition.length-1; i++){
				 var i_string= "'"+i+"'";
				 var html="<div class='col-sm-12 main-cover' id='main-cover-"+i+"' style='border:1px solid white;'>"+	
										"<div class='col-sm-3 col-raw-material'>"+	
											"<div class='form-group'>"+
												"<label>Raw Material&nbsp;"+"&nbsp;"+"</label>"+	
													"<select required='' id="+"'app_raw_material_id_"+i+"'"+" name="+"'app_raw_material_id_"+i+"'"+" class='form-control' onchange=getRawMaterialById2(this,"+i_string+")>"+														
													"</select>"+	
												"</div>"+
											"</div>"+	
											"<div class='col-sm-2 col-unit-price'>"+
												"<div class='form-group'>"+	
													"<label>Unit Price</label>"+
													"<input type='text' readonly='readonly'  placeholder='' value='' id='unit_price_"+i+"' name='unit_price_"+i+"' required='' class='form-control'>"+	
												"</div>"+
											"</div>"+
												"<div class='col-sm-3 col-unit'>"+
												"<div class='form-group'>"+	
													"<label>Unit</label>"+
													"<input type='text' readonly='readonly'  placeholder='' id='unit_"+i+"' name='unit_"+i+"' value='' required='' class='form-control'>"+	
												"</div>"+
											"</div>"+
											"<div class='col-sm-2 col-amount'>"+
												"<div class='form-group'>"+	
													"<label>Amount</label>"+
													"<input type='text' placeholder='' id='amount_"+i+"' name='amount_"+i+"' onchange=addDataToJson("+i_string+",this) value='' required='' class='form-control'>"+	
												"</div>"+
											"</div>"+
											"<div class='col-sm-2'>"+
												"<div class='form-group'>"+	
													"<label>&nbsp;</label>"+
													"<button type='button' class='form-control fa fa-trash' onclick=removeRowEdit("+i_string+")></button>"+	
												"</div>"+
											"</div>"+
										"</div>"+										
									"</div>";
									$("#main-body").append(html);
									$("#amount_"+i).val(obj_composition[i].amount);
									
									var app_raw_material_id=obj_composition[i].app_raw_material_id;
									var obj_raw_material = getRawMaterialByIdInEdit(app_raw_material_id);
									
									
									//alert(JSON.stringify(obj_raw_material));
									$("#unit_price_"+i).val(obj_raw_material.unit_price);
									$("#unit_"+i).val(obj_raw_material.unit);
									$("#app_raw_material_id_"+i).prepend("<option value="+app_raw_material_id+">"+obj_raw_material.raw_name+"</option>");
									renderLookupRawMaterialEdit(i);

				 }						
				$("#frm-edit #app_product_id").prepend("<option value="+app_product_id+">"+response.name+"</option>");
				$("#frm-edit #product_composition").val(obj_composition.app_raw_material_id);
				//$("#main-body").append(super_html);
				renderLookupProduct();
				$("#frm-edit #app_product_composition_id").val(app_product_composition_id);
				$("#modal-edit").modal("toggle");
    }
		});		
	}
	
	function detail(id){
		var app_sales_id=id;
		var url='{{url("sales_detail")}}?'+'sales_id='+app_sales_id;
		location.href = url;
	}
	function test(){
		$("#modal-edit").modal("toggle");
		
	}
	
	
	function deleteData(id){
		var app_product_composition_id=id;
		$.ajax({ 
    type: 'GET', 
		url: '{{url("cost_predictor/edit")}}'+'/'+app_product_composition_id, 
    dataType: 'json',
    success: function (response){ 
				$("#frm-delete #app_product_composition_id").val(response["app_product_composition_id"]);
				$("#frm-delete #product_name").val(response["product_name"]);				
				$("#modal-delete").modal("toggle");
    }
		});		
	}
	
		function renderLookupProduct(){
		$.ajax({ 
    type: 'GET', 
    url: '{{url("sales_detail/render_lookup_product")}}', 
    dataType:'json',
    success: function (response){
				//alert(response);
				for(var i=0; i< response.length -1; i++ ){
					var product_name=response[i]["name"];
					var app_product_id=response[i]["app_product_id"];
					$("#frm-edit #app_product_id").append("<option value="+app_product_id+">"+product_name+"</option>");
				}
			}
		});
	}
	
		//render lookup when create
		function renderLookupRawMaterial(row_id){
		$.ajax({ 
    type: 'GET', 
    url: '{{url("purchase_detail/render_lookup_raw_material")}}', 
    dataType:'json',
    success: function (response){
				for(var i=0; i< response.length; i++ ){
					//alert(response[i].name);
					var raw_material_name=response[i]["name"];
					var app_raw_material_id=response[i]["app_raw_material_id"];
					$("#frm-create #app_raw_material_id_"+row_id).append("<option value="+app_raw_material_id+">"+raw_material_name+"</option>");
				}
			}
		});
	}
	
	//render lookup when create
		function renderLookupRawMaterialEdit(row_id){
		$.ajax({ 
    type: 'GET', 
    url: '{{url("purchase_detail/render_lookup_raw_material")}}', 
    dataType:'json',
    success: function (response){
				//alert(response);
				for(var i=0; i< response.length; i++ ){
					var raw_material_name=response[i]["name"];
					var app_raw_material_id=response[i]["app_raw_material_id"];
					$("#frm-edit #app_raw_material_id_"+row_id).append("<option value="+app_raw_material_id+">"+raw_material_name+"</option>");
				}
			}
		});
	}
	
	var num=0;
	var array_composition=[];
	
	//create mode
	function add_raw(){
		num ++;
		//var json_composition={"app_raw_material_id":}
		//array_composition[]
		num_string= "'"+num+"'";
			 var html="<div class='col-sm-12' id='main-cover-"+num+"' style='border:1px solid white;'>"+	
										"<div class='col-sm-3 col-raw-material'>"+	
											"<div class='form-group'>"+
												"<label>Raw Material&nbsp;"+"&nbsp;"+"</label>"+	
													"<select required='' id="+"'app_raw_material_id_"+num+"'"+" name="+"'app_raw_material_id_"+num+"'"+" class='form-control' onchange=getRawMaterialById(this,"+num_string+")>"+
														"<option>"+ 
															"Choose Raw Material"+	
														"</option>"+
													"</select>"+	
												"</div>"+
											"</div>"+	
											"<div class='col-sm-2 col-unit-price'>"+
												"<div class='form-group'>"+	
													"<label>Unit Price</label>"+
													"<input type='text' readonly='readonly'  placeholder='' value='' id='unit_price_"+num+"' name='unit_price_"+num+"' required='' class='form-control'>"+	
												"</div>"+
											"</div>"+
												"<div class='col-sm-3 col-unit'>"+
												"<div class='form-group'>"+	
													"<label>Unit</label>"+
													"<input type='text' readonly='readonly'  placeholder='' id='unit_"+num+"' name='unit_"+num+"' value='' required='' class='form-control'>"+	
												"</div>"+
											"</div>"+
											"<div class='col-sm-2 col-amount'>"+
												"<div class='form-group'>"+	
													"<label>Amount</label>"+
													"<input type='text' placeholder='' id='amount_"+num+"' name='amount_"+num+"' onchange=addDataToJson("+num_string+",this) value='' required='' class='form-control'>"+	
												"</div>"+
											"</div>"+
											"<div class='col-sm-2'>"+
												"<div class='form-group'>"+	
													"<label>&nbsp;</label>"+
													"<button type='button' class='form-control fa fa-trash' onclick=removeRow("+num_string+")></button>"+	
												"</div>"+
											"</div>"+
										"</div>"+										
									"</div>";
									
								
									/**
									var html="<table>"+
									          "<tr>"+
															 "<td>"+
															 "</td>"+
														"</tr>"+
														"</table>"+
									***/						
									renderLookupRawMaterial(num);
			$("#frm-create #main-body").append(html);
				
		}
		
		//create mode
	function add_raw_edit(){
		num ++;
		//var json_composition={"app_raw_material_id":}
		//array_composition[]
		num_string= "'"+num+"'";
			 var html="<div class='col-sm-12 main-cover' id='main-cover-"+num+"' style='border:1px solid red;'>"+	
										"<div class='col-sm-3 col-raw-material'>"+	
											"<div class='form-group'>"+
												"<label>Raw Material&nbsp;</label>"+	
													"<select required='' id="+"'app_raw_material_id_"+num+"'"+" name="+"'app_raw_material_id_"+num+"'"+" class='form-control' onchange=getRawMaterialById2(this,"+num_string+")>"+
														"<option>"+ 
															"Choose Raw Material"+	
														"</option>"+
													"</select>"+	
												"</div>"+
											"</div>"+	
											"<div class='col-sm-2 col-unit-price'>"+
												"<div class='form-group'>"+	
													"<label>Unit Price</label>"+
													"<input type='text' readonly='readonly'  placeholder='' value='' id='unit_price_"+num+"' name='unit_price_"+num+"' required='' class='form-control'>"+	
												"</div>"+
											"</div>"+
												"<div class='col-sm-3 col-unit'>"+
												"<div class='form-group'>"+	
													"<label>Unit</label>"+
													"<input type='text' readonly='readonly'  placeholder='' id='unit_"+num+"' name='unit_"+num+"' value='' required='' class='form-control'>"+	
												"</div>"+
											"</div>"+
											"<div class='col-sm-2 col-amount'>"+
												"<div class='form-group'>"+	
													"<label>Amount</label>"+
													"<input type='text' placeholder='' id='amount_"+num+"' name='amount_"+num+"' onchange=addDataToJson("+num_string+",this) value='' required='' class='form-control'>"+	
												"</div>"+
											"</div>"+
											"<div class='col-sm-2'>"+
												"<div class='form-group'>"+	
													"<label>&nbsp;</label>"+
													"<button type='button' class='form-control fa fa-trash' onclick=removeRowEdit("+num_string+")></button>"+	
												"</div>"+
											"</div>"+
										"</div>"+										
									"</div>";
									
								
									/**
									var html="<table>"+
									          "<tr>"+
															 "<td>"+
															 "</td>"+
														"</tr>"+
														"</table>"+
									***/						
									//renderLookupRawMaterial(num);
									renderLookupRawMaterialEdit(num);
			$("#main-body").append(html);
				
		}
		
	function addDataToJson(data,object){
		//alert(data.id);
		//alert(object.id)
		var num_row_id=object.id.replace("amount_","");
		//alert(num_row_id);
		var app_raw_material_id=$("#app_raw_material_id_"+num_row_id).val();
		var amount						 =$("#amount_"+num_row_id).val();
		var json_composition={};
		json_composition={"app_raw_material_id":app_raw_material_id,"amount":amount};
				/**
				if($("#amount_"+num_row_id).val() != ""){
				var start_index =num_row_id;//target update row
				var number_of_elements_to_remove = 0;
				array_composition.splice(start_index, number_of_elements_to_remove);
				alert(JSON.stringify(array_composition));
				}
				**/
				array_composition.push(json_composition);		
	}
	
  function removeRow(row_id){
		//alert(row_id)
		$("#frm-create #main-cover-"+row_id).remove();
		num --;
	}
	 function removeRowEdit(row_id){
		//alert(row_id)
		$("#frm-edit #main-cover-"+row_id).remove();
		//num --;
	}
	
	//get data to content
	function getRawMaterialByIdInEdit(app_raw_material_id){
		var app_raw_material_id=app_raw_material_id;
		var httpRequest = $.ajax({ 
    type: 'GET', 
		async:false,
    url: '{{url("raw_material/edit")}}'+'/'+app_raw_material_id, 
    dataType: 'json',
    success: function (response){
			//alert(response);
    }
		});
		return JSON.parse(httpRequest.responseText);
		//alert(httpRequest.responseText);
	}
	
	function getRawMaterialById(select_object,row_id){
		var app_raw_material_id=select_object.value;
		$.ajax({ 
    type: 'GET', 
    url: '{{url("raw_material/edit")}}'+'/'+app_raw_material_id, 
    dataType: 'json',
    success: function (response){
				$("#frm-create #unit_price_"+row_id).val(response["unit_price"]);
				$("#frm-create #unit_"+row_id).val(response["unit"]);
				//get sub total edit
				getSubTotalEdit();
    }
		});	
	}
		
		//triger onchange when edit
		function getRawMaterialById2(select_object,row_id){
		var app_raw_material_id=select_object.value;
		$.ajax({ 
    type: 'GET', 
    url: '{{url("raw_material/edit")}}'+'/'+app_raw_material_id, 
    dataType: 'json',
    success: function (response){
				$("#frm-edit #unit_price_"+row_id).val(response["unit_price"]);
				$("#frm-edit #unit_"+row_id).val(response["unit"]);
				//get sub total edit
				getSubTotalEdit();
    }
		});	
	}
	
</script>