<?php

use Illuminate\Database\Seeder;

class CitiesSeedes extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       	DB::table('cities')->insert([
        
	    	'city' => 'bogota',
	       
    	]);
    	DB::table('cities')->insert([
        
	    	'city' => 'cartagena',
	       
    	]);
    	DB::table('cities')->insert([
        
	    	'city' => 'medellin',
	       
    	]);
    	DB::table('cities')->insert([
        
	    	'city' => 'cucuta',
	       
    	]);
    	DB::table('cities')->insert([
        
	    	'city' => 'pereira',
	       
    	]);
    	
    }
}
