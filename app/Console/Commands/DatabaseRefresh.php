<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Config;
use Artisan;
use Storage;
class DatabaseRefresh extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sqlite:refresh {--seed=true}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Refreshes the sqlite database file';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        if(!Config::get("database.default")=="sqlite")
        {
            $this->error("The default database driver is not Sqlite. Please check your config/database.php file!");
            return false;          
        }
        $this->info("Renewing the database file");
        $dbFile = Config::get("database.connections.sqlite.database");
        
        $this->info("Database file location : {$dbFile}");
        
        $handle = fopen($dbFile,"w");//clear the file by opening it on write, which clears the files content
        fclose($handle);
        
        $this->info("Installing migrations....");
        Artisan::call("migrate");
        
        if($this->option("seed")){
            $this->info("Running some seeding...");
            Artisan::call("db:seed");
        }
        
        $this->info("Finished !");
        
    }
}
