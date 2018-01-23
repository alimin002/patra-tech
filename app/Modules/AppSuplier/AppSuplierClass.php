<?php
class AppSuplierClass
{
	use App\Modules\AppSuplier\Models\AppSuplier;
	use Illuminate\Pagination\Paginator;

	function getSuplierAll(){
	$data= AppSuplier::paginate(3);
	return $data;	
	}
	 
	function getSuplierByKeyword($keyword){
		$data=AppSuplier::where('app_suplier.name', 'LIKE','%'.$keyword.'%')
											->paginate(3);
		return $data;
	}
	
	function doSave($request){
	 $suplier=array("name"													=>$request["name"],
									"addres"												=>$request["addres"],
									"telephone_number"							=>$request["telephone_number"]);
								
	 $save=AppSuplier::insert($suplier);
	 return $save;
 }
}