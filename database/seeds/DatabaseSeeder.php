<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        $this->call(AdminSeeder::class);
        $this->call(tPetsSeeder::class);
        $this->call(HousesSeeder::class);
        $this->call(CitiesSeedes::class);
    	factory(App\User::class, 100)->create();
        
    }
}
