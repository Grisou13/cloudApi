<?php

namespace App\Console\Commands;

use App\Utils\Proc;
use Illuminate\Console\Command;

class Gulp extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'gulp {--task=default}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run gulp from php artisan';

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
        $cwd=base_path();
        $descriptorspec = array(
            0 => array("pipe", "r"),
            1 => array("pipe", "w"),
            2 => array("pipe", "w")
        );

        $process = new Proc("node node_modules/gulp/bin/gulp.js {$this->option("task")}", $descriptorspec, $cwd);
        /*while($f = fgets($process->pipe(1))){
            $this->info($f);
            $this->info("prout");
            if($f == "")
                break;
        }
        while($f = fgets($process->pipe(2))){
            $this->error($f);
            $this->info("prout");
        }*/
        $this->info("getting content");
        $this->info(stream_get_contents($process->pipe(1)));
        $this->info("gonna clean up soon");
        fclose($process->pipe(1));
        fclose($process->pipe(2));
        $this->info("closing up");
        return  $process->close();
    }
}
