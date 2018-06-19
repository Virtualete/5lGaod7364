<?php

use Faker\Generator as Faker;
use Carbon\Carbon;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    static $password;
    $carbon=new Carbon();
    $hash=bin2hex(random_bytes(8));
    return [
        'username' => preg_replace('/\./','_',preg_replace('/\s+/','',substr($faker->unique()->name,0,16))),
        'password' => bcrypt($hash),
        'email' => $faker->unique()->safeEmail,
        'date_of_birth' => $carbon->subYears(3)->format('Y-m-d'),
        'confirmation_token' => $hash,
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Friend::class, function () {
    $carbon=new Carbon();
    do {
        $rand1=mt_rand(1,100);
        $rand2=mt_rand(1,100);
    } while ($rand1===$rand2);
    return [
        'user_id' => $rand1,
        'friend_id' => $rand2,
        'created_at' => $carbon->format('Y-m-d H:i:s'),
    ];
});

$factory->define(App\Message::class, function (Faker $faker) {
    $carbon=new Carbon();
    do {
        $rand1=mt_rand(1,100);
        $rand2=mt_rand(1,100);
    } while ($rand1===$rand2);
    return [
        'transmitter_id' => $rand1,
        'receiver_id' => $rand2,
        'text' => $faker->text(mt_rand(256,1024)),
        'created_at' => $carbon->format('Y-m-d H:i:s'),
    ];
});
