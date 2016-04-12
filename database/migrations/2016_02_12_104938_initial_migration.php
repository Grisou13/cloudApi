<?php

use Carbon\Carbon;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InitialMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calendar_events', function (Blueprint $table) {
            //ids...
            $table->increments('id');
            $table->uuid("uid");
            //$table->integer("owner_id")->unsigned();
            $table->integer("calendar_id")->unsigned();
            //table data
            $table->string("summary");
            $table->string("description")->nullable();
            $table->string("location")->nullable();
            $table->dateTime("start_date");
            $table->dateTime("end_date");
            $table->string("status")->default("ACCEPTED");

            //times...
            $table->timestamps();
            $table->softDeletes();
            //foreign key stuff
            //$table->foreign("owner_id")->references("id")->on("users");
            $table->foreign("calendar_id")->references("id")->on("calendars");
        });
        Schema::create('calendars', function (Blueprint $table) {
            //ids...
            $table->increments('id');
            $table->integer("owner_id")->unsigned();
            //table data
            $table->string("title");
            //times...
            $table->timestamps();
            $table->softDeletes();
            //foreign key stuff
            $table->foreign("owner_id")->references("id")->on("users");
        });
        Schema::create('contacts', function (Blueprint $table) {
            //ids...
            $table->increments('id');
            $table->integer("owner_id")->unsigned();
            //table data
            $table->string("name");
            $table->string("photo")->nullable();
            $table->json("emails")->nullable();
            $table->json("addresses")->nullable();
            $table->json("phoneNumbers")->nullable();
            $table->string("company")->nullable();
            $table->string("job_title")->nullable();
            //times...
            $table->timestamps();
            $table->softDeletes();
            //foreign key stuff
            $table->foreign("owner_id")->references("id")->on("users");
        });
        Schema::create('files', function (Blueprint $table) {
            //ids...
            $table->increments('id');
            $table->integer("owner_id")->unsigned();
            $table->integer("directory_id")->unsigned();
            //table data
            $table->string("storage")->default("local");
            $table->string("filename");
            //$table->string("storage_path");
            //times...
            $table->timestamps();
            $table->softDeletes();
            //foreign key stuff
            $table->foreign("owner_id")->references("id")->on("users");
            $table->foreign("directory_id")->references("id")->on("directories");
        });
        Schema::create("directories_files",function(Blueprint $table){
            $table->integer("directory_id")->unsigned();
            $table->integer("file_id")->unsigned();
            $table->foreign("file_id")->references("id")->on("files");
            $table->foreign("directory_id")->references("id")->on("directories");
        });
        Schema::create('directories', function (Blueprint $table) {
            //ids...
            $table->increments('id');
            $table->integer("owner_id")->unsigned();
            //table data
            $table->text("path");
            $table->string("storage_path");
            //times...
            $table->timestamps();
            $table->softDeletes();
            //foreign key stuff
            $table->foreign("owner_id")->references("id")->on("users");
        });
        Schema::create('shares', function (Blueprint $table) {
            $table->increments('id');
            $table->morphs("shareable");
            $table->integer("owner_id")->unsigned();
            //times...
            $table->timestamps();
            $table->softDeletes();
            //foreign key stuff
            $table->foreign("owner_id")->references("id")->on("users");
        });
        Schema::create("share_links",function (Blueprint $table) {
            $table->text('url')->index();
            $table->string("token")->index();
            $table->time("expires");//->default(Carbon::createFromTime(24)->minute);//a link expires in a day...configurable by the user
            $table->integer("share_id")->unsigned();
            //times...
            $table->timestamp("created_at");
            //foreign key stuff
            $table->foreign("share_id")->references("id")->on("shares");
        });
        Schema::create('user_share', function (Blueprint $table) {
            //$table->integer("access_id")->unsigned();
            $table->integer("user_id")->unsigned();
            $table->integer("share_id")->unsigned();
            //foreign key stuff
            $table->foreign("user_id")->references("id")->on("users")->onDelete("cascade")->onUpdate("cascade");
            $table->foreign("share_id")->references("id")->on("shares")->onDelete("cascade")->onUpdate("cascade");
            $table->foreign("role_id")->references("id")->on("roles");
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("user_share");
        Schema::dropIfExists("shares");
        Schema::dropIfExists("files");
        Schema::dropIfExists("events");
        Schema::dropIfExists("calendars");
        Schema::dropIfExists("contacts");
    }
}
