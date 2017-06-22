<?php

namespace App\Console\Commands;

use App\Events\ServerStatusChangeEvent;
use App\Server;
use App\ServerStatus;
use Illuminate\Console\Command;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Output\ConsoleOutput;

class ServerCheck extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'server:check {time}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Takes care of checking the server, by sending a request to the ping nodejs server";

    /**
     * Create a new command instance.
     *
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     */
    public function handle(){
        $time = $this->argument("time");

        $this->info("Finding all server with timeBetweenRepeats = $time");

        $server = Server::where("timeBetweenRepeats", $time)->get();
        $count = count($server);

        $this->info("  > " . $count . " Server where found");

        $bar = $this->output->createProgressBar($count);
        $bar->start();

        //go through every server
        foreach($server as $item){

            //get their new status
            //todo implement actually getting their status
            sleep(1);

            //save the status
            $status = $item->newStatus(
                factory(ServerStatus::class, 1)->make([
                    "server_id" => $item->id,
                    "user_id" => $item->user_id
                ])->first()
            );

            //tell the client
            event(new ServerStatusChangeEvent($status));

            //update the progress bar
            $bar->advance();
        }

        $bar->finish();
        $bar->clear();
        $this->info("  > All server were checked successfully");
    }
}
