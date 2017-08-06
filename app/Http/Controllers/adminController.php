<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;


class adminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $users = User::Name($request->get('name'))->Status($request->get('status'))->Gender($request->get('gender'))->Verified($request->get('verified'))->orderBy('id', 'DESC')->paginate(10);
        
        $usersV = DB::table('users')->where('verified', '1')->paginate(10);
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
