<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Database\Schema\Blueprint;
use DB;
use View;
use Schema;


class ChatContoroller extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {	
    	 $chats = DB::table('chats')->where([
		    ['user1', $request->idS],
		    ['user2', $request->idR],
		])->orWhere([
		    ['user1', $request->idR],
		    ['user2', $request->idS],
		])->count();

		if ($chats == 0) {

		$user1 = DB::table('users')->where('id', $request->idS)->first();
    	$user2 = DB::table('users')->where('id', $request->idR)->first();
		return view::make('chatLimpio')->with(['user1' => $user1, 'user2' => $user2]);

		}else{
			 //SE UBICAN LOS DATOS DEL CHAT

			 $chats = DB::table('chats')->where([
			    ['user1', $request->idS],
			    ['user2', $request->idR],
				])->orWhere([
				    ['user1', $request->idR],
				    ['user2', $request->idS],
				])->first();
		  //SE TRAEN LOS DATOS CONTENIDOS DENTRO DEL CHAT

			$chat = DB::table($chats->chat)->get();

			//SE UBICAN LOS USUARIOS DEL CHAT

			$users = DB::table('users')->where([
		    ['id', $request->idS],
		   
				])->orWhere([
				    ['id', $request->idR],
				   
				])->get();

			return view::make('chat')->with(['users' => $users, 'chat' => $chat, 'user2' => $request->idR]);
		}
      	
    }

    public function newMessage(Request $request)
    {
       
    	//SE CUENTAN LAS TABLAS CON AMBOS USUARIOS
        $chats = DB::table('chats')->where([
		    ['user1', $request->idS],
		    ['user2', $request->idR],
		])->orWhere([
		    ['user1', $request->idR],
		    ['user2', $request->idS],
		])->count();

		//SI NO HAY SE CREA LA TABLA DEL CHAT Y SE LLENA EL PRIMER MENSAJE AL ENVIARSE

		if ($chats == 0) {
			//SE CREA LA TABLA
			Schema::create('chat'.$request->idS.''.$request->idR, function (Blueprint $table) {
	            $table->increments('id');
	            $table->tinyInteger('sender_id');
	            $table->text('message');
	            $table->boolean('leido')->default(0);
	            $table->timestamps();
            });
            // SE INGRESAN LOS DATOS EN LA TABLA DE CONTROL
            DB::table('chats')
            	->insert(['chat' => 'chat'.$request->idS.''.$request->idR, 
            		'user1' => $request->idS, 
            		'user2' => $request->idR,
            	]);

            //SE INGRESAN LOS DATOS EN LA TABLA DEL CHAT
            DB::table('chat'.$request->idS.$request->idR)->insert(
			    ['sender_id' => $request->idS, 'message' => $request->message]
			);
            //SE UBICAN LOS DATOS DEL CHAT
            $chats = DB::table('chats')->where([
			    ['user1', $request->idS],
			    ['user2', $request->idR],
				])->orWhere([
				    ['user1', $request->idR],
				    ['user2', $request->idS],
				])->first();
            
            //SE TRAEN LOS DATOS CONTENIDOS DENTRO DEL CHAT

			$chat = DB::table($chats->chat)->get();

			//SE UBICAN LOS USUARIOS DEL CHAT

			$users = DB::table('users')->where([
		    ['id', $request->idS],
		   
				])->orWhere([
				    ['id', $request->idR],
				   
				])->get();

			return view::make('chat')->with(['users' => $users, 'chat' => $chat, 'user2' => $request->idR]);
       
		}else{

		//SI HAY TABLAS CON AMBOS USUARIOS	
			$chats = DB::table('chats')->where([
				    ['user1', $request->idS],
				    ['user2', $request->idR],
				])->orWhere([
				    ['user1', $request->idR],
				    ['user2', $request->idS],
				])->first();



            DB::table($chats->chat)->insert(
			    ['sender_id' => $request->idS, 'message' => $request->message]
			);

            DB::table($chats->chat)->where('sender_id', '<>', $request->idS)->update(['leido'=> 1]);

			$chat = DB::table($chats->chat)->get();

			$users = DB::table('users')->where([
		    ['id', $request->idS],
		   
				])->orWhere([
				    ['id', $request->idR],
				   
				])->get();

			return view::make('chat')->with(['users' => $users, 'chat' => $chat, 'user1' => $request->idS, 'user2' => $request->idR]);
       

			
		}
	}

	public function chats(Request $request)
    {
       
    	//SE CUENTAN LAS TABLAS CON AMBOS USUARIOS
        $chats = DB::table('chats')->where([
		    ['user1', $request->idS],
		  
		])->orWhere([
		  
		    ['user2', $request->idS],
		])->get();

		$users = DB::table('users')->get();

		return view::make('chats')->with(['users' => $users, 'chats' => $chats]);
       

			
		}
    }