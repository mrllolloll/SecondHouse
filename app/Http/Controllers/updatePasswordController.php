<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class updatePasswordController extends Controller
{
    /*
     * Ensure the user is signed in to access this page
     */
    public function __construct() {

        $this->middleware('auth');

    }

    /**
     * Update the password for the user.
     *
     * @param  Request  $request
     * @return Response
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'old' => 'required',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = User::find(Auth::id());
        $hashedPassword = $user->password;
        //dd($hashedPassword);
        if (Hash::check($request->old, $hashedPassword)) {
            //Change the password
            $user->fill([
                'password' => Hash::make($request->password)
            ])->save();

            $request->session()->flash('success', 'Su contraseña ha sido cambiada.');

            return back();
        }

        $request->session()->flash('failure', 'Su contraseña no ha sido cambiada.');

        return view('profile');
	}
}