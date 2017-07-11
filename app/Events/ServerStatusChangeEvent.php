<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ServerStatusChangeEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $currentStatus;
    public $forServer;
    private $userID;

    /**
     * Create a new event instance.
     *
     * @param $id The ID of the server
     */
    public function __construct($newStatus)
    {
        $this->userID = $newStatus->user_id;
        $this->currentStatus = $newStatus;
        $this->forServer = $newStatus->server_id;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        $id = $this->userID;
        return new PrivateChannel("App.User.$id");
    }
}
