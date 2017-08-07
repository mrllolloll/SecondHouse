<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
class UsersAdmController extends Controller
{
    public function index(Request $request)
    {   


        $users = User::Name($request->get('name'))
                        ->Status($request->get('status'))
                        ->Verified($request->get('verified'))
                        ->Level($request->get('level'))
                        ->Gender($request->get('gender'))
                        ->orderBy('id', 'DESC')
                        ->paginate(10);

        $files = DB::table('files')->get();
        $pets =  DB::table('pets')->get();
        $publication =  DB::table('publications')->get(); 
        $houses =  DB::table('houses')->get(); 
        $tpets =  DB::table('tpets')->get(); 
        
        return view('administration.adminPanel')->with(['users'=> $users,'files'=> $files,'pets'=> $pets,'publication'=> $publication, 'houses'=> $houses, 'tpets'=> $tpets]);
      
    }

    public function create()
    {
        
    }

    public function store(Request $request)
    {
        
    }

   
    public function show($id)
    {

    }

  
    public function edit($id)
    {
    
    //verificar usuario------------------------------------------------------------------------------------
    
    extract($_GET);
    DB::table('users')
            ->where('id', $id)
            ->update(['status' => 2, 'level' => 2]);
    
    $usuarios = User::orderBy('id', 'DESC')->paginate(10);
    $files = DB::table('files')->get();
    $pets =  DB::table('pets')->get();
    $publication =  DB::table('publications')->get(); 
    $houses =  DB::table('houses')->get(); 
    $tpets =  DB::table('tpets')->get(); 
    
    return back()->with(['users'=> $usuarios,'files'=> $files,'pets'=> $pets,'publication'=> $publication, 'houses'=> $houses, 'tpets'=> $tpets]);
    }

    public function update(Request $request, $id)
    {   

        //HACER ADMINISTRADOR ------------------------------------------------------------------
        if (isset($request->MAdmin)) {
            $user = User::findOrFail($id);

            DB::table('users')
            ->where('id', $id)
            ->update(['level' => 3]);
            
            $usuarios = User::orderBy('id', 'DESC')->paginate(10);
            $files = DB::table('files')->get();
            $pets =  DB::table('pets')->get();
            $publication =  DB::table('publications')->get(); 
            $houses =  DB::table('houses')->get(); 
            $tpets =  DB::table('tpets')->get(); 
        
            return back()->with(['users'=> $usuarios,'files'=> $files,'pets'=> $pets,'publication'=> $publication, 'houses'=> $houses, 'tpets'=> $tpets]);
        }

        //ELIMINAR ADMINISTRADOR ------------------------------------------------------------------------
        if (isset($request->QAdmin)) {
           
           $user = User::findOrFail($id);

            DB::table('users')
            ->where('id', $id)
            ->update(['level' => 2]);
    
            $usuarios = User::orderBy('id', 'DESC')->paginate(10); 
            $files = DB::table('files')->get();
            $pets =  DB::table('pets')->get();
            $publication =  DB::table('publications')->get(); 
            $houses =  DB::table('houses')->get(); 
            $tpets =  DB::table('tpets')->get(); 
            
            return back()->with(['users'=> $usuarios,'files'=> $files,'pets'=> $pets,'publication'=> $publication, 'houses'=> $houses, 'tpets'=> $tpets]);
        }

        //BANEAR DEL SITIO A UN USUARIO--------------------------------------------------------------------------
        if (isset($request->Ban)) {
           $user = User::findOrFail($id);

            DB::table('users')
            ->where('id', $id)
            ->update(['status' => 1, 'level' => 1]);
    
            $usuarios = User::orderBy('id', 'DESC')->paginate(10);
            $files = DB::table('files')->get();
            $pets =  DB::table('pets')->get();
            $publication =  DB::table('publications')->get(); 
            $houses =  DB::table('houses')->get(); 
            $tpets =  DB::table('tpets')->get(); 
            
            return back()->with(['users'=> $user,'files'=> $files,'pets'=> $pets,'publication'=> $publication, 'houses'=> $houses, 'tpets'=> $tpets]);
        }
    }

   
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        //Modal de confirmación
        DB::table('users')->where('id', $id)->delete();
        DB::table('publications')->where('id_user', $id)->delete();

        $files = DB::table('files')->get();
        $pets =  DB::table('pets')->get();
        $publication =  DB::table('publications')->get(); 
        $houses =  DB::table('houses')->get(); 
        $tpets =  DB::table('tpets')->get(); 
        
        return back()->with(['users'=> $user,'files'=> $files,'pets'=> $pets,'publication'=> $publication, 'houses'=> $houses, 'tpets'=> $tpets]);
        
    }
}
