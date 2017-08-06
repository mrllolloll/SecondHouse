<?php

use Illuminate\Database\Seeder;

class tPetsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tpets')->insert([
          	'type' => 'Perro',
	    ]);
	    DB::table('tpets')->insert([
          	'type' => 'Gato',
	    ]);
	    DB::table('tpets')->insert([
          	'type' => 'Hamster',
	    ]);
	    DB::table('tpets')->insert([
          	'type' => 'Pez',
	    ]);
	    DB::table('tpets')->insert([
          	'type' => 'Serpiente',
	    ]);
	    DB::table('tpets')->insert([
          	'type' => 'Reptil',
	    ]);
	    DB::table('tpets')->insert([
          	'type' => 'Otro',
	    ]);
    }
}
