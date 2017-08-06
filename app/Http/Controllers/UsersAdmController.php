<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
class UsersAdmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        //Modal de confirmación
        DB::table('users')->where('id', $id)->delete();

        $files = DB::table('files')->get();
        $pets =  DB::table('pets')->get();
        $publication =  DB::table('publications')->get(); 
        $houses =  DB::table('houses')->get(); 
        $tpets =  DB::table('tpets')->get(); 
        
        return back()->with(['users'=> $user,'files'=> $files,'pets'=> $pets,'publication'=> $publication, 'houses'=> $houses, 'tpets'=> $tpets]);
        
    }
}
