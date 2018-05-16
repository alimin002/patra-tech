<script src="{{url('assets/js/jquery.min.js')}}"></script>
<script>
/**
 window.onbeforeunload = function() {
   return "Warning: data purchase item will be lost, are you sure you want to leave? Think of the kittens!";
 }
 **/
	
 $(function(){
		bindStockOpnameItem();
 });
	
	function closePopOverReturnPurchaseDate(){
		$("#frm-edit-header #return_date").popover("hide");			
	}
	
	function bindStockOpnameItem(){
			 //clear grid data to prevent double record
			 $("#tbody_stock_opname").empty();
			 var data_stock_opname_item=JSON.parse($("#data_stock_opname_item").val());
			 for(var i=0; i<= data_stock_opname_item.length-1; i++){
					var app_raw_material_id = data_stock_opname_item[i].app_raw_material_id;
					var raw_material_name 	= data_stock_opname_item[i].raw_material_name;
					var stock								= data_stock_opname_item[i].stock;
					var stock_opname				= data_stock_opname_item[i].stock_opname;
					var deviation						= data_stock_opname_item[i].deviation;
				  var tr="<tr id=tr-"+i+">"+								
									"<td class='footable-visible footable-first-column'>"+
										""+raw_material_name+""+
									"</td>"+
									"<td class='footable-visible footable-first-column'>"+
										""+stock+""+
									"</td>"+
									"<td  class='footable-visible footable-first-column'>"+
										""+stock_opname+""+
									"</td>"+
									"<td  class='hidden-480'>"+
										""+deviation+""+
									"</td>"+
									"<td  class=' '>"+
									
										"<div class='hidden-sm hidden-xs action-buttons'>"+
											"<a class='green' href='#'>"+
												"<i class='ace-icon fa fa-pencil bigger-130' id=row-"+i+" class='btn btn-primary' onclick='editItem(this.id,"+app_raw_material_id+")'></i>"+
											"</a>"+
											"<a class='red' href='#'>"+
												"<i class='ace-icon fa fa-trash-o bigger-130' id=row-"+i+" onclick='deleteItem(this.id,"+app_raw_material_id+")'></i>"+
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
																	"<i class='fa fa-expand' id=row-"+i+" class='btn btn-primary' onclick='editItem(this.id)'></i>"+
																"</span>"+
															"</a>"+
														"</li>"+
														"<li>"+
															"<a href='#'  class='tooltip-success' data-rel='tooltip' title='' data-original-title='Edit' >"+
																"<span class='green' >"+
																	"<i class='ace-icon fa fa-pencil-square-o bigger-120' id=row-"+i+" class='btn btn-primary' onclick='editItem(this.id)'></i>"+
																"</span>"+
															"</a>"+
														"</li>"+
														"<li>"+
															"<a href='#' class='tooltip-error' id=row-"+i+" data-rel='tooltip' title='' onclick='deleteItem(this.id,"+app_raw_material_id+")' data-original-title='Delete'>"+
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
								$("#tbody_stock_opname").append(tr);
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
	
	function doStockOpname(){
		$("#frm-stock-opname-item").submit();
	}
	
	function getRawMaterialById(select_object){
		//alert(select_object.value);
		var app_raw_material_id=select_object.value;
		$.ajax({ 
    type: 'GET', 
    url: '{{url("raw_material/edit")}}'+'/'+app_raw_material_id, 
    dataType: 'json',
    success: function (response){
				//bind in form create
				$("#frm-create #stock").val(response["stock"]);
    }
		});	
	}
	
	function getRawMaterialByIdEdit(select_object){
		//alert(select_object.value);
		var app_raw_material_id=select_object.value;
		$.ajax({ 
    type: 'GET', 
    url: '{{url("raw_material/edit")}}'+'/'+app_raw_material_id, 
    dataType: 'json',
    success: function (response){
				//bind in form create
				$("#frm-edit #stock").val(response["stock"]);
    }
		});	
	}
	
	function getDeviation(object){
		//alert(object.value)
		var available_stock=object.value;
		var stock=$("#frm-create #stock").val();
		var deviation=available_stock - stock;
		$("#frm-create #deviation").val(deviation)
	}
	
		function getDeviationEdit(object){
		//alert(object.value)
		var available_stock=object.value;
		var stock=$("#frm-edit #stock").val();
		var deviation=available_stock - stock;
		$("#frm-edit #deviation").val(deviation)
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
		var app_return_purchase_id=id;
		$.ajax({ 
    type: 'GET', 
		url: '{{url("return_purchase/edit")}}'+'/'+app_return_purchase_id, 
    dataType: 'json',
			success: function (response){ 
				 //setup popover system
				 $("#frm-edit-header #return_date").popover({
						  trigger: 'manual',
							placement: 'auto bottom',
							html: 'true',
							title :'<span class="text-info"><strong>Info</strong></span>'+
                '<button type="button" id="close" class="close" onclick="closePopOverReturnPurchaseDate()">&times;</button>',
							content: function() {
								 var message = "Purchase Date will automaticly updated by system";
								 return message;
							}
					});
					$("#frm-edit-header #return_date").popover("show");				
					//$("#frm-edit-header #return_date").popover('toggle');
					
					$("#frm-edit-header #app_return_purchase_id").val(response["app_return_purchase_id"]);
					$("#frm-edit-header #return_purchase_number").val(response["return_purchase_number"]);
					$("#frm-edit-header #invoice_number").val(response["invoice_number"]);
					$("#frm-edit-header #return_date").val(response["return_date"]);
					$("#frm-edit-header #return_reason").val(response["return_reason"]);						
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
				//deleting selected item
				//var old_data_purchase=$("#data_purchase_item").val();
				//alert(old_data_purchase);
    }
		});		
	}
	
	function detail(id){
		var app_purchase_id=id;
		var url='{{url("purchase_detail")}}?'+'purchase_id='+app_purchase_id;
		location.href = url;
	}
	
	function deleteData(id){
		//alert(1)
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
	function checkItemExists(app_raw_material_id){
		var result=0;
		 var data_stock_opname_item=JSON.parse($("#data_stock_opname_item").val());
			 for(var i=0; i<= data_stock_opname_item.length-1; i++){
				 if( app_raw_material_id == data_stock_opname_item[i].app_raw_material_id){
					 result =1;
				 }
			 }
			 
			 return result;
			 
	}
	var obj_data_return_purchase_item_new =[];
	function addToStockOpname(){
      //prevent duplicare item
			
			
			var app_raw_material_id = $("#frm-create #app_raw_material_id").val();
			var raw_material_name 	= $("#frm-create #app_raw_material_id option:selected").text();
			var stock								= $("#frm-create #stock").val();
			var available_stock			= $("#frm-create #stock_opname").val();
			var deviation						= $("#frm-create #deviation").val();
			//define new data
			var new_data={ "app_raw_material_id" :app_raw_material_id,"raw_material_name" :raw_material_name,"stock" : stock,"stock_opname": available_stock,"deviation":deviation};
			
			//prevent duplicate rawmaterial
			if(checkItemExists(app_raw_material_id)==0){
				//this block to append new data and prevent double records in database
			
		  obj_data_return_purchase_item_new.push(new_data);//variabel not assign textarea value
			//alert(JSON.stringify(obj_data_return_purchase_item_new));
			$("#data_return_purchase_item_new").val(JSON.stringify(obj_data_return_purchase_item_new))
			//this block to  append old data with new data in data grid update
			var obj_data_return_purchase_item		 = JSON.parse($("#data_stock_opname_item").val());
			obj_data_return_purchase_item.push(new_data);
			
			
			//get last element and then increment 1 step
			var row_return_purchase=0;
			var row_count = $('#tbody_return_purchase tr').length;
			if(row_count!=0){
				row_return_purchase = row_count;
			}
			$("#data_stock_opname_item").val(JSON.stringify(obj_data_return_purchase_item));	//variable assign textarea value		
				 var tr="<tr id=tr-"+row_return_purchase+">"+								
									"<td class='footable-visible footable-first-column'>"+
										""+raw_material_name+""+
									"</td>"+
									"<td class='footable-visible footable-first-column'>"+
										""+stock+""+
									"</td>"+
									"<td  class='footable-visible footable-first-column'>"+
										""+available_stock+""+
									"</td>"+
									"<td  class='hidden-480'>"+
										""+deviation+""+
									"</td>"+
									"<td  class=' '>"+									
										"<div class='hidden-sm hidden-xs action-buttons'>"+
											"<a class='green' href='#'>"+
												"<i class='ace-icon fa fa-pencil bigger-130' id=row-"+row_return_purchase+" class='btn btn-primary' onclick='editItem(this.id,"+app_raw_material_id+")'></i>"+
											"</a>"+
											"<a class='red' href='#' id=row-"+row_return_purchase+" onclick='deleteItem(this.id,"+app_raw_material_id+")'>"+
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
																	"<i class='ace-icon fa fa-pencil-square-o bigger-120' id=row-"+row_return_purchase+" class='btn btn-primary' onclick='editItem(this.id,"+app_raw_material_id+")'></i>"+
																"</span>"+
															"</a>"+
														"</li>"+
														"<li>"+
															"<a href='#' class='tooltip-error' data-rel='tooltip' title='' id=row-"+row_return_purchase+" data-original-title='Delete' onclick='deleteItem(this.id,"+app_raw_material_id+")'>"+
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
		$("#tbody_stock_opname").append(tr)
		$("#modal-add").modal("hide");
			}else{
				alert("this Item already exists please select anoter item")
			}
			
	}
	
	function editItem(row_id,app_stock_opname_raw_material_id){
		row_id="tr-"+row_id.replace("row-","");
		var raw_material_name =$("#"+row_id+" "+"td:eq(0)").text();
		var stock							=$("#"+row_id+" "+"td:eq(1)").text();
		var stock_opname			=$("#"+row_id+" "+"td:eq(2)").text();
		var deviation					=$("#"+row_id+" "+"td:eq(3)").text();
		
		//delete selected item
		var data_stock_opname_item=JSON.parse($("#data_stock_opname_item").val());
		var selected_row=row_id.replace("tr-","");
		var start_index = selected_row;//target update row
    var number_of_elements_to_remove = 1;
    data_stock_opname_item.splice(start_index, number_of_elements_to_remove);
		$("#data_stock_opname_item").val(JSON.stringify(data_stock_opname_item));
		bindStockOpnameItem();
    //console.log(data_stock_opname_item);
        //[1,2,3,4];
		
		
		
		$("#frm-edit #app_raw_material_id").prepend("<option selected value="+app_raw_material_id+">"+raw_material_name+"</option>");
		$("#frm-edit #stock").val(stock);
		$("#frm-edit #stock_opname").val(stock_opname);
		$("#frm-edit #deviation").val(deviation);
		$("#frm-edit #selected_element").val(row_id.replace("tr-",""));
		$("#modal-edit").modal("toggle");
	}
	
	//display modal delete
  function deleteItem(row_id,app_raw_material_id){
		row_id="tr-"+row_id.replace("row-","");
		var raw_material_name	 =$("#"+row_id+" "+"td:eq(0)").text();
		var stock	 						 =$("#"+row_id+" "+"td:eq(1)").text();
		var stock_opname			 =$("#"+row_id+" "+"td:eq(2)").text();
		var deviation					 =$("#"+row_id+" "+"td:eq(3)").text();
		//delete selected item
		var data_stock_opname_item=JSON.parse($("#data_stock_opname_item").val());
		var selected_row=row_id.replace("tr-","");
		var start_index = selected_row;//target update row
    var number_of_elements_to_remove = 1;
    data_stock_opname_item.splice(start_index, number_of_elements_to_remove);
		$("#data_stock_opname_item").val(JSON.stringify(data_stock_opname_item));
		bindStockOpnameItem();
    //console.log(data_stock_opname_item);
        //[1,2,3,4];
		
		
		
		$("#frm-delete #app_raw_material_id").prepend("<option selected value="+app_raw_material_id+">"+raw_material_name+"</option>");
		$("#frm-delete #stock").val(stock);
		$("#frm-delete #stock_opname").val(stock_opname);
		$("#frm-delete #deviation").val(deviation);
		$("#frm-delete #selected_element").val(row_id.replace("tr-",""));
		$("#modal-delete").modal("toggle");
	}
	
	function doReturnRawMaterial(){
		$("#frm-return-purchase-item").submit();
	}
	
	function doUpdateItem(){
		//get old data purchase
		var obj_data_stock_opname_item= JSON.parse($("#data_stock_opname_item").val());
		//remove selected elemnt
		var selected_element  =$("#selected_element").val();		
		//obj_data_stock_opname_item.splice(selected_element, 1);
		//change with new element
		//alert($("#frm-edit #app_raw_material_id").val());
		var app_raw_material_id = $("#frm-edit #app_raw_material_id").val();
		var raw_material_name 	= $("#frm-edit #app_raw_material_id option:selected").text();
		var stock								= $("#frm-edit #stock").val();
		var stock_opname				= $("#frm-edit #stock_opname").val();
		var deviation						= $("#frm-edit #deviation").val();
		//define new data
		var new_data={ "app_raw_material_id" :app_raw_material_id,"raw_material_name" :raw_material_name, "stock" : stock,"stock_opname": stock_opname,"deviation":deviation};
	
		//updating with new data
		var start_index = $("#frm-edit #selected_element").val();//target update row
		var number_of_elements_to_remove = 0;
		obj_data_stock_opname_item.splice(start_index, number_of_elements_to_remove,new_data);
		
		//clear #data_stock_opname_item to prevent double value in grid
		$("#data_stock_opname_item").val(JSON.stringify(obj_data_stock_opname_item));
		bindStockOpnameItem();
		//document.write(JSON.stringify(data_stock_opname_item));
		$("#modal-edit").modal("hide");
	}
	
	//deleteing selected item
	function doDeleteItem(){
		//get old data purchase
		var obj_data_return_purchase_item= JSON.parse($("#data_stock_opname_item").val());
		//remove selected elemnt
		var start_index = $("#selected_element").val();//target delete row
		var number_of_elements_to_remove = 0;
		obj_data_return_purchase_item.splice(start_index, number_of_elements_to_remove);
		
		//clear #data_stock_opname_item to prevent double value in grid
		$("#data_stock_opname_item").val(JSON.stringify(obj_data_return_purchase_item));
		bindStockOpnameItem();
		//document.write(JSON.stringify(data_stock_opname_item));
		$("#modal-delete").modal("hide");
	}
	
	function cancelEditItem(){
		$("#modal-edit").modal("hide");
		location.reload();
	}
	
	function cancelDeleteItem(){
		$("#modal-delete").modal("hide");
		location.reload();
	}
	
</script>