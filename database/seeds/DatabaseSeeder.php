<?php

use App\Calendar;

use App\Contact;
use Illuminate\Database\Seeder;
use App\User;

//use Bouncer;
use App\File;
use App\CalendarEvent;
use App\Api\Repositories\FileRepository;
class UserTableSeeder extends Seeder {

    public function run()
    {
        /*
         * User creation
         */
        //$this->info("Creating users");
        DB::table('users')->delete();
        User::unguard();
        $user = User::create(array('id'=>"1",'email' => 'thomas.ricci@cpnv.ch',"username"=>"Admin","password"=>bcrypt("Password")));
        Bouncer::assign("admin")->to($user);
        User::reguard();

        /*
         * File creation
         */
        //$this->info("Creating files");
        Storage::drive()->deleteDirectory("app/user_data");//storage empty
        Storage::drive()->makeDirectory("tmp/");
        $repo = FileRepository::instance($user);

        $files = factory(App\File::class,5)->make()->each(function(File $f) use ($user,$repo){
            $f->owner()->associate($user);
            $path = $repo->buildPath($f->full_path);

            $f->storage_path = $path;
            $f->save();
            $repo->copy("/tmp/".$f->filename,$f->full_path);
        });
        $files = $files->merge(factory(App\File::class,5)->make()->each(function(File $f) use ($repo){
            $f->save();
            $user = $f->owner()->getResults();
            $repo->setUser($user);
            $repo->copy("/tmp/".$f->filename,$f->full_path);
        }));

        Storage::drive()->deleteDirectory("tmp/");


        //$this->info("Creating calendar");
        $calendar = new Calendar();
        $calendar->title = "My awesome new calendar";
        $calendar->owner()->associate($user);
        $calendar->save();
        //create some events
        $events = factory(CalendarEvent::class, 5)->make()->each(function(CalendarEvent $e) use ($calendar){
            $e->calendar()->associate($calendar);
            //var_dump($e);
            $e->save();
        });
        //$events->each(function($e){$e->save();});
        //factory(CalendarEvent::class,10)->create();
        /*
         * Contact creation
         */
        //$this->info("Creating contacts");
        $contacts = factory(Contact::class,5)->make()->each(function(Contact $c) use ($user){
            $c->owner()->associate($user);
            $c->save();
        });
        //$contacts->each(function($c){$c->save();});
        //factory(Contact::class,10)->create();


        /*
         * Roles and permissions
         *
         * register bouncers seeder permissions
         */
        //$this->info("Creating roles and access");


    }

}
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ACLSeeder::class);
        $this->call(UserTableSeeder::class);
    }
}
