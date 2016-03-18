<?php

use App\Calendar;

use Illuminate\Database\Seeder;
use App\User;

//use Bouncer;
use App\File;
use App\Event;
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
        User::reguard();
        factory(User::class, 2)->create();//just create more users
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
        $events = factory(Event::class, 50)->make()->each(function(Event $e) use ($calendar){
            $e->calendar()->associate($calendar);
            $e->save();
        });
        //$events->each(function($e){$e->save();});

        /*
         * Contact creation
         */
        //$this->info("Creating contacts");
        /*$contacts = factory(\App\Contact::class)->make()->each(function($c) use ($user){
            $c->owner()->associate($user);
        });
        $contacts->each(function($c){$c->save();});*/

        /*
         * Roles and permissions
         *
         * register bouncers seeder permissions
         */
        //$this->info("Creating roles and access");
        Bouncer::seeder(function () use ($user){
            Bouncer::allow('admin')->to(['update-user','show-user', 'delete-user',"change-password-user","view-all-users"]);
            Bouncer::allow('admin')->to(['update-file','show-file', 'delete-file',"view-all-users"]);

            Bouncer::assign("admin")->to($user);

            Bouncer::allow('user')->to('view-files');
            Bouncer::allow("share-owner")->to(["share","read","delete","write","ownership"]);
            Bouncer::allow("share-participant")->to(["read","share"]);
            Bouncer::allow("share-editor")->to(["read","share","write"]);
            Bouncer::allow("share-viewer")->to(["read"]);
            Bouncer::allow("share-full")->to(["share","read","delete","write"]);
        });
        Bouncer::seed();//actually call the seeder

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
         $this->call(UserTableSeeder::class);

/*         DB::table("share_access")->delete();
        ShareAccess::unguard();
        ShareAccess::create(['name'=>"owner","allows"=>"read|write|delete|share"]);
        ShareAccess::create(['name'=>"participant","allows"=>"read|share"]);
        ShareAccess::create(['name'=>"editor","allows"=>"read|write|share"]);
        ShareAccess::create(['name'=>"full","allows"=>"read|write|execute|share"]);
        ShareAccess::reguard();*/
    }
}
