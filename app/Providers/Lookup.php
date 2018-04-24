<?php

namespace App\Providers;
use App\app_suplier;
use App\app_category_raw_material;
use App\app_category_product;
use App\sys_roles;
use App\Modules\AppRawMaterial\Models\AppRawMaterial;
use App\Modules\AppProduct\Models\AppProduct;

use Illuminate\Support\ServiceProvider;

class Lookup extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
		
		public static function getLookupSuplier(){
			$data=app_suplier::get();
			return $data;
		}
		
		public static function getLookupRoles(){
			$data=sys_roles::select("sys_roles.*","sys_roles.name as role_name")->get();
			return $data;
		}
		//lookup category raw_material
		public static function getLookupCategory(){
			$data=app_category_raw_material::get();
			return $data;
		}
		
		//lookup category product
		public static function getLookupCategoryProduct(){
			$data=app_category_product::get();
			return $data;
		}
		public static function getLookupRawMaterial(){
			$data=AppRawMaterial::get();
			return $data;
		}
		public static function getLookupProduct(){
			$data=AppProduct::get();
			return $data;
		}
}
