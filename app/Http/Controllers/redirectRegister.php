<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use View;

class redirectRegister extends Controller
{
	public function index(Request $request){

		if ($request->email ==$request->email_confirmation) {
			if ($request->password == $request->password_confirmation) {

				

				return view::make('auth.registerp1')->with(['first_name'=> $request->first_name,'last_name'=> $request->last_name,'t_id'=> $request->t_id, 'n_id'=> $request->n_id, 'gender'=> $request->gender, 'DOB'=> $request->DOB, 'cellphone'=> $request->cellphone,'id_city'=> $request->id_city,'address'=> $request->address,'email'=> $request->email,'password'=> $request->password]);
				
				
			}else{
				return back();
			}
		}else{
			return back();
		}

		
	}    
}
