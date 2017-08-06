<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use DB;
use Storage;
use App\Publication;
use App\User;
use View;

class searchResults extends Controller
{
     public function index(Request $request)
    {	

    	//SI NO HAAY DATOS EN LA BÚSQUEDA---------------------------------------------------------------------------

        if ( $request->typepets==0 &&  $request->cities==0) {
            $users = DB::table('users')->get();
            $publications =  DB::table('publications')->get(); 
            $files = DB::table('files')->get();
            $pets =  DB::table('pets')->get();
            $houses =  DB::table('houses')->get(); 
            $tpets =  DB::table('tpets')->get(); 
            $cities =  DB::table('cities')->get(); 
            $number = 0;

            return view::make('publicate.publications')->with(['user'=> $users,'files'=> $files,'pets'=> $pets,'publications'=> $publications, 'houses'=> $houses, 'tpets'=> $tpets, 'cities'=> $cities, 'number'=> 'number']);
           
        }elseif( $request->typepets!=0 &&  $request->cities!=0){
            $users = searchResult::Name($request->get('name'))->Status($request->get('status'))->Gender($request->get('gender'))->Verified($request->get('verified'))->orderBy('id', 'DESC')->paginate(10);
            
         /*   $user = DB::table('users')
            ->join('cities', 'users.id_city', '=', 'cities.id')
            ->join('pets', 'users.id', '=', 'pets.id_user')
            ->select('users.*', 'cities.city', 'pets.id_pet')
            ->get();

            foreach ($user as $u) {
                if ($u->id_pet==$request->typepets &&  $u->id_city ==$request->cities) {
                    $usersa[] = $u->id;
                }
            }*/

          

            $users = DB::table('users')->get();
            $publications =  DB::table('publications')->get(); 
            $files = DB::table('files')->get();
            $pets =  DB::table('pets')->get();
            $houses =  DB::table('houses')->get(); 
            $tpets =  DB::table('tpets')->get(); 
            $cities =  DB::table('cities')->get(); 
            

            return view::make('publicate.publications')->with(['user'=> $users,'files'=> $files,'pets'=> $pets,'publications'=> $publications, 'houses'=> $houses, 'tpets'=> $tpets, 'cities'=> $cities, 'usersa'=> $usersa ]);
        }

       



    }
}
