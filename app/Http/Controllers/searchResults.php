<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use DB;
use Storage;
use App\Publication;
use App\SearchResult;
use App\User;
use View;

class searchResults extends Controller
{   
    public function first(){

            $users = DB::table('users')->where( 'publication','2' )->paginate(10);
            $publications =  DB::table('publications')->get(); 
            $files = DB::table('files')->get();
            $pets =  DB::table('pets')->get();
            $houses =  DB::table('houses')->get(); 
            $tpets =  DB::table('tpets')->get(); 
            $cities =  DB::table('cities')->get(); 
            $number = 0;

            foreach ($users as $u) {
                $results[] = $u->id;
            }

            

            if (empty($results)) {
            
            $users = DB::table('users')->where( 'publication','2' )->paginate(10);
            $publications =  DB::table('publications')->get(); 
            $files = DB::table('files')->get();
            $pets =  DB::table('pets')->get();
            $houses =  DB::table('houses')->get(); 
            $tpets =  DB::table('tpets')->get(); 
            $cities =  DB::table('cities')->get(); 
           

           foreach ($users as $u) {
                $results[] = 0;
            }


            return view::make('publicate.publications')->with(['sitters'=> $users,'files'=> $files,'pets'=> $pets,'publications'=> $publications, 'houses'=> $houses, 'tpets'=> $tpets, 'cities'=> $cities, 'results'=> $results]);
        }else{
        
            $users = DB::table('users')->get();
            $publications =  DB::table('publications')->get(); 
            $files = DB::table('files')->get();
            $pets =  DB::table('pets')->get();
            $houses =  DB::table('houses')->get(); 
            $tpets =  DB::table('tpets')->get(); 
            $cities =  DB::table('cities')->get(); 
            

            return view::make('publicate.publications')->with(['sitters'=> $users,'files'=> $files,'pets'=> $pets,'publications'=> $publications, 'houses'=> $houses, 'tpets'=> $tpets, 'cities'=> $cities, 'results'=> $results]);  

        }
    }

     public function index(Request $request)
    {	

    	//SI NO HAAY DATOS EN LA BÚSQUEDA---------------------------------------------------------------------------

        if ( $request->typepets==0 &&  $request->cities==0) {
            $users = DB::table('users')->where( 'publication','2' )->paginate(10);
            $publications =  DB::table('publications')->get(); 
            $files = DB::table('files')->get();
            $pets =  DB::table('pets')->get();
            $houses =  DB::table('houses')->get(); 
            $tpets =  DB::table('tpets')->get(); 
            $cities =  DB::table('cities')->get(); 
            $number = 0;

            foreach ($users as $u) {
                $results[] = $u->id;
            }


            return view::make('publicate.publications')->with(['sitters'=> $users,'files'=> $files,'pets'=> $pets,'publications'=> $publications, 'houses'=> $houses, 'tpets'=> $tpets, 'cities'=> $cities, 'results'=> $results]);
           
        }elseif( $request->typepets!=0 &&  $request->cities!=0){


            //SI HAY DATOS EN AMBOS CAMPOS------------------------------------------------------------------
            
            

            $pets1 = DB::table('pets')->where('id_pet', $request->typepets)->get();
            

            foreach ($pets1 as $p1) {

                $users2 = DB::table('users')->where('id', $p1->id_user)->get();
                    
                    foreach ($users2 as $u2) {
                        
                        $users1 = DB::table('users')
                            ->where('id_city', $request->cities)
                            ->where('id', $u2->id)
                            ->get();

                        foreach ($users1 as $u1) {
                           $results[] = $u1->id;
                        }
                    }
                }

            if (empty($results)) {
            
           $users = DB::table('users')->where( 'publication','2' )->paginate(10);
            $publications =  DB::table('publications')->get(); 
            $files = DB::table('files')->get();
            $pets =  DB::table('pets')->get();
            $houses =  DB::table('houses')->get(); 
            $tpets =  DB::table('tpets')->get(); 
            $cities =  DB::table('cities')->get(); 
            $number = 0;

            foreach ($users as $u) {
                $results[] = 0;
            }


            return view::make('publicate.publications')->with(['sitters'=> $users,'files'=> $files,'pets'=> $pets,'publications'=> $publications, 'houses'=> $houses, 'tpets'=> $tpets, 'cities'=> $cities, 'results'=> $results]);
        }else{
        
            $users = DB::table('users')->get();
            $publications =  DB::table('publications')->get(); 
            $files = DB::table('files')->get();
            $pets =  DB::table('pets')->get();
            $houses =  DB::table('houses')->get(); 
            $tpets =  DB::table('tpets')->get(); 
            $cities =  DB::table('cities')->get(); 
            

            return view::make('publicate.publications')->with(['sitters'=> $users,'files'=> $files,'pets'=> $pets,'publications'=> $publications, 'houses'=> $houses, 'tpets'=> $tpets, 'cities'=> $cities, 'results'=> $results]);  

        }
          

            }elseif($request->typepets!=0 &&  $request->cities==0){

                     //SI HAY DATOS EN CAMPO MASCOTAS------------------------------------------------------------------
            
            

            $pets1 = DB::table('pets')->where('id_pet', $request->typepets)->get();
            

            foreach ($pets1 as $p1) {

                $users2 = DB::table('users')->where('id', $p1->id_user)->get();
                    
                    foreach ($users2 as $u2) {
                        
                        $users1 = DB::table('users')
                            ->where('id', $u2->id)
                            ->get();

                        foreach ($users1 as $u1) {
                           $results[] = $u1->id;
                        }
                    }
                }

            if (empty($results)) {
            
           $users = DB::table('users')->where( 'publication','2' )->paginate(10);
            $publications =  DB::table('publications')->get(); 
            $files = DB::table('files')->get();
            $pets =  DB::table('pets')->get();
            $houses =  DB::table('houses')->get(); 
            $tpets =  DB::table('tpets')->get(); 
            $cities =  DB::table('cities')->get(); 
            $number = 0;

            foreach ($users as $u) {
                $results[] = 0;
            }


            return view::make('publicate.publications')->with(['sitters'=> $users,'files'=> $files,'pets'=> $pets,'publications'=> $publications, 'houses'=> $houses, 'tpets'=> $tpets, 'cities'=> $cities, 'results'=> $results]);
        }else{
        
            $users = DB::table('users')->get();
            $publications =  DB::table('publications')->get(); 
            $files = DB::table('files')->get();
            $pets =  DB::table('pets')->get();
            $houses =  DB::table('houses')->get(); 
            $tpets =  DB::table('tpets')->get(); 
            $cities =  DB::table('cities')->get(); 
            

            return view::make('publicate.publications')->with(['sitters'=> $users,'files'=> $files,'pets'=> $pets,'publications'=> $publications, 'houses'=> $houses, 'tpets'=> $tpets, 'cities'=> $cities, 'results'=> $results]);  

        }

            }elseif ($request->typepets==0 &&  $request->cities!=0) {


            //SI HAY DATOS EN CAMPO CIUDADES------------------------------------------------------------------
            
            $users2 = DB::table('users')->where('id_city', $request->cities)->get();
                    
                    foreach ($users2 as $u2) {
                        
                        $users1 = DB::table('users')
                            ->where('id', $u2->id)
                            ->get();

                        foreach ($users1 as $u1) {
                           $results[] = $u1->id;
                        }
                    }
            

            if (empty($results)) {
            
            $users = DB::table('users')->where( 'publication','2' )->paginate(10);
            $publications =  DB::table('publications')->get(); 
            $files = DB::table('files')->get();
            $pets =  DB::table('pets')->get();
            $houses =  DB::table('houses')->get(); 
            $tpets =  DB::table('tpets')->get(); 
            $cities =  DB::table('cities')->get(); 
            $number = 0;

            foreach ($users as $u) {
                $results[] = 0;
            }


            return view::make('publicate.publications')->with(['sitters'=> $users,'files'=> $files,'pets'=> $pets,'publications'=> $publications, 'houses'=> $houses, 'tpets'=> $tpets, 'cities'=> $cities, 'results'=> $results]);
        }else{
        
            $users = DB::table('users')->get();
            $publications =  DB::table('publications')->get(); 
            $files = DB::table('files')->get();
            $pets =  DB::table('pets')->get();
            $houses =  DB::table('houses')->get(); 
            $tpets =  DB::table('tpets')->get(); 
            $cities =  DB::table('cities')->get(); 
            

            return view::make('publicate.publications')->with(['sitters'=> $users,'files'=> $files,'pets'=> $pets,'publications'=> $publications, 'houses'=> $houses, 'tpets'=> $tpets, 'cities'=> $cities, 'results'=> $results]);  

        }
            }
        }

       



    }

