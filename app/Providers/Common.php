<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use app_suplier;
class Common extends ServiceProvider
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
		
		public static function generateTransactionNumber($prefix,$number){
			if($number==""){
				$number =0;
			}
			$number=$number+1;
			//convert type= string
			$str = (string)$number;
			$string_zero="000000";
			//echo substr($string_zero,strlen($str)); die();
			//this command is to automaticly fix digit size pattern '6 digit number'
			$result = $prefix.substr($string_zero,strlen($str)).$str;
			return $result;
	
		}
	
}
