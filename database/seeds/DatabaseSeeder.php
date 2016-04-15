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


    }

}
class FileTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        File::unguard();
        DB::table('files')->delete();
        Storage::drive()->deleteDirectory("/app/user_data");//storage empty
        $this->createFiles(User::find(1));
        $this->createFiles(User::find(3));
        $this->createFiles(User::find(2));
        File::reguard();
    }
    protected function createFiles($user)
    {



        //dd($user);
        //$this->info("Creating files");

        Storage::drive()->makeDirectory("tmp/");

        $repo = FileRepository::instanceForUser($user);
        $dir = new \App\Directory();
        $dir->path="/";
        $dir->owner()->associate($user);

        $dir->save();
        //$dir->parent()->associate($dir);//associate the parent to this directory, since it's the root
        //$dir->save();
        $repo->makeDirectory($dir->path);

        $files = factory(App\File::class,5)->make()->each(function(File $f) use ($user,$repo,$dir){
            //dd($f->folder()->getResults()->owner()->getResults()->toArray());
            /*$f->owner()->associate($user);
            $path = $repo->buildPath($f->full_path);

            $f->storage_path = $path;*/
            $folder = $f->folder()->getResults();
            $folder->owner()->associate($user);
            $folder->parent()->associate($dir);
            $folder->save();
            $f->owner()->associate($user);
            $f->save();
            //dd(["./tmp/".$f->filename,$f->path]);

            $filename = "seeding/fixtures/{$f->filename}";
            $repo->copy($filename,$f->path);//just use the repository, to verify if it works correctly
        });
        $file = new File();
        $file->filename = "something.jpg";
        $file->folder()->associate($dir);
        $file->owner()->associate($user);
        $file->save();
        $repo->copy("seeding/fixtures/image.jpg",$file->path);

    }
}
class CalendarTableSeeder extends Seeder{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Calendar::unguard();
        CalendarEvent::unguard();
        DB::table("calendar_events")->delete();
        DB::table("calendars")->delete();
        $user = User::find(1);
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
        CalendarEvent::reguard();
        Calendar::reguard();
    }
}
class ContactTableSeeder extends Seeder{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::find(1);
        Contact::unguard();
        //$this->info("Creating contacts");
        $contacts = factory(Contact::class,5)->make()->each(function(Contact $c) use ($user){
            $c->owner()->associate($user);
            $c->save();
        });
        //$contacts->each(function($c){$c->save();});
        //factory(Contact::class,10)->create();
        Contact::reguard();
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
        $this->call(FileTableSeeder::class);
        $this->call(CalendarTableSeeder::class);
        $this->call(ContactTableSeeder::class);

    }
}
