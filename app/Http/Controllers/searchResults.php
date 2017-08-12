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
           

           


            return view::make('publicate.publications')->with(['sitters'=> $users,'files'=> $files,'pets'=> $pets,'publications'=> $publications, 'houses'=> $houses, 'tpets'=> $tpets, 'cities'=> $cities, 'results'=> '0']);
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

    //BARRA DE BÚSQUEDA--------------------------------------------------------------------------------

     public function index(Request $request)
    {   

        //SI NO HAY DATOS EN LA BÚSQUEDA---------------------------------------------------------------------------

        if ($request->typepets==0 &&  $request->cities==0) {
            
            $datetime1 = date_create($request->beginDate);
            $datetime2 = date_create($request->endDate);
            $fechaActual = date("Y-m-d", strtotime('now'));
            $datetime3 = date_create($fechaActual);
            if ($datetime2 == $datetime3) {
                $datetime2 =  date_create($request->beginDate);
            }
            
            $interval = date_diff($datetime1, $datetime2);
            
            $dias = $interval->format('%a');
            $i = 0;
           
            if ($datetime1 > $datetime2) {
                return back();
            }
         
              //SE LLENAN LAS FECHAS DE LA BÚSQUEDA---------------------------------------------------------------------

            while ($i <= $dias) {
                 
                $days[]= date('Y-m-d', strtotime($request->beginDate. ' + '.$i.' days'));
                $i++;
            
            }

            $reserves = DB::table('reservations')->get();

           foreach ($days as $d) {
               $idUsers= DB::table('invervals')->where('day', $d)->get();
               foreach ($idUsers as $i) {
                   $ids[] = $i->id_host;
               }
           }
        
            
            
         
           
            
            if (empty($ids)) {
                $users = DB::table('users')->where( 'publication','2' )->paginate(10);

                foreach ($users as $u) {
                    $total[]=$u->id;
                }
            }else{

                $idU = array_unique($ids);
                  //SE TOMAN LOS VALORES DE LAS PUBLICACIONES A SACAR-------------------------------------------------

                foreach ($idU as $i) {
                    $taken = DB::table('users')->where([
                        ['publication', '2'],
                        ['id', $i],
                    ])->first();
                   $taken1[]= $taken->id;
                  
                }
                //SE TOMAN LOS CUIDADORES PARA COMPARAR-------------------------------------------------------------------
                $users = DB::table('users')->where( 'publication','2' )->paginate(10);
                
                foreach ($users as $u) {
                   $idT[]= $u->id;
                   
                }
                //SE COMPARAN LOS DOS ARRAY Y SE TOMAN DEL PRIMERO LOS QUE NO ESTÉN EN EL SEGUNDO-------------------------
                $total = array_diff($idT, $taken1);

                
            }
           

          
            
            //FIN DEL SISTEMA DE FECHAS---------------------------------------------------------------------------
            
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
            $number = 0;

            foreach ($users as $u) {
                $results[] = $u->id;
            }


            return view::make('publicate.publications')->with(['sitters'=> $usersU,'files'=> $files,'pets'=> $pets,'publications'=> $publications, 'houses'=> $houses, 'tpets'=> $tpets, 'cities'=> $cities, 'results'=> '0', 'total' => $total]);
        }else{
        
            $users = DB::table('users')->where( 'publication','2' )->paginate(10);
            $publications =  DB::table('publications')->get(); 
            $files = DB::table('files')->get();
            $pets =  DB::table('pets')->get();
            $houses =  DB::table('houses')->get(); 
            $tpets =  DB::table('tpets')->get(); 
            $cities =  DB::table('cities')->get(); 
            

            return view::make('publicate.publications')->with(['sitters'=> $users,'files'=> $files,'pets'=> $pets,'publications'=> $publications, 'houses'=> $houses, 'tpets'=> $tpets, 'cities'=> $cities, 'results'=> $results, 'total' => $total]);  

        }
           
        }elseif( $request->typepets!=0 &&  $request->cities!=0){


            //SI HAY DATOS EN AMBOS CAMPOS------------------------------------------------------------------
              $datetime1 = date_create($request->beginDate);
            $datetime2 = date_create($request->endDate);
            $fechaActual = date("Y-m-d", strtotime('now'));
            $datetime3 = date_create($fechaActual);
            if ($datetime2 == $datetime3) {
                $datetime2 =  date_create($request->beginDate);
            }
            
            $interval = date_diff($datetime1, $datetime2);
            
            $dias = $interval->format('%a');
            $i = 0;
           
            if ($datetime1 > $datetime2) {
                return back();
            }
         
              //SE LLENAN LAS FECHAS DE LA BÚSQUEDA---------------------------------------------------------------------

            while ($i <= $dias) {
                 
                $days[]= date('Y-m-d', strtotime($request->beginDate. ' + '.$i.' days'));
                $i++;
            
            }

            $reserves = DB::table('reservations')->get();

           foreach ($days as $d) {
               $idUsers= DB::table('invervals')->where('day', $d)->get();
               foreach ($idUsers as $i) {
                   $ids[] = $i->id_host;
               }
           }
        
            if(empty($ids)) {
                $users = DB::table('users')->where( 'publication','2' )->paginate(10);

                foreach ($users as $u) {
                    $total[]=$u->id;
                }
            }else{

                $idU = array_unique($ids);
                  //SE TOMAN LOS VALORES DE LAS PUBLICACIONES A SACAR-------------------------------------------------

                foreach ($idU as $i) {
                    $taken = DB::table('users')->where([
                        ['publication', '2'],
                        ['id', $i],
                    ])->first();
                   $taken1[]= $taken->id;
                   
                }
                //SE TOMAN LOS CUIDADORES PARA COMPARAR-------------------------------------------------------------------
                $users = DB::table('users')->where( 'publication','2' )->paginate(10);
                
                foreach ($users as $u) {
                   $idT[]= $u->id;
                  
                }
                //SE COMPARAN LOS DOS ARRAY Y SE TOMAN DEL PRIMERO LOS QUE NO ESTÉN EN EL SEGUNDO-------------------------
                $total = array_diff($idT, $taken1);

                
            }
            //FIN DEL SISTEMA DE FECHAS---------------------------------------------------------------------------
            

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
          

            foreach ($users as $u) {
                $results[] = $u->id;
            }


            return view::make('publicate.publications')->with(['sitters'=> $users,'files'=> $files,'pets'=> $pets,'publications'=> $publications, 'houses'=> $houses, 'tpets'=> $tpets, 'cities'=> $cities, 'results'=> $results, 'total' =>$total]);
            }else{
        
            $users = DB::table('users')->get();
            $publications =  DB::table('publications')->get(); 
            $files = DB::table('files')->get();
            $pets =  DB::table('pets')->get();
            $houses =  DB::table('houses')->get(); 
            $tpets =  DB::table('tpets')->get(); 
            $cities =  DB::table('cities')->get(); 
            

            return view::make('publicate.publications')->with(['sitters'=> $users,'files'=> $files,'pets'=> $pets,'publications'=> $publications, 'houses'=> $houses, 'tpets'=> $tpets, 'cities'=> $cities, 'results'=> $results, 'total' => $total]);  

            }
          

            }elseif($request->typepets!=0 &&  $request->cities==0){

            //SI HAY DATOS EN CAMPO MASCOTAS------------------------------------------------------------------
              $datetime1 = date_create($request->beginDate);
            $datetime2 = date_create($request->endDate);
            $fechaActual = date("Y-m-d", strtotime('now'));
            $datetime3 = date_create($fechaActual);
            if ($datetime2 == $datetime3) {
                $datetime2 =  date_create($request->beginDate);
            }
            
            $interval = date_diff($datetime1, $datetime2);
            
            $dias = $interval->format('%a');
            $i = 0;
           
            if ($datetime1 > $datetime2) {
                return back();
            }
         
            //SE LLENAN LAS FECHAS DE LA BÚSQUEDA---------------------------------------------------------------------

            while ($i <= $dias) {
                 
                $days[]= date('Y-m-d', strtotime($request->beginDate. ' + '.$i.' days'));
                $i++;
            
            }

            $reserves = DB::table('reservations')->get();

           foreach ($days as $d) {
               $idUsers= DB::table('invervals')->where('day', $d)->get();
               foreach ($idUsers as $i) {
                   $ids[] = $i->id_host;
               }
           }
        
            
            
         
           
            
            if (empty($ids)) {
                $users = DB::table('users')->where( 'publication','2' )->paginate(10);

                foreach ($users as $u) {
                    $total[]=$u->id;
                }
            }else{

                $idU = array_unique($ids);
                  //SE TOMAN LOS VALORES DE LAS PUBLICACIONES A SACAR-------------------------------------------------

                foreach ($idU as $i) {
                    $taken = DB::table('users')->where([
                        ['publication', '2'],
                        ['id', $i],
                    ])->first();
                   $taken1[]= $taken->id;
                  
                }
                //SE TOMAN LOS CUIDADORES PARA COMPARAR-------------------------------------------------------------------
                $users = DB::table('users')->where( 'publication','2' )->paginate(10);
                
                foreach ($users as $u) {
                   $idT[]= $u->id;
                  
                }
                //SE COMPARAN LOS DOS ARRAY Y SE TOMAN DEL PRIMERO LOS QUE NO ESTÉN EN EL SEGUNDO-------------------------
                $total = array_diff($idT, $taken1);

               
            }
            //FIN DEL SISTEMA DE FECHAS---------------------------------------------------------------------------
            

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
                $results[] = $u->id;
            }


            return view::make('publicate.publications')->with(['sitters'=> $users,'files'=> $files,'pets'=> $pets,'publications'=> $publications, 'houses'=> $houses, 'tpets'=> $tpets, 'cities'=> $cities, 'results'=> $results, 'total' => $total]);
        }else{
        
            $users = DB::table('users')->get();
            $publications =  DB::table('publications')->get(); 
            $files = DB::table('files')->get();
            $pets =  DB::table('pets')->get();
            $houses =  DB::table('houses')->get(); 
            $tpets =  DB::table('tpets')->get(); 
            $cities =  DB::table('cities')->get(); 
            

            return view::make('publicate.publications')->with(['sitters'=> $users,'files'=> $files,'pets'=> $pets,'publications'=> $publications, 'houses'=> $houses, 'tpets'=> $tpets, 'cities'=> $cities, 'results'=> $results, 'total' => $total]);  

        }

            }elseif ($request->typepets==0 &&  $request->cities!=0) {


            //SI HAY DATOS EN CAMPO CIUDADES------------------------------------------------------------------
            
              $datetime1 = date_create($request->beginDate);
            $datetime2 = date_create($request->endDate);
            $fechaActual = date("Y-m-d", strtotime('now'));
            $datetime3 = date_create($fechaActual);
            if ($datetime2 == $datetime3) {
                $datetime2 =  date_create($request->beginDate);
            }
            
            $interval = date_diff($datetime1, $datetime2);
            
            $dias = $interval->format('%a');
            $i = 0;
           
            if ($datetime1 > $datetime2) {
                return back();
            }
         
            //SE LLENAN LAS FECHAS DE LA BÚSQUEDA---------------------------------------------------------------------

            while ($i <= $dias) {
                 
                $days[]= date('Y-m-d', strtotime($request->beginDate. ' + '.$i.' days'));
                $i++;
            
            }

            $reserves = DB::table('reservations')->get();

           foreach ($days as $d) {
               $idUsers= DB::table('invervals')->where('day', $d)->get();
               foreach ($idUsers as $i) {
                   $ids[] = $i->id_host;
               }
           }
        
            
            
         
           
            
            if (empty($ids)) {
                $users = DB::table('users')->where( 'publication','2' )->paginate(10);

                foreach ($users as $u) {
                    $total[]=$u->id;
                }
            }else{

                $idU = array_unique($ids);
                  //SE TOMAN LOS VALORES DE LAS PUBLICACIONES A SACAR-------------------------------------------------

                foreach ($idU as $i) {
                    $taken = DB::table('users')->where([
                        ['publication', '2'],
                        ['id', $i],
                    ])->first();
                   $taken1[]= $taken->id;
                  
                }
                //SE TOMAN LOS CUIDADORES PARA COMPARAR-------------------------------------------------------------------
                $users = DB::table('users')->where( 'publication','2' )->paginate(10);
                
                foreach ($users as $u) {
                   $idT[]= $u->id;
                  
                }
                //SE COMPARAN LOS DOS ARRAY Y SE TOMAN DEL PRIMERO LOS QUE NO ESTÉN EN EL SEGUNDO-------------------------
                $total = array_diff($idT, $taken1);

               
            }
            //FIN DEL SISTEMA DE FECHAS---------------------------------------------------------------------------

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
                $results[] = $u->id;
            }


            return view::make('publicate.publications')->with(['sitters'=> $users,'files'=> $files,'pets'=> $pets,'publications'=> $publications, 'houses'=> $houses, 'tpets'=> $tpets, 'cities'=> $cities, 'results'=> $results, 'total' => $total]);
        }else{
        
            $users = DB::table('users')->get();
            $publications =  DB::table('publications')->get(); 
            $files = DB::table('files')->get();
            $pets =  DB::table('pets')->get();
            $houses =  DB::table('houses')->get(); 
            $tpets =  DB::table('tpets')->get(); 
            $cities =  DB::table('cities')->get(); 
            

            return view::make('publicate.publications')->with(['sitters'=> $users,'files'=> $files,'pets'=> $pets,'publications'=> $publications, 'houses'=> $houses, 'tpets'=> $tpets, 'cities'=> $cities, 'results'=> $results, 'total' => $total]);  

        }
            }
                                    
            }

                
              
    

    }
