<?php 
namespace App\Http\ViewComposers;

use Illuminate\View\View;
use DB;
use User;


class PublicationComposer{
	
	public function compose(View $view){

		
		
		$tpets =  DB::table('tpets')->get(); 
		
		

		$view->with(['tpets1'=>$tpets]);
	}
}

?>