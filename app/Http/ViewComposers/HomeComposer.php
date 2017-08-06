<?php 
namespace App\Http\ViewComposers;

use Illuminate\View\View;
use DB;
use User;

class HomeComposer{
	public function compose(View $view){

		$sitters = DB::table('users')->where('publication', '1')->get();
		$cities =  DB::table('cities')->get(); 
		$tpets =  DB::table('tpets')->get(); 
		$pets1 = DB::table('pets')->get();
		$publications = DB::table('publications')->get();

		$view->with(['cities'=> $cities, 'tpets1'=>$tpets, 'publications1' => $publications, 'sitters' => $sitters,  'pets1' => $pets1]);
	}
}

?>