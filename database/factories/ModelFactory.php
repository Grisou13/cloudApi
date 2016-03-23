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
    $filename = $faker->image(storage_path("tmp/"),$fullPath=false);
    return [
        "filepath"=>"/{$faker->word}/".basename($filename),
        "owner_id"=>factory(User::class)->create()->id,
        "storage_path"=>function($file){
            $user = User::find($file["owner_id"]);
            $repo = FileRepository::instance($user);
            return $repo->buildPath($file["filepath"]);
        }
    ];
});

$factory->define(App\Contact::class,function(Faker\Generator $faker){
    return [
        "name"=>$faker->name,
        "photo"=>$faker->imageUrl(),
        "emails"=>function(Faker\Generator $faker){
            $emails = new \StdClass();
            $emails->work = $faker->companyEmail;
            $emails->private = $faker->email;
            return $emails;
        },
        "addresses"=>function(Faker\Generator $faker){
            $addr = new \StdClass();
            $addr->work = $faker->address;
            $addr->private = $faker->address;
            return $addr;
        },
        "phoneNumbers"=>function(Faker\Generator $faker){
            $phone = new \StdClass();
            $phone->work = $faker->phoneNumber;
            $phone->private = $faker->phoneNumber;
            return $phone;
        },
        "company"=>$faker->company,
        "job_title"=>$faker->title,
        "owner_id"=>factory(User::class)->create()->id,
    ];
});