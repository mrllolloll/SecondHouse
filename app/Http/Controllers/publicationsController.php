<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Storage;
use App\Publication;
use App\User;
use View;
class publicationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    $users = DB::table('users')->get();
    $publication =  DB::table('publications')->get(); 
    $files = DB::table('files')->get();
    $pets =  DB::table('pets')->get();
    $houses =  DB::table('houses')->get(); 
    $tpets =  DB::table('tpets')->get(); 
    $cities =  DB::table('cities')->get(); 

    return view::make('home')->with(['user'=> $users,'files'=> $files,'pets'=> $pets,'publication'=> $publication, 'houses'=> $houses, 'tpets'=> $tpets, 'cities'=> $cities]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {  
        if (isset($request->createPublic)) {
            $user = DB::table('users')->where('id', $request->id)->first();
            $houses = DB::table('houses')->get();
            $tpets = DB::table('tpets')->get();
            return view('publicate.createPublication')->with(['user' => $user, 'houses'=>$houses, 'tpets' => $tpets]);
        }

        if (isset($request->filesUP)) {
            
            return view('publicate.uploadFiles');  
        }

       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            //SUBIR IMAGENES NUEVAS AL ANUNCIO -------------------------------------------------------------------------
        if (isset($request->upfiles)) {
           
            $file = $request->file('file');
           
            $file_route = time().'_'.$file->getClientOriginalName();
            $ext=substr($file_route, -3);
              
            
            if ($ext== "jpg" || $ext=="png") {

                $publication = DB::table('publications')->where('id_user', $request->idUser)->first();
                $cant = DB::table('files')->where('id_publication', $publication->id)->count();
                if ($cant < 5) {
                    Storage::disk('imgfiles')->put($file_route, file_get_contents($file->getRealPath() ) );
                
                    DB::table('files')
                    ->insert(['type' => 1, 'extension' => $ext, 'url_file' => $file_route, 'id_publication' =>  $publication->id]);

                }else{
                    $users = DB::table('users')->where('id', $request->idUser)->first();
                 
                $files = DB::table('files')->where('id_publication', $publication->id)->get();
                $pets =  DB::table('pets')->where('id_publication', $publication->id)->get();
                $houses =  DB::table('houses')->get(); 
                $tpets =  DB::table('tpets')->get(); 

        
        
                return view::make('profile')->with(['user'=> $users,'files'=> $files,'pets'=> $pets,'publication'=> $publication, 'houses'=> $houses, 'tpets'=> $tpets]);
                }
               


                 
               
                $users = DB::table('users')->where('id', $request->idUser)->first();
                 
                $files = DB::table('files')->where('id_publication', $publication->id)->get();
                $pets =  DB::table('pets')->where('id_publication', $publication->id)->get();
                $houses =  DB::table('houses')->get(); 
                $tpets =  DB::table('tpets')->get(); 

        
        
                return view::make('profile')->with(['user'=> $users,'files'=> $files,'pets'=> $pets,'publication'=> $publication, 'houses'=> $houses, 'tpets'=> $tpets]);

            }else{
                return back();
            }
            


        }else{


        //CREACION DE NUEVAS PUBLICACIONES------------------------------------------------------------------------------- 

        $img1 = $request->file('url_user');
        $file_route1 = time().'_'.$img1->getClientOriginalName();

        if (substr($file_route1, -3)== "jpg" || substr($file_route1, -3)=="png") {
            
            $user = DB::table('users')->where('id', $request->idUser)->first();

            if (substr($file_route1, -3)== "jpg") {
               $ext=substr($file_route1, -3);
            }elseif (substr($file_route1, -3)=="png") {
                $ext=substr($file_route1, -3);
            }elseif (substr($file_route1, -4)=="jpeg"){
                $ext=substr($file_route1, -4);
            }

           
            $idPublication = DB::table('publications')->insertGetId([
                'id_user' => $user->id,
                'title'=> $request->title,
                'description'=> $request->description,
                'price'=>$request->cost,
                'id_house'=>$request->house,
                'url_file'=>$file_route1,
                
            ]);
            
            foreach ($request->tpets as $tp) {
               
                DB::table('pets')->insert([
                'id_publication'=> $idPublication,
                'id_user'=> $user->id,
                'id_pet'=> $tp,
                ]);
            }
            
            Storage::disk('imgfiles')->put($file_route1, file_get_contents($img1->getRealPath() ) );
            
           


            DB::table('users')->where('id', $request->idUser)->update([
                'publication'=> '1',
                
                ]);
               
                   
                $users = DB::table('users')->where('id', $user->id)->first();
                $publication =  DB::table('publications')->where('id_user',$user->id)->first(); 
                $files = DB::table('files')->where('id_publication', $publication->id)->get();
                $pets =  DB::table('pets')->where('id_publication', $publication->id)->get();
                
                $houses =  DB::table('houses')->get(); 
                $tpets =  DB::table('tpets')->get(); 

        
        
                return view::make('profile')->with(['user'=> $users,'files'=> $files,'pets'=> $pets,'publication'=> $publication, 'houses'=> $houses, 'tpets'=> $tpets]);
        }else{
            }

       
         return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
    
    extract($_GET);
    
    if (isset($subir)) {   
        return view('publicate.uploadFiles');
    }

    if (isset($editar)) {

        $user = DB::table('users')->where('id', $idUser)->first();
        $houses = DB::table('houses')->get();
        $tpets = DB::table('tpets')->get();
        $pets = DB::table('pets')->get();
        $publication = DB::table('publications')->get();
        
            return view('edits.editPublication')->with(['user' => $user, 'houses'=>$houses, 'tpets' => $tpets,'publication' => $publication, 'pets' => $pets]);
    }
    //VERIFICAR ANUNCIOS-----------------------------------------------------------------------------------------
    if (isset($idV)) {
        
        DB::table('publications')
        ->where('id', $id)
        ->update(['verified' => 1]);
    
        $usuarios = User::orderBy('id', 'DESC')->paginate(10);
        $files = DB::table('files')->get();
        $pets =  DB::table('pets')->get();
        $publication =  DB::table('publications')->get(); 
        $houses =  DB::table('houses')->get(); 
        $tpets =  DB::table('tpets')->get(); 
    
    return back()->with(['users'=> $usuarios,'files'=> $files,'pets'=> $pets,'publication'=> $publication, 'houses'=> $houses, 'tpets'=> $tpets]);
       
    }
    //OCULTAR ANUNCIOS-----------------------------------------------------------------------------------------
    if (isset($banPub)) {
        
        DB::table('publications')
        ->where('id', $id)
        ->update(['verified' => 0]);
    
        $usuarios = User::orderBy('id', 'DESC')->paginate(10);
        $files = DB::table('files')->get();
        $pets =  DB::table('pets')->get();
        $publication =  DB::table('publications')->get(); 
        $houses =  DB::table('houses')->get(); 
        $tpets =  DB::table('tpets')->get(); 
    
    return back()->with(['users'=> $usuarios,'files'=> $files,'pets'=> $pets,'publication'=> $publication, 'houses'=> $houses, 'tpets'=> $tpets]);
       
    }
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
        //------------------------------------------- ACTUALIZAR INFORMACIÓN DE ANUNCIO----------------------------- ----------------------------------------
        if (isset($request->updateInfo)) {
            

            if (empty($request->tpets)) {
              
            }else{
                DB::table('pets')->where('id_publication', $id)->delete();
                
                foreach ($request->tpets as $tp) {
                    DB::table('pets')->insert([
                    'id_publication'=> $id,
                    'id_user'=> $request->idUser,
                    'id_pet'=> $tp,
                    ]);
                }
            }

            
            if (empty($request->file)) {
               
            }else{
                $file = $request->file('file');
                $file_route = time().'_'.$file->getClientOriginalName();

                $ext=substr($file_route, -3);
                if ($ext== "jpg" || $ext=="png"){
                    
                   
                    
                   
           
                    Storage::disk('imgfiles')->put($file_route, file_get_contents($file->getRealPath() ) );
                
                    DB::table('publications')->where('id', $id)
                    ->update(['url_file' =>  $file_route]);

                }else{
                    return back();
                }

                
            }
                
            DB::table('publications')->where('id', $id)
                ->update(['title' => $request->title]);

            DB::table('publications')->where('id', $id)
                ->update(['description' => $request->description]);

            DB::table('publications')->where('id', $id)
                ->update(['id_house' => $request->house]);

            DB::table('publications')->where('id', $id)
                ->update(['price' => $request->cost]);
            

        $users = DB::table('users')->where('id', $request->idUser)->first();
        $files = DB::table('files')->where('id_publication', $id)->get();
        $pets =  DB::table('pets')->where('id_publication', $id)->get();
        $publication =  DB::table('publications')->where('id_user', $request->idUser)->first(); 
        $houses =  DB::table('houses')->get(); 
        $tpets =  DB::table('tpets')->get(); 

        
        
        return view::make('profile')->with(['user'=> $users,'files'=> $files,'pets'=> $pets,'publication'=> $publication, 'houses'=> $houses, 'tpets'=> $tpets]);
           
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if(isset($request->deletePicture)){
        
        DB::table('files')->where('id', $id)->delete();

        $users = DB::table('users')->where('id', $request->idUser)->first();
        $files = DB::table('files')->where('id_publication', $id)->get();
        $pets =  DB::table('pets')->where('id_publication', $id)->get();
        $publication =  DB::table('publications')->where('id_user', $request->idUser)->first(); 
        $houses =  DB::table('houses')->get(); 
        $tpets =  DB::table('tpets')->get(); 

        
        
        return view::make('profile')->with(['user'=> $users,'files'=> $files,'pets'=> $pets,'publication'=> $publication, 'houses'=> $houses, 'tpets'=> $tpets]);
        }
    }
}
