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
use App\CalendarEvent;

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'username' => $faker->name,
        'email' => $faker->email,
        'password' => bcrypt("Password"),
        'remember_token' => str_random(10),
    ];
});

/*
 *
 * Files
 *
 */
$factory->define(App\Directory::class,function(Faker\Generator $faker){
    return [
        "owner_id"=>factory(User::class)->create()->id,
        "path"=>"/".$faker->word,
        "parent_id"=>"1",

    ];
});

$factory->define(App\File::class,function(Faker\Generator $faker){
    $filename = "seeding/fixtures/image.jpg";
    $path = basename($filename);

    return [
        "filename"=>$path,
        "folder_id"=>factory(\App\Directory::class)->create()->id,
        "owner_id"=>function($file){
            return \App\Directory::find($file["folder_id"])->owner()->getResults();
        }

    ];
});

/*
 *
 * Calendar stuff
 *
 */
$factory->define(App\CalendarEvent::class,function(Faker\Generator $faker){
    return [
        "uid"=>\Webpatser\Uuid\Uuid::generate(),
        "summary"=>$faker->sentence,
        "description"=>$faker->paragraph(2),
        "location"=>$faker->address,
        "start_date"=>$faker->dateTimeBetween("-20 days","-1 hour"),
        "end_date"=>$faker->dateTimeBetween("now","+20 days"),
        //"calendar_id"=>factory(Calendar::class)->create()->id,
        "status"=>"ACCEPTED"
    ];
});

$factory->define(App\Calendar::class,function(Faker\Generator $faker) {
    return [
        "title"=>$faker->words(5),
        "owner_id"=>factory(User::class)->create()->id
    ];
});

/*
 *
 * Contact
 *
 *
 */
$factory->define(App\Contact::class,function(Faker\Generator $faker){
    return [
        "name"=>$faker->name,
        "photo"=>$faker->imageUrl(),
        "emails"=>function() use ($faker){
            $emails = new \StdClass();
            $emails->work = $faker->companyEmail;
            $emails->private = $faker->email;
            return $emails;
        },
        "addresses"=>function() use ($faker){
            $addr = new \StdClass();
            $addr->work = $faker->address;
            $addr->private = $faker->address;
            return $addr;
        },
        "phoneNumbers"=>function() use ($faker){
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
