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
     * The list of server nodes, that can be used to check a client's server status.
     * @var array
     */
    private $nodes = [
        ["name" => "local", "address" => "localhost:8001"]
    ];

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
            $response = $this->request($this->nodes[0], $item);

            //save the status
            $status = $item->newStatus(
                new ServerStatus([
                    "server_id" => $item->id,
                    "user_id" => $item->user_id,
                    "status" => $response
                ])
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


    /**
     * Makes a POST request to the $node server, requesting the new status of the server
     * @param $node array the server, that the request gets send to
     * @param $server \App\Server information of the server
     * @return string the response from the server
     */
    private function request(array $node, Server $server){
        $url = $node["address"] . "/check";
        $ch = curl_init();

        //url
        curl_setopt($ch, CURLOPT_URL, $url);
        //POST
        curl_setopt($ch, CURLOPT_POST, 1);
        //args
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(array('address' => $server->address)));
        //receive server response
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);

        curl_close($ch);

        return $response;
    }
}
