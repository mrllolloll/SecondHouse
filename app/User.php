<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use DB;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name','last_name',  'n_id', 't_id', 'DOB', 'cellphone', 'gender', 'id_city', 'address', 'email', 'password', 'url_user', 'url_front','url_back'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];



    public static function boot(){
        parent::boot();

        static::creating(function ($user){
            $user->token = str_random(40);
        }

        
        );
    }

    public function hasVerified(){
        $this->verified = true;
        $this->token = null;
        $this->save();     
    }

    public function scopeName($query, $name)
    {
        if (trim($name) != "") {
            $query->where(\DB::raw("CONCAT(first_name, ' ', last_name)"), "LIKE", "%$name%");
        }
        
    }

    public function scopeStatus($query, $status)
    {
        $stati = ['0','1','2'];

        if ($status != "" && isset($stati[$status])) 
        {
            $query->where('status', $status);   
        }
        
    }

    public function scopeVerified($query, $verified)
    {
        $verifieds = ['0','1'];

        if ($verified != "" && isset($verifieds[$verified])) 
        {
            $query->where('verified', $verified);   
        }
        
    }

    public function scopeGender($query, $gender)
    {

        $genders = ['0','1','2'];
        
    
        if ($gender != "" && isset($genders[$gender])) 
        {
            $query->where('gender', $gender);   
        }
        
    }
    public function scopeLevel($query, $level)
    {


        $levels = ['0','1','2','3'];

        if ($level != "" && isset($levels[$level])) 
        {
            $query->where('level', $level);   
        }
        
    }



}