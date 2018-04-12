<script src="{{url('assets/js/jquery.min.js')}}"></script>
<script>
		 $(function(){
			 	//alert(1);
				bindSalesItem();
			});
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
				  var tr="<tr id=tr-"+i+">"+
									"<td class='center  sorting_1'>"+
										"<label class='position-relative'>"+
											"<input type='checkbox' class='ace'>"+
											"<span class='lbl'></span>"+
										"</label>"+
									"</td>"+
									"<td class='footable-visible footable-first-column'>"+
										""+product_name+""+
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
												"<i class='ace-icon fa fa-pencil bigger-130' id=row-"+i+" class='btn btn-primary' onclick='editItem(this.id,"+app_product_id+")'></i>"+
											"</a>"+
											"<a class='red' href='#'>"+
												"<i class='ace-icon fa fa-trash-o bigger-130' id=row-"+i+" onclick='deleteItem(this.id)'></i>"+
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
																	"<i class='ace-icon fa fa-pencil-square-o bigger-120' id=row-"+i+" class='btn btn-primary' onclick='editItem(this.id)'></i>"+
																"</span>"+
															"</a>"+
														"</li>"+
														"<li>"+
															"<a href='#' class='tooltip-error' data-rel='tooltip' title='' onclick='deleteData(this.id)' data-original-title='Delete'>"+
																"<span class='red'>"+
																	"<i class='ace-icon fa fa-trash-o bigger-120' id=row-"+i+"></i>"+
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