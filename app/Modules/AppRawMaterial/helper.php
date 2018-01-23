<?php

/**
 *	AppRawMaterial Helper  
 */
 use App\Modules\AppRawMaterial\Models\AppRawMaterial;
 use Illuminate\Pagination\Paginator;
 use App\app_suplier;
 function getRawMaterialAll(){
	 $data=AppRawMaterial::select("app_raw_material.name AS raw_name","app_suplier.name AS suplier_name","app_raw_material.*","app_suplier.*","app_category_raw_material.*","app_category_raw_material.name as category_name","app_stock_raw_material.stock")
												->leftJoin('app_suplier', 'app_raw_material.app_suplier_id', '=', 'app_suplier.app_suplier_id')
												->leftJoin('app_category_raw_material', 'app_raw_material.app_category_raw_material_id', '=', 'app_category_raw_material.app_category_raw_material_id')
												->leftJoin('app_stock_raw_material', 'app_raw_material.app_raw_material_id', '=', 'app_stock_raw_material.app_raw_material_id')
												->paginate(3);
						
	 return $data;
 }
 
 function getRawMaterialByKeyword($keyword){
	 $data=AppRawMaterial::
					select("app_raw_material.name AS raw_name","app_suplier.name AS suplier_name",			"app_raw_material.*","app_suplier.*","app_category_raw_material.*","app_category_raw_material.name as category_name","app_stock_raw_material.stock")
												->leftJoin('app_suplier', 'app_raw_material.app_suplier_id', '=', 'app_suplier.app_suplier_id')
												->leftJoin('app_category_raw_material', 'app_raw_material.app_category_raw_material_id', '=', 'app_category_raw_material.app_category_raw_material_id')
												->leftJoin('app_stock_raw_material', 'app_raw_material.app_raw_material_id', '=', 'app_stock_raw_material.app_raw_material_id')
					->where('app_raw_material.name', 'LIKE','%'.$keyword.'%')
					->paginate(3);
	 return $data;
 }
  function getRawMaterialByAppRawMaterialId($app_raw_material_id){
	 $data=AppRawMaterial::
					select("app_raw_material.name AS raw_name","app_suplier.name AS suplier_name","app_raw_material.*","app_suplier.*","app_category_raw_material.*","app_category_raw_material.name as category_name","app_stock_raw_material.stock")
												->leftJoin('app_suplier', 'app_raw_material.app_suplier_id', '=', 'app_suplier.app_suplier_id')
												->leftJoin('app_category_raw_material', 'app_raw_material.app_category_raw_material_id', '=', 'app_category_raw_material.app_category_raw_material_id')
												->leftJoin('app_stock_raw_material', 'app_raw_material.app_raw_material_id', '=', 'app_stock_raw_material.app_raw_material_id')
					->where('app_raw_material.app_raw_material_id', '=',$app_raw_material_id)->first()->toArray();
	 return $data;
 }
 function doSave($request){
	 $raw_material=array("name"													=>$request["name"],
												"unit"												=>$request["unit"],
												"unit_price"									=>$request["unit_price"],
												"app_suplier_id"							=>$request["app_suplier_id"],
												"app_category_raw_material_id"=>$request["app_category_raw_material_id"],
												"description"									=>$request["description"]);
	 $save=AppRawMaterial::insert($raw_material);
	 return $save;
 }
 
 function doDelete($request){
	 $app_raw_material_id=$request['app_raw_material_id'];
	 $delete = AppRawMaterial::where('app_raw_material_id', '=',$app_raw_material_id)->delete();
	 return $delete;
 }
 function doUpdate($request){
	 $app_raw_material_id																= $request["app_raw_material_id"];
	 $raw_material=array("name"													=>$request["name"],
												"unit"												=>$request["unit"],
												"unit_price"									=>$request["unit_price"],
												"app_suplier_id"							=>$request["app_suplier_id"],
												"app_category_raw_material_id"=>$request["app_category_raw_material_id"],
												"description"									=>$request["description"]);
	 
	 $app_raw_material_id=$request['app_raw_material_id'];
	 $update = AppRawMaterial::where('app_raw_material_id', '=',$app_raw_material_id)
																	->update($raw_material);
	 return $update;
	 
 }
 /**
 function getLookupSuplier(){
	 $data=app_suplier::get();
	 return $data;
 }
 **/