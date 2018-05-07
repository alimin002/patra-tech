<script src="{{url('assets/js/jquery.min.js')}}"></script>
<script>
		function doApprovePrediction(){
		    var json_prediction = $("#data_sales_item").val();
				var object_prediction= JSON.parse(json_prediction);
				//var data_composition = JSON.parse(object_prediction[0]["data_composition"]);
				//$("#data_composition").val(JSON.stringify(data_composition));
				var obj_data_composition   = data_composition;
				var array_data_composition = [];
				for(var i=0; i<= object_prediction.length-1; i++){
					 array_data_composition[i]=JSON.parse(object_prediction[i]["data_composition"]);
					 //alert(array_data_composition[i]);
				}
				$("#data_composition").val(JSON.stringify(array_data_composition));
				$("#frm-approve-prediction").submit();
				//alert(JSON.stringify(data_composition));
				//alert(JSON.stringify(JSON.parse(object_prediction[0]["data_composition"])));
		}

		 $(function(){
			 	//alert(1);
				bindSalesItem();
			});
		
		function getRawMaterialById(app_raw_material_id){
			var httpRequest=$.ajax({ 
			type: 'GET', 
			async:false,
			url: '{{url("raw_material/edit")}}'+'/'+app_raw_material_id, 
			dataType: 'json',
			success: function (response){
				//alert(response);
				//return response;
				
			}
			});	
			//httpRequest.responseText;
			//alert(httpRequest.responseText);
			return JSON.parse(httpRequest.responseText);
		}
				
		function renderRawMaterialNameObjectComposition(obj_composition,qty){
			var string_name="";
			
				var section_head="<table >"+
														"<thead>"+
															"<tr>"+
																"<th>"+
																	"<i class='fa fa-truck' aria-hidden='true'></i>&nbsp;Raw material"+
																"</th>"+
																"<th style='margin-left:10px;'>"+
																	"<i class='fa fa-calculator' aria-hidden='true'></i>&nbsp;Total Amount"+
																"</th>"+
															"</tr>"+
														"</thead>"+
														"<tbody>";	
														
					 var section_foot="</tbody>"+
				                  "</table>";
					 var row_resources ="";
			for(var i=0; i<= obj_composition.length-1; i++){
				
				
				var raw_material_name = getRawMaterialById(obj_composition[i].app_raw_material_id).raw_name
				var raw_material_total_amount = qty * parseFloat(obj_composition[i].amount);
				
					row_resources=row_resources+"<tr>"+
																"<td style='margin-left:10px;'>"+
																	raw_material_name+
																"</td>"+
																"<td style='text-align:center;'>"+
																	raw_material_total_amount.toFixed(2)+
																"</td>"+
															"</tr>";
			}
			var html_resources="";
			html_resources=section_head+row_resources+section_foot;
			return html_resources;
		}
		
		function bindSalesItem(){
			//alert(1);
			 //clear grid data to prevent double record
			 $("#tbody_sales").empty();
			 var data_sales_item=JSON.parse($("#data_sales_item").val());
			 for(var i=0; i<= data_sales_item.length-1; i++){
					var app_product_id = data_sales_item[i].app_product_id;
					var product_name 	= data_sales_item[i].product_name;
					var unit_price					= data_sales_item[i].unit_price;
					var qty									= data_sales_item[i].qty;
					var sub_total						= data_sales_item[i].sub_total;
					var data_composition				= data_sales_item[i].data_composition;
					var obj_composition=JSON.parse(data_composition);
					var string_name;
					if(data_composition != null){
						//parameter qty used to get total amount off raw material
						string_name = renderRawMaterialNameObjectComposition(obj_composition,data_sales_item[i].qty);
					}
				  var tr="<tr id=tr-"+i+">"+								
									"<td class=' '>"+
										""+product_name+""+
									"</td>"+
									"<td class=' '>"+
										""+unit_price+""+
									"</td>"+
									"<td  class=' '>"+
										""+qty+""+
									"</td>"+
									"<td  id=row-composition"+i+" class=' '>"+
										""+string_name+
									"</td>"+													
								"</tr>";
								$("#tbody_sales").append(tr);
								string_name="";
			 }
				
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