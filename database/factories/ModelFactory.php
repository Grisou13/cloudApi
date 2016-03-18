<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

use App\Api\Repositories\FileRepository;
use App\Calendar;
use App\User;
use App\Event;

$factory->define(User::class, function (Faker\Generator $faker) {
    return [
        'username' => $faker->name,
        'email' => $faker->email,
        'password' => bcrypt("Password"),
        'remember_token' => str_random(10),
    ];
});
/*$factory->defineAs(User::class,"admin",function(Faker\Generator $faker) use ($factory){
    $user = $factory->raw(User::class);
    return array_merge($user,["id"=>"1"]);
});*/
$factory->define(Event::class,function(Faker\Generator $faker){
    return [
        "summary"=>$faker->sentence,
        "location"=>$faker->address,
        "start_date"=>$faker->dateTimeBetween("-20 days","-1 hour"),
        "end_date"=>$faker->dateTimeBetween("now","+20 days")
    ];
});
$factory->define(App\File::class,function(Faker\Generator $faker){
    $file = $faker->image(storage_path("tmp/"));
    return [
        "filename"=>$file,
        "folder"=>"/", //put all generated files at the root of the users directory
        "owner_id"=>factory(User::class)->create()->id,
        "storage_path"=>function($file){
            $user = User::find($file["owner_id"]);
            $repo = FileRepository::instance($user);
            return $repo->buildPath($file["folder"].basename($file["filename"]));
        }
    ];
});

$factory->define(App\Contact::class,function(Faker\Generator $faker){
    return [

    ];
});