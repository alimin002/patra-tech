<script src="{{url('assets/js/jquery.min.js')}}"></script>
<script>
/**
 window.onbeforeunload = function() {
   return "Warning: data purchase item will be lost, are you sure you want to leave? Think of the kittens!";
 }
 **/

 $(function() {
		bindPurchaseItem();
 });
	
	function bindPurchaseItem(){
			 var data_purchase_item=JSON.parse($("#data_purchase_item").val());
			 for(var i=0; i<= data_purchase_item.length-1; i++){
					var app_raw_material_id = data_purchase_item[i].app_raw_material_id;
					var raw_material_name 	= data_purchase_item[i].raw_material_name;
					var unit_price					= data_purchase_item[i].unit_price;
					var qty									= data_purchase_item[i].qty;
					var sub_total						= data_purchase_item[i].sub_total;
				  var tr="<tr>"+
									"<td class='center  sorting_1'>"+
										"<label class='position-relative'>"+
											"<input type='checkbox' class='ace'>"+
											"<span class='lbl'></span>"+
										"</label>"+
									"</td>"+
									"<td class='footable-visible footable-first-column'>"+
										""+raw_material_name+""+
									"</td>"+
									"<td class='footable-visible footable-first-column'>"+
										""+unit_price+""+
									"</td>"+
									"<td  class='footable-visible footable-first-column'>"+
										""+qty+""+
									"</td>"+
									"<td  class='footable-visible footable-first-column'>"+
										""+sub_total+""+
									"</td>"+
									"<td  class=' '>"+
									
										"<div class='hidden-sm hidden-xs action-buttons'>"+
											"<a class='green' href='#'>"+
												"<i class='ace-icon fa fa-pencil bigger-130'></i>"+
											"</a>"+
											"<a class='red' href='#'>"+
												"<i class='ace-icon fa fa-trash-o bigger-130'></i>"+
											"</a>"+
										"</div>"+	
											"<div class='hidden-md hidden-lg'>"+
												"<div class='inline position-relative'>"+
													"<button class='btn btn-minier btn-yellow dropdown-toggle' data-toggle='dropdown' data-position='auto'>"+
														"<i class='ace-icon fa fa-caret-down icon-only bigger-120'></i>"+
													"</button>"+
													"<ul class='dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close'>"+
														"<li>"+
															"<a href='#'  class='tooltip-success' data-rel='tooltip' title='' data-original-title='Edit' >"+
																"<span class='green' >"+
																	"<i class='ace-icon fa fa-pencil-square-o bigger-120'></i>"+
																"</span>"+
															"</a>"+
														"</li>"+
														"<li>"+
															"<a href='#' class='tooltip-error' data-rel='tooltip' title='' data-original-title='Delete'>"+
																"<span class='red'>"+
																	"<i class='ace-icon fa fa-trash-o bigger-120'></i>"+
																"</span>"+
															"</a>"+
														"</li>"+
													"</ul>"+
												"</div>"+
											"</div>"+								
									"</td>"+						
								"</tr>";
								$("#tbody_purchase").append(tr);
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
	
	function doUpdateHeader(){
		$("#modal-edit-header").modal("hide");
		$("#frm-edit-header").submit();
	}
	
	/*
	function getRawMaterialById(select_object){
		alert(select_object.value);
	}
	*/
	
	function getRawMaterialById(select_object){
		var app_raw_material_id=select_object.value;
		$.ajax({ 
    type: 'GET', 
    url: '{{url("raw_material/edit")}}'+'/'+app_raw_material_id, 
    dataType: 'json',
    success: function (response){ 
				$("#frm-create #unit_price").val(response["unit_price"]);
				$("#frm-create #description").val(response["description"]);
    }
		});	
	}
	
	//get sub total when create
	function getSubTotal(){
		var unit_price= $("#frm-create #unit_price").val();
		var qty 			= $("#frm-create #qty").val();
		var sub_total = unit_price * qty;
		$("#frm-create #sub_total").val(sub_total);
	}
	
	//get sub total when edit
	function getSubTotalEdit(){
		var unit_price= $("#frm-edit #unit_price").val();
		var qty 			= $("#frm-edit #qty").val();
		var sub_total = unit_price * qty;
		$("#frm-edit #sub_total").val(sub_total);
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
					$("#frm-edit-header #app_suplier_id").append("<option value="+app_suplier_id+">"+suplier_name+"</option>");
				}
			}
		});
	}
	
	function renderLookupRawMaterial(){
		$.ajax({ 
    type: 'GET', 
    url: '{{url("purchase_detail/render_lookup_raw_material")}}', 
    dataType:'json',
    success: function (response){
				//alert(response);
				for(var i=0; i< response.length -1; i++ ){
					var raw_material_name=response[i]["name"];
					var app_raw_material_id=response[i]["app_raw_material_id"];
					$("#frm-edit #app_raw_material_id").append("<option value="+app_raw_material_id+">"+raw_material_name+"</option>");
				}
			}
		});
	}
	
	function closePopOverPurchaseDate(){
			$("#frm-edit-header #purchase_date").popover("hide");			
	}
	
	function editHeader(id){
		//alert(id);
		var app_purchase_id=id;
		$.ajax({ 
    type: 'GET', 
		url: '{{url("purchase/edit")}}'+'/'+app_purchase_id, 
    dataType: 'json',
			success: function (response){ 
				 //setup popover system
				 $("#frm-edit-header #purchase_date").popover({
						  trigger: 'manual',
							placement: 'auto bottom',
							html: 'true',
							title :'<span class="text-info"><strong>Info</strong></span>'+
                '<button type="button" id="close" class="close" onclick="closePopOverPurchaseDate()">&times;</button>',
							content: function() {
								 var message = "Purchase Date will automaticly updated by system";
								 return message;
							}
					});
					$("#frm-edit-header #purchase_date").popover("show");				
					//$("#frm-edit-header #purchase_date").popover('toggle');
					
					$("#frm-edit-header #app_purchase_id").val(response["app_purchase_id"]);
					$("#frm-edit-header #purchase_number").val(response["purchase_number"]);
					$("#frm-edit-header #purchase_date").val(response["purchase_date"]);
					$("#frm-edit-header #description").val(response["description"]);						
					var app_suplier_id=response["app_suplier_id"];
					var suplier_name=response["suplier_name"];
					$("#frm-edit-header #app_suplier_id").empty();
					$("#frm-edit-header #app_suplier_id").prepend("<option value="+app_suplier_id+">"+suplier_name+"</option>");
					renderLookupSuplier();				
					$("#modal-edit-header").modal("toggle");
			}
		});		
	}
	
	
	function edit(id){
		var app_purchase_detail_id=id;
		$.ajax({ 
    type: 'GET', 
		url: '{{url("purchase_detail/edit")}}'+'/'+app_purchase_detail_id, 
    dataType: 'json',
    success: function (response){ 
				$("#frm-edit #app_purchase_detail_id").val(response["app_purchase_detail_id"]);
				$("#frm-edit #app_raw_material_id").val(response["app_raw_material_id"]);
				$("#frm-edit #qty").val(response["qty"]);	
				$("#frm-edit #sub_total").val(response["sub_total"]);	
				$("#frm-edit #unit_price").val(response["unit_price"]);
				$("#frm-edit #description").val(response["description"]);						
				var app_raw_material_id=response["app_raw_material_id"];
				var raw_material_name=response["raw_material_name"];
				$("#frm-edit #app_raw_material_id").empty();
				$("#frm-edit #app_raw_material_id").prepend("<option value="+app_raw_material_id+">"+raw_material_name+"</option>");
				renderLookupRawMaterial();				
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
			var app_purchase_detail_id=id;
		$.ajax({ 
    type: 'GET', 
		url: '{{url("purchase_detail/edit")}}'+'/'+app_purchase_detail_id, 
    dataType: 'json',
    success: function (response){ 
				$("#frm-delete #app_purchase_detail_id").val(response["app_purchase_detail_id"]);
				$("#frm-delete #app_raw_material_id").val(response["app_raw_material_id"]);
				$("#frm-delete #qty").val(response["qty"]);	
				$("#frm-delete #sub_total").val(response["sub_total"]);	
				$("#frm-delete #unit_price").val(response["unit_price"]);
				$("#frm-delete #description").val(response["description"]);						
				var app_raw_material_id=response["app_raw_material_id"];
				var raw_material_name=response["raw_material_name"];
				$("#frm-delete #app_raw_material_id").empty();
				$("#frm-delete #app_raw_material_id").prepend("<option value="+app_raw_material_id+">"+raw_material_name+"</option>");
				renderLookupRawMaterial();				
				$("#modal-delete").modal("toggle");
    }
		});		
	}
	/*
	var o = new Object();
			o["one"] = 1;
			o["two"] = 2;
			o["three"] = 3;
	*/
	var obj_data_purchase_item_new =[];
	function addToPurchase(){
		
		var app_raw_material_id = $("#frm-create #app_raw_material_id").val();
		var raw_material_name 	= $("#frm-create #app_raw_material_id option:selected").text();
		var unit_price					= $("#frm-create #unit_price").val();
		var qty									= $("#frm-create #qty").val();
		var sub_total						= $("#frm-create #sub_total").val();
		//define new data
		var new_data={ "app_raw_material_id" :app_raw_material_id, "unit_price" : unit_price,"qty": qty,"sub_total":sub_total};
		
			//this block to append new data and prevent double records in database
			
		  obj_data_purchase_item_new.push(new_data);//variabel not assign textarea value
			//alert(JSON.stringify(obj_data_purchase_item_new));
			$("#data_purchase_item_new").val(JSON.stringify(obj_data_purchase_item_new))
			//this block to  append old data with new data in data grid update
			var obj_data_purchase_item		 = JSON.parse($("#data_purchase_item").val());
			obj_data_purchase_item.push(new_data);
		
			$("#data_purchase_item").val(JSON.stringify(obj_data_purchase_item));	//variable assign textarea value		
				 var tr="<tr>"+
									"<td class='center  sorting_1'>"+
										"<label class='position-relative'>"+
											"<input type='checkbox' class='ace'>"+
											"<span class='lbl'></span>"+
										"</label>"+
									"</td>"+
									"<td class='footable-visible footable-first-column'>"+
										""+raw_material_name+""+
									"</td>"+
									"<td class='footable-visible footable-first-column'>"+
										""+unit_price+""+
									"</td>"+
									"<td  class='footable-visible footable-first-column'>"+
										""+qty+""+
									"</td>"+
									"<td  class='footable-visible footable-first-column'>"+
										""+sub_total+""+
									"</td>"+
									"<td  class=' '>"+
									
										"<div class='hidden-sm hidden-xs action-buttons'>"+
											"<a class='green' href='#'>"+
												"<i class='ace-icon fa fa-pencil bigger-130'></i>"+
											"</a>"+
											"<a class='red' href='#'>"+
												"<i class='ace-icon fa fa-trash-o bigger-130'></i>"+
											"</a>"+
										"</div>"+	
											"<div class='hidden-md hidden-lg'>"+
												"<div class='inline position-relative'>"+
													"<button class='btn btn-minier btn-yellow dropdown-toggle' data-toggle='dropdown' data-position='auto'>"+
														"<i class='ace-icon fa fa-caret-down icon-only bigger-120'></i>"+
													"</button>"+
													"<ul class='dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close'>"+
														"<li>"+
															"<a href='#'  class='tooltip-success' data-rel='tooltip' title='' data-original-title='Edit' >"+
																"<span class='green' >"+
																	"<i class='ace-icon fa fa-pencil-square-o bigger-120'></i>"+
																"</span>"+
															"</a>"+
														"</li>"+
														"<li>"+
															"<a href='#' class='tooltip-error' data-rel='tooltip' title='' data-original-title='Delete'>"+
																"<span class='red'>"+
																	"<i class='ace-icon fa fa-trash-o bigger-120'></i>"+
																"</span>"+
															"</a>"+
														"</li>"+
													"</ul>"+
												"</div>"+
											"</div>"+								
									"</td>"+						
								"</tr>";
		$("#tbody_purchase").append(tr)
		$("#modal-add").modal("hide");
	}
	
	function editItem(row_id){
		//alert(row_id.replace("row-",""));
		$("#modal-edit").modal("toggle");
	}
	
	function doPurchaseRawMaterial(){
		$("#frm-purchase-item").submit();
	}
	
</script>