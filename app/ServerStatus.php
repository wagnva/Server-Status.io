<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServerStatus extends Model
{

    protected $fillable = [
        "user_id", "server_id", "status"
    ];

    protected $hidden = [
        "user_id"
    ];

    public function server(){
        return $this->belongsTo(Server::class);
    }

}
