<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
/**
 * Run the database seeds.
 *
 * @return void
 */
public function run()
{
	static $password;
    DB::table('users')->insert([
        
	    	'first_name' => 'Admin',
	        'last_name' => 'Uno',
	        'n_id' => '25440332',
	        't_id' => '1',
	        'DOB' => '1995-10-12',
	        'email' => 'test1@gmail.com',
	        'cellphone' => '2021565',
	        'gender' => '1',
	        'id_city' => '1',
	        'address' => 'awiod awodij',
	        'level' => '3',
	        'status' => '2',
	        'verified' => '1',
	        'password' => $password ?: $password = bcrypt('12345678'),
	        'remember_token' => str_random(10)

    ]);

    DB::table('users')->insert([
        
	    	'first_name' => 'Admin',
	        'last_name' => 'Dos',
	        'n_id' => '25440333',
	        't_id' => '1',
	        'DOB' => '1995-10-12',
	        'email' => 'test2@gmail.com',
	        'cellphone' => '2023565',
	        'gender' => '1',
	        'id_city' => '1',
	        'address' => 'awiod awodij',
	        'level' => '3',
	        'status' => '2',
	        'verified' => '1',
	        'password' => $password ?: $password = bcrypt('12345678'),
	        'remember_token' => str_random(10)

    ]);
}
}
