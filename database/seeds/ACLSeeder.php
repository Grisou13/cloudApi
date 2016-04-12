<?php

use Illuminate\Database\Seeder;

class ACLSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Bouncer::seeder(function (){

            Bouncer::allow('admin')->to(['update-user','show-user', 'delete-user',"change-password-user","create-user"]);
            Bouncer::allow('admin')->to(['update-file','show-file', 'delete-file',"view-all-users"]);

            Bouncer::allow('admin')->to(['update-others-shares',"update-others-files","update-others-contacts","update-others-calendars","update-other-users"]);
            Bouncer::allow('admin')->to(['view-others-shares',"view-others-files","view-others-contacts","view-others-calendars","view-others-calendar","view-all-users"]);


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
