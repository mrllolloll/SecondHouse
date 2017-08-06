<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ConfirmationEmail;
use Storage;

use Illuminate\Auth\Events\Registered;


class RegisterController extends Controller
{
    

    use RegistersUsers;

   
    protected $redirectTo = '/home';

   
    public function __construct()
    {
        $this->middleware('guest');
    }

  
    protected function validator(array $data)
    {


        return Validator::make($data, [
            'first_name' => 'required|max:50',
            'last_name' => 'required|max:50',
            'email' => 'required|email|max:255|unique:users|confirmed',
            'n_id' => 'required|max:20',
            't_id' => 'required',
            'DOB' => 'required|date|',
            'cellphone' => 'required|max:20',
            'gender' => 'required',
            'id_city' => 'required',
            'address' => 'required|max:500',
            'password' => 'required|min:8|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */

    protected function create(array $data)
    {

        $img = $data['url_user'];
        $file_route = time().'_'.$img->getClientOriginalName();
        $img1=$data['url_front'];
        $file_route1 = time().'_'.$img1->getClientOriginalName();
        $img2=$data['url_back'];
        $file_route2 = time().'_'.$img2->getClientOriginalName();

        if (substr($file_route, -3)== "jpg" || substr($file_route, -3)=="png" || substr($file_route, -4)=="jpeg") {
            if (substr($file_route1, -3)== "jpg" || substr($file_route1, -3)=="png" || substr($file_route1, -4)=="jpeg") {
                if(substr($file_route2, -3)== "jpg" || substr($file_route2, -3)=="png" || substr($file_route2, -4)=="jpeg"){

                    Storage::disk('imgusers')->put($file_route, file_get_contents($img->getRealPath() ) );
                    Storage::disk('imgid')->put($file_route1, file_get_contents($img1->getRealPath() ) );
                    Storage::disk('imgid')->put($file_route2, file_get_contents($img2->getRealPath() ) );
                   
                
                        return User::create([
                            'first_name' => $data['first_name'],
                            'last_name' => $data['last_name'],
                            'email' => $data['email'],
                            'n_id' => $data['n_id'],
                            't_id'=> $data['t_id'],
                            'DOB' => $data['DOB'],
                            'cellphone' => $data['cellphone'],
                            'gender' => $data['gender'],
                            'id_city' => $data['id_city'],
                            'address' => $data['address'],
                            'password' => bcrypt($data['password']),
                            'url_user' => $file_route,
                            'url_front' => $file_route1,
                            'url_back' => $file_route2
                        
                        ]); 
                    }else{
                        return back();
                    }
                }else{
                
                    return back();}
            }else{
                return back();
            }
       
        }
    

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        Mail::to($user->email)->send(new ConfirmationEmail($user));

        return view('auth.register2')->with('status', 'Por favor confirme su dirección de correo electrónico.');
    }

   

    public function confirmEmail($token){
        User::whereToken($token)->firstOrFail()->hasVerified();
        return redirect('login')->with('status', 'Ya se ha confirmado el correo electrónico, debe esperar la verificación de los datos por parte del equipo para poder ingresar.');
    }
}
