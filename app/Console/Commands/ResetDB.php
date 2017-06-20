<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Artisan;
use Symfony\Component\Console\Output\ConsoleOutput;

class ResetDB extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:reset';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Completely resets the db, reruns the migrations and seeds it';

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
        $this->warn("This command will drop all user data, and delete everything");
        $this->warn("Do not run this command in a production environment");

        if(App::environment("prod")){
            $this->warn("");
            $this->error("-------------------------------------");
            $this->warn("The environment is set to production!");
            $this->error("-------------------------------------");
        }

        if($this->confirm("Are you sure you want to continue? ")){
            if($this->confirm("Really, really sure?")){

                Artisan::call("migrate:reset");
                Artisan::call("migrate");
                Artisan::call("db:seed");

                $this->info("The Database was reset successfully");
            }
        }
    }
}
