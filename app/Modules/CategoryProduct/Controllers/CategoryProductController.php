<?php

namespace App\Modules\CategoryProduct\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\CategoryProduct\Models\CategoryProduct;
Use Redirect;
use Session;

class CategoryProductController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     
	 
	/** public function __construct(Request $request) 
		{
			//guard system from direct access
       if ($request->session()->has('session_login')==false) {			
						return Redirect::to('')->send();
			 }
		} */
	 
	 function get_category()
	 {
		//$flights = App\Flight::all();
		$data_category = CategoryProduct::all(); // kuery select tanpa kondis
		return $data_category;
     
	 }
    public function index()
    {
		// this digunakan untuk memanggil function yg ada didalam satu class diikuti dng nama function
		
        $data  = $this->get_category(); 
	/**echo "<pre>";
	print_r($data); // menampilkan data hasil kueri tanpa looping
	echo "</pre>";die(); */
		return view("CategoryProduct::index")
								->with("data_category",$data);  //data_category dapat dikenali didalam view didalam index.blade
		
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
	 
	 //function save
	 public function save(Request $request)
		{
			echo $request->input("name");die();
				$category_product=array("name"=>$request->input("name"));
											
								
			  $save=CategoryProduct::insert($category_product);				
				if($save==1){
					$message="Save data successful";
				}else{
					$message="save data failed";
				}
				
				return Redirect::to('category_product')
								->with("message",$message);
		}
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
