<?php

use Illuminate\Database\Seeder;

class HousesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('houses')->insert([
          	'type' => 'Casa',
	    ]);
	    DB::table('houses')->insert([
          	'type' => 'Departamento',
	    ]);
	    DB::table('houses')->insert([
          	'type' => 'Quinta',
	    ]);
	    
    }
}
