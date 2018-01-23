<?php

namespace App\Providers;
use App\app_suplier;
use App\app_category_raw_material;
use App\Modules\AppRawMaterial\Models\AppRawMaterial;

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
		public static function getLookupCategory(){
			$data=app_category_raw_material::get();
			return $data;
		}
		public static function getLookupRawMaterial(){
			$data=AppRawMaterial::get();
			return $data;
		}
}
