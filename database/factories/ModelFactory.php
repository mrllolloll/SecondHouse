<?php



/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;
   
    return [
        'first_name' => $faker->firstname,
        'last_name' => $faker->lastname,
        'n_id' => $faker->unique()->numberBetween($min = 1, $max = 100),
        't_id' => $faker->numberBetween($min = 1, $max = 3),
        'DOB' => '1995-10-12',
        'email' => $faker->unique()->safeEmail,
        'cellphone' => $faker->unique()->numberBetween($min = 10000000, $max = 10000100),
        'gender' => '1',
        'id_city' => $faker->numberBetween($min = 1, $max = 5),
        'address' => 'awiod awodij',
        'level' => $faker->numberBetween($min = 1, $max = 3),
        'status' => $faker->numberBetween($min = 1, $max = 2),
        'verified' => $faker->numberBetween($min = 0, $max = 1),
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];



});