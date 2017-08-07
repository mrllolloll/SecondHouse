<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use Storage;
use Carbon\Carbon;
use View;


class UsersController extends Controller

{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (isset($request->editInfo)){
            $user =  DB::table('users')->where('id', $request->idEdit);
            return view('edits.editInformation')->with(['user'=> $user]);
        }
        if (isset($request->editEmail)){
            $user =  DB::table('users')->where('id', $request->idEdit);
            return view('edits.editEmail')->with(['user'=> $user]);
        }
        if (isset($request->editPassword)){
            $user =  DB::table('users')->where('id', $request->idEdit);
            return view('edits.editPassword')->with(['user'=> $user]);
        }
         if (isset($request->profilePic)){
            $user =  DB::table('users')->where('id', $request->idEdit);
            return view('edits.editPC')->with(['user'=> $user]);
        }
         if (isset($request->uploadId)){
            $user =  DB::table('users')->where('id', $request->idEdit);
            return view('edits.editID')->with(['user'=> $user]);
        }
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
    public function show($id)
    {
        $users = User::findOrFail($id);
        if ($users->publication==1) {
            
            $publication =  DB::table('publications')->where('id_user', $id)->first(); 
            $files = DB::table('files')->where('id_publication', $publication->id)->get();
            $pets =  DB::table('pets')->where('id_publication', $id)->get();
            $users =  DB::table('users')->where('id', $id)->first(); 
            $houses =  DB::table('houses')->get(); 
            $tpets =  DB::table('tpets')->get(); 

        
        
            return view::make('profile')->with(['user'=> $users,'files'=> $files,'pets'=> $pets,'publication'=> $publication, 'houses'=> $houses, 'tpets'=> $tpets]);
        }elseif($users->publication==2){
            
            $publication =  DB::table('publications')->where('id_user', $id)->first(); 
            $files = DB::table('files')->where('id_publication', $publication->id)->get();
            $pets =  DB::table('pets')->where('id_publication', $id)->get();
            $users =  DB::table('users')->where('id', $id)->first(); 
            $houses =  DB::table('houses')->get(); 
            $tpets =  DB::table('tpets')->get(); 

        
        
            return view::make('profile')->with(['user'=> $users,'files'=> $files,'pets'=> $pets,'publication'=> $publication, 'houses'=> $houses, 'tpets'=> $tpets]);
        }else{
            $users =  DB::table('users')->where('id', $id)->first(); 
            return view::make('profile')->with(['user'=> $users]);
        }



       
        //return view('profile')->with(['user'=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
       

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
        //ACTUALIZAR INFORMACION-----------------------------------------------------------------------------------------
        if ($request->identifier ==1) {
           
            $user = DB::table('users')->where('id', $id)->first();

            DB::table('users')
            ->where('id', $id)
            ->update(['first_name' => $request->first_name, 'last_name' => $request->last_name,
                't_id'=> $request->t_id,'n_id'=> $request->n_id,'gender' => $request->gender,'DOB' => $request->DOB,'cellphone' => $request->cellphone,'address' => $request->address, ]);

            if ($request->id_city != " ") {
                
            }else{
                  DB::table('users')
                    ->where('id', $id)
                    ->update(['id_city' => $request->id_city]);
            }

              $files = DB::table('files')->get();
                $publication =  DB::table('publications')->where('id_user', $id)->first(); 
                if (empty($publication)) {
                   $publication =  DB::table('publications')->where('id_user', $id)->first(); 
                  $houses =  DB::table('houses')->get(); 
                  $tpets =  DB::table('tpets')->get(); 
                  $pets =  DB::table('pets')->where('id_publication', $publication->id)->get();

                  $pets =  DB::table('pets')->where('id_publication', $publication->id)->get();
                    return view::make('profile')->with(['user'=> $user,'files'=> $files,'publication'=> $publication, 'houses'=> $houses, 'tpets'=> $tpets, 'pets'=> $pets]);
                }else{
                    $publication =  DB::table('publications')->where('id_user', $id)->first(); 
                   $houses =  DB::table('houses')->get(); 
                   $tpets =  DB::table('tpets')->get(); 

                 
                   $pets =  DB::table('pets')->where('id_publication', $publication->id)->get();
                    return view::make('profile')->with(['user'=> $user,'files'=> $files,'publication'=> $publication, 'houses'=> $houses, 'tpets'=> $tpets, 'pets'=> $pets]);
                }
        }
        //CAMBIAR EMAIL -----------------------------------------------------------------------------

        if ($request->identifier ==2) {
           
          if ($request->email == $request->Cemail) {
              
            $userE = DB::table('users')->where('email', $request->email)->first();

            if (empty($userE)) {
                
                DB::table('users')
                    ->where('id', $id)
                    ->update(['email' => $request->email]);
                    $user =  DB::table('users')->where('id', $id)->first(); 
                    $files = DB::table('files')->get();
                    $publication =  DB::table('publications')->where('id_user', $id)->first(); 
                   if (empty($publication)) {
                   $publication =  DB::table('publications')->where('id_user', $id)->first(); 
                    $houses =  DB::table('houses')->get(); 
                    $tpets =  DB::table('tpets')->get(); 
                    $pets =  DB::table('pets')->where('id_publication', $publication->id)->get();

                  return view::make('profile')->with(['user'=> $user,'files'=> $files,'publication'=> $publication, 'houses'=> $houses, 'tpets'=> $tpets, 'pets' => $pets]);
                }else{
                  
                  $publication =  DB::table('publications')->where('id_user', $id)->first(); 
                   $houses =  DB::table('houses')->get(); 
                   $tpets =  DB::table('tpets')->get(); 

                    
                   $pets =  DB::table('pets')->where('id_publication', $publication->id)->get();
                    
                  return view::make('profile')->with(['user'=> $user,'files'=> $files,'publication'=> $publication, 'houses'=> $houses, 'tpets'=> $tpets]);
                }
            }else{
               return back()->with('status1', 'El correo suministrado ya se encuentra registrado');
            }

          }else{
                
                return back()->with('status1', 'Los correos suministrados no coinciden');
          }
        }

        
        //Imágenes de perfil---------------------------------------------------------------------
        if ($request->identifier ==4) {
            
            $user = User::findOrFail($id);        
            

            $img = $request->file('url_user');
            $file_route = time().'_'.$img->getClientOriginalName();

            if (substr($file_route, -3)== "jpg" || substr($file_route, -3)=="png" || substr($file_route, -4)=="jepg" || substr($file_route, -3)=="gif") {

                Storage::disk('imgusers')->put($file_route, file_get_contents($img->getRealPath() ) );

                    $user->url_user = $file_route;
                   
                    DB::table('users')
                            ->where('id', $id)
                            ->update(['url_user' =>  $user->url_user]);

                $files = DB::table('files')->get();
                $publication =  DB::table('publications')->where('id_user', $id)->first(); 
                if (empty($publication)) {
                   $publication =  DB::table('publications')->where('id_user', $id)->first(); 
                  $houses =  DB::table('houses')->get(); 
                  $tpets =  DB::table('tpets')->get(); 

                  return view::make('profile')->with(['user'=> $user,'files'=> $files,'publication'=> $publication, 'houses'=> $houses, 'tpets'=> $tpets]);
                }else{
                    $publication =  DB::table('publications')->where('id_user', $id)->first(); 
                   $houses =  DB::table('houses')->get(); 
                   $tpets =  DB::table('tpets')->get(); 
                   $pets =  DB::table('pets')->where('id_publication', $publication->id)->get();
                    return view::make('profile')->with(['user'=> $user,'files'=> $files,'publication'=> $publication, 'houses'=> $houses, 'tpets'=> $tpets, 'pets'=> $pets]);
                }
               
                
        
        
              
                            
                 }else{   
                    return view('edits.editPC')->with('status1', 'El formato es incompatible');
            }
           
       
        }
        //ACTUALIZAR IMÁGENES DE ID----------------------------------------------------------------------------------

         if ($request->identifier ==5) {
            
            $user = User::findOrFail($id);        
            

            $img1 = $request->file('url_front');
            $img2 = $request->file('url_back');


            $file_route1 = time().'_'.$img1->getClientOriginalName();

            $file_route2 = time().'_'.$img2->getClientOriginalName();

            
            if (substr($file_route1, -3)== "jpg" || substr($file_route1, -3)=="png" || substr($file_route1, -4)=="jpeg") {
                if (substr($file_route2, -3)== "jpg" || substr($file_route2, -3)=="png" || substr($file_route2, -4)=="jpeg"){
                    Storage::disk('imgid')->put($file_route1, file_get_contents($img1->getRealPath() ) );         
                    Storage::disk('imgid')->put($file_route2, file_get_contents($img2->getRealPath() ) );
                    DB::table('users')
                                ->where('id', $id)
                                ->update(['url_front' => $file_route1]);
                    DB::table('users')
                                ->where('id', $id)
                                ->update(['url_back' => $file_route2]);   
                    
                      $files = DB::table('files')->get();
                $publication =  DB::table('publications')->where('id_user', $id)->first(); 
               if (empty($publication)) {
                   $publication =  DB::table('publications')->where('id_user', $id)->first(); 
                  $houses =  DB::table('houses')->get(); 
                  $tpets =  DB::table('tpets')->get(); 

                  return view::make('profile')->with(['user'=> $user,'files'=> $files,'publication'=> $publication, 'houses'=> $houses, 'tpets'=> $tpets]);
                }else{
                    $publication =  DB::table('publications')->where('id_user', $id)->first(); 
                   $houses =  DB::table('houses')->get(); 
                   $tpets =  DB::table('tpets')->get(); 

                 
                   $pets =  DB::table('pets')->where('id_publication', $publication->id)->get();
                    return view::make('profile')->with(['user'=> $user,'files'=> $files,'publication'=> $publication, 'houses'=> $houses, 'tpets'=> $tpets]);
                }
                }else{
                    return view('edits.editPC')->with('status1', 'El formato es incompatible');
                }
              }else{
                    return view('edits.editPC')->with('status1', 'El formato es incompatible');
            }
       
        }
//BORRAR FOTO DE PERFIL
        if (isset($request->deletePC)) {
                
                DB::table('users')
                    ->where('id', $id)
                    ->update(['url_user' => 'NULL']);

                $user = User::findOrFail($id);        
                $files = DB::table('files')->get();
                $publication =  DB::table('publications')->where('id_user', $id)->first(); 
                $pets =  DB::table('pets')->where('id_publication', $publication->id)->get();
                $houses =  DB::table('houses')->get(); 
                $tpets =  DB::table('tpets')->get(); 

        
        
                return view::make('profile')->with(['user'=> $user,'files'=> $files,'pets'=> $pets,'publication'=> $publication, 'houses'=> $houses, 'tpets'=> $tpets]);    
        }
        

    }



    public function destroy(Request $request, $id)
    {

        
    }
}
