<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Symfony\Component\Console\Output\ConsoleOutput;

class TestBroadcast extends Command{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'broadcast:test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Tests the broadcast of events to the frontend through socket.io';

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
    public function handle(){
        $output = new ConsoleOutput();
        $output->writeln("Testing the Broadcast of events...");

        event(new \App\Events\TestEvent());
    }
}
