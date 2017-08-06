<?php 
namespace App\Http\ViewComposers;

use Illuminate\View\View;
use DB;
use User;

class HomeComposer{
	public function compose(View $view){

		
		$cities =  DB::table('cities')->get(); 
		$tpets =  DB::table('tpets')->get(); 
		$pets1 = DB::table('pets')->get();
		$publications = DB::table('publications')->get();

		$view->with(['cities'=> $cities, 'tpets1'=>$tpets, 'publications1' => $publications,  'pets1' => $pets1]);
	}
}

?>