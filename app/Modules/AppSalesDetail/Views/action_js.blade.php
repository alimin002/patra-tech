<script src="{{url('assets/js/jquery.min.js')}}"></script>
<script src="{{url('assets/js/common.js')}}"></script>

<script>
/**
 window.onbeforeunload = function() {
   return "Warning: data purchase item will be lost, are you sure you want to leave? Think of the kittens!";
 }
 **/
 
  function addItem(){
	 $("#frm-create #unit_price").val("");
	 $("#frm-create #qty").val("");
	 $("#frm-create #sub_total").val("");
	 $("#frm-create #description").val("");
	 //
	 /*
	 $("#frm-create #unit_price").val();
	 $("#frm-create #qty").val();
	 $("#frm-create #sub_total").val();
	 $("#frm-create #description").val();
	 **/
	 $("#modal-add").modal("toggle");
	 
 }
	
 $(function(){
		bindSalesItem();
 });
	
	function backToSales(){
		var url="{{url('sales')}}";
		//alert(url);
		//window.location.href = url;
		window.open(url);
		//window.open(url);
	}
	function bindSalesItem(){
			 //clear grid data to prevent double record
			 $("#tbody_sales").empty();
			 var data_sales_item=JSON.parse($("#data_sales_item").val());
			 for(var i=0; i<= data_sales_item.length-1; i++){
					var app_product_id = data_sales_item[i].app_product_id;
					var product_name 	= data_sales_item[i].product_name;
					var unit_price					= data_sales_item[i].unit_price;
					var qty									= data_sales_item[i].qty;
					var sub_total						= data_sales_item[i].sub_total;
				  var tr="<tr id=tr-"+i+">"+								
									"<td class='footable-visible footable-first-column'>"+
										""+product_name+""+
									"</td>"+
									"<td class='footable-visible footable-first-column'>"+
										""+numberWithCommas(unit_price)+""+
									"</td>"+
									"<td  class='footable-visible footable-first-column'>"+
										""+qty+""+
									"</td>"+
									"<td  class='hidden-480'>"+
										""+numberWithCommas(sub_total)+""+
									"</td>"+
									"<td  class=' '>"+
									
										"<div class='hidden-sm hidden-xs action-buttons'>"+
											"<a class='green' href='#'>"+
												"<i class='ace-icon fa fa-pencil bigger-130' id=row-"+i+" class='btn btn-primary' onclick='editItem(this.id,"+app_product_id+")'></i>"+
											"</a>"+
											"<a class='red' href='#'>"+
												"<i class='ace-icon fa fa-trash-o bigger-130' id=row-"+i+" onclick='deleteItem(this.id,"+app_product_id+")'></i>"+
											"</a>"+
										"</div>"+	
											"<div class='hidden-md hidden-lg'>"+
												"<div class='inline position-relative'>"+
													"<button class='btn btn-minier btn-yellow dropdown-toggle' data-toggle='dropdown' data-position='auto'>"+
														"<i class='ace-icon fa fa-caret-down icon-only bigger-120'></i>"+
													"</button>"+
													"<ul class='dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close'>"+
														"<li>"+
															"<a href='#'  data-rel='tooltip' title='' data-original-title='Edit' >"+
																"<span class='green' >"+
																	"<i class='fa fa-expand' id=row-"+i+"  class='btn btn-primary' onclick='editItem(this.id)'></i>"+
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
															"<a href='#' class='tooltip-error' data-rel='tooltip' id=row-"+i+" title='' onclick='deleteitem(this.id,"+app_product_id+")' data-original-title='Delete'>"+
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
								$("#tbody_sales").append(tr);
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
	
	function getProductById(select_object){
		//alert(select_object.value);
		var app_product_id=select_object.value;
		$.ajax({ 
    type: 'GET', 
    url: '{{url("product/edit")}}'+'/'+app_product_id, 
    dataType: 'json',
    success: function (response){
				//bind in form create
				$("#frm-create #unit_price").val(numberWithCommas(response["unit_price"]));
				$("#frm-create #description").val(response["description"]);
				
				//bind in form edit
				$("#frm-edit #unit_price").val(numberWithCommas(response["unit_price"]));
				$("#frm-edit #description").val(response["description"]);
				//get sub total edit
				getSubTotalEdit();
    }
		});	
	}
	
	//get sub total when create
	function getSubTotal(){
		var unit_price= $("#frm-create #unit_price").val();
		var qty 			= $("#frm-create #qty").val();
		var sub_total = removeCommas(unit_price) * qty;
		$("#frm-create #sub_total").val(numberWithCommas(sub_total));
	}
	
	//get sub total when edit
	function getSubTotalEdit(){
		var unit_price= $("#frm-edit #unit_price").val();
		var qty 			= $("#frm-edit #qty").val();
		var sub_total = removeCommas(unit_price) * qty;
		$("#frm-edit #sub_total").val(numberWithCommas(sub_total));
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
	
	function renderLookupProduct(){
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
	
	function closePopOverSalesDate(){
			$("#frm-edit-header #sales_date").popover("hide");			
	}
	
	function editHeader(id){
		//alert(id);
		var app_sales_id=id;
		$.ajax({ 
    type: 'GET', 
		url: '{{url("sales/edit")}}'+'/'+app_sales_id, 
    dataType: 'json',
			success: function (response){ 
				 //setup popover system
				 $("#frm-edit-header #sales_date").popover({
						  trigger: 'manual',
							placement: 'auto bottom',
							html: 'true',
							title :'<span class="text-info"><strong>Info</strong></span>'+
                '<button type="button" id="close" class="close" onclick="closePopOverSalesDate()">&times;</button>',
							content: function() {
								 var message = "Purchase Date will automaticly updated by system";
								 return message;
							}
					});
					$("#frm-edit-header #sales_date").popover("show");				
					//$("#frm-edit-header #sales_date").popover('toggle');
					
					$("#frm-edit-header #app_sales_id").val(response["app_sales_id"]);
					$("#frm-edit-header #invoice_number").val(response["invoice_number"]);
					$("#frm-edit-header #sales_date").val(response["sale_date"]);
					$("#frm-edit-header #description").val(response["description"]);						
					var app_suplier_id=response["app_suplier_id"];
					var customer_name=response["customer_name"];
					$("#frm-edit-header #customer_name").val(customer_name);
					$("#modal-edit-header").modal("toggle");
			}
		});		
	}
	
	 function scrollToLowewst(){
		//alert(1);
		$('html,body').animate({scrollTop: document.body.scrollHeight},"fast");
	}

	/***
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
				renderLookupProduct();				
				$("#modal-edit").modal("toggle");
				//deleting selected item
				//var old_data_purchase=$("#data_purchase_item").val();
				//alert(old_data_purchase);
    }
		});		
	}
	**/
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
				renderLookupProduct();				
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
	function checkItemExists(app_product_id){
		var result=0;
		 var data_sales_item=JSON.parse($("#data_sales_item").val());
			 for(var i=0; i<= data_sales_item.length-1; i++){
				 if( app_product_id == data_sales_item[i].app_product_id){
					 result =1;
				 }
			 }
			 
			 return result;
			 
	}
	//var obj_data_sales_item_new =[];
	function addToSales(){
      //prevent duplicare item
			
			
			var app_product_id = $("#frm-create #app_product_id").val();
			var product_name 	= $("#frm-create #app_product_id option:selected").text();
			var unit_price					= $("#frm-create #unit_price").val();
			var qty									= $("#frm-create #qty").val();
			var sub_total						= $("#frm-create #sub_total").val();
			//define new data
			var new_data={ "app_product_id" :app_product_id, "unit_price" : unit_price,"qty": qty,"sub_total":sub_total};
			
			//prevent duplicate rawmaterial
			if(checkItemExists(app_product_id)==0){
			var obj_data_sales_item		 = JSON.parse($("#data_sales_item").val());
			obj_data_sales_item.push(new_data);
			
			
			//get last element and then increment 1 step
			var row_sales=0;
			var row_count = $('#tbody_purchase tr').length;
			if(row_count!=0){
				row_sales = row_count;
			}
			$("#data_sales_item").val(JSON.stringify(obj_data_sales_item));	//variable assign textarea value		
				 var tr="<tr id=tr-"+row_sales+">"+								
									"<td class='footable-visible footable-first-column'>"+
										""+product_name+""+
									"</td>"+
									"<td class='footable-visible footable-first-column'>"+
										""+unit_price+""+
									"</td>"+
									"<td  class='footable-visible footable-first-column'>"+
										""+qty+""+
									"</td>"+
									"<td  class='hidden-480'>"+
										""+sub_total+""+
									"</td>"+
									"<td  class=' '>"+
									
										"<div class='hidden-sm hidden-xs action-buttons'>"+
											"<a class='green' href='#'>"+
												"<i class='ace-icon fa fa-pencil bigger-130' id=row-"+row_sales+" class='btn btn-primary' onclick='editItem(this.id)'></i>"+
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
															"<a href='#' data-rel='tooltip' title='' data-original-title='Edit' >"+
																"<span class='green' >"+
																	"<i class='fa fa-expand' id=row-"+row_sales+" class='btn btn-primary' onclick='editItem(this.id)'></i>"+
																"</span>"+
															"</a>"+
														"</li>"+
														"<li>"+
															"<a href='#'  class='tooltip-success' data-rel='tooltip' title='' data-original-title='Edit' >"+
																"<span class='green' >"+
																	"<i class='ace-icon fa fa-pencil-square-o bigger-120' id=row-"+row_sales+" class='btn btn-primary' onclick='editItem(this.id)'></i>"+
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
		$("#tbody_sales").append(tr)
		$("#modal-add").modal("hide");
			}else{
				alert("this Item already exists please select anoter item")
			}
			
	}
	
	function editItem(row_id,app_product_id){
		row_id="tr-"+row_id.replace("row-","");
		var product_name =$("#"+row_id+" "+"td:eq(0)").text();
		var unit_price				=$("#"+row_id+" "+"td:eq(1)").text();
		var qty								=$("#"+row_id+" "+"td:eq(2)").text();
		var sub_total					=$("#"+row_id+" "+"td:eq(3)").text();
		var description				=$("#"+row_id+" "+"td:eq(4)").text();
		
		//delete selected item
		var data_sales_item=JSON.parse($("#data_sales_item").val());
		//alert($("#data_sales_item").val());
		var selected_row=row_id.replace("tr-","");
		var start_index = selected_row;//target update row
    var number_of_elements_to_remove = 1;
    data_sales_item.splice(start_index, number_of_elements_to_remove);
		$("#data_sales_item").val(JSON.stringify(data_sales_item));
		bindSalesItem();
    console.log(data_sales_item);
        //[1,2,3,4];
		
		
		
		$("#frm-edit #app_product_id").prepend("<option selected value="+app_product_id+">"+product_name+"</option>");
		$("#frm-edit #unit_price").val(unit_price);
		$("#frm-edit #qty").val(qty);
		$("#frm-edit #sub_total").val(sub_total);
		$("#frm-edit #description").val(description);
		$("#frm-edit #selected_element").val(row_id.replace("tr-",""));
		$("#frm-edit #old_qty").val(qty);
		$("#modal-edit").modal("toggle");
	}
	
	//display modal delete
  function deleteItem(row_id,app_product_id){
		//alert(app_product_id);
		row_id="tr-"+row_id.replace("row-","");
		var product_name =$("#"+row_id+" "+"td:eq(0)").text();
		var unit_price				=$("#"+row_id+" "+"td:eq(1)").text();
		var qty								=$("#"+row_id+" "+"td:eq(2)").text();
		var sub_total					=$("#"+row_id+" "+"td:eq(3)").text();
		var description				=$("#"+row_id+" "+"td:eq(4)").text();
		//delete selected item
		var data_sales_item=JSON.parse($("#data_sales_item").val());
		var selected_row=row_id.replace("tr-","");
		var start_index = selected_row;//target update row
    var number_of_elements_to_remove = 1;
    data_sales_item.splice(start_index, number_of_elements_to_remove);
		$("#data_sales_item").val(JSON.stringify(data_sales_item));
		bindSalesItem();
    console.log(data_sales_item);
        //[1,2,3,4];
		
		
		
		$("#frm-delete #app_product_id").val(app_product_id);
		$("#frm-delete #product_name").val(product_name);
		$("#frm-delete #unit_price").val(unit_price);
		$("#frm-delete #qty").val(qty);
		$("#frm-delete #sub_total").val(sub_total);
		$("#frm-delete #description").val(description);
		$("#frm-delete #selected_element").val(row_id.replace("tr-",""));
		$("#modal-delete").modal("toggle");
	}
	
	function doSaleProduct(){
		$("#frm-sales-item").submit();
	}
	
	function doUpdateItem(){
		//get old data purchase
		var obj_data_sales_item= JSON.parse($("#data_sales_item").val());
		//remove selected elemnt
		var selected_element  =$("#selected_element").val();		
		//obj_data_sales_item.splice(selected_element, 1);
		//change with new element
		//alert($("#frm-edit #app_product_id").val());
		var app_product_id = $("#frm-edit #app_product_id").val();
		var product_name 	= $("#frm-edit #app_product_id option:selected").text();
		var unit_price					= $("#frm-edit #unit_price").val();
		var qty									= $("#frm-edit #qty").val();
		var old_qty							= $("#frm-edit #old_qty").val();
		var sub_total						= $("#frm-edit #sub_total").val();
		//define new data
		var new_data={ "app_product_id" :app_product_id,"product_name" :product_name, "unit_price" : unit_price,"qty": qty,"sub_total":sub_total,"old_qty":old_qty};
		//alert(new_data);
		//updating with new data
		var start_index = $("#selected_element").val();//target update row
		var number_of_elements_to_remove = 0;
		obj_data_sales_item.splice(start_index, number_of_elements_to_remove,new_data);
		
		//clear #data_sales_item to prevent double value in grid
		$("#data_sales_item").val(JSON.stringify(obj_data_sales_item));
		bindSalesItem();
		//document.write(JSON.stringify(data_sales_item));
		$("#modal-edit").modal("hide");
	}
	
	//deleteing selected item
	var object_deleted_item =[];
	function doDeleteItem(){
		//get old data purchase
		var obj_data_sales_item= JSON.parse($("#data_sales_item").val());
		//remove selected elemnt
		var start_index = $("#selected_element").val();//target delete row
		var number_of_elements_to_remove = 0;
		obj_data_sales_item.splice(start_index, number_of_elements_to_remove);
		var app_product_id=$("#frm-delete #app_product_id").val();
		var qty								 =$("#frm-delete #qty").val();
		var deleted_item = {"app_product_id" :app_product_id,"qty": qty};
		object_deleted_item.push(deleted_item);
		//alert(JSON.stringify(object_deleted_item));
		$("#deleted_item").val(JSON.stringify(object_deleted_item));
		//clear #data_sales_item to prevent double value in grid
		$("#data_sales_item").val(JSON.stringify(obj_data_sales_item));
		bindSalesItem();
		//document.write(JSON.stringify(data_sales_item));
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