<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Server extends Model
{

    protected $fillable = [
        "title", "description", "user_id", "project_id", "address", "timeBetweenRepeats"
    ];

    protected $hidden = [
        "user_id", "project_id"
    ];

    public function project(){
        return $this->belongsTo(Project::class);
    }

    public function statuses(){
        return $this->hasMany(ServerStatus::class);
    }

    /**
     * Returns the last status, so the current status of the server
     * @return ServerStatus the last status
     */
    public function currentStatus(){
        return $this->statuses()->get()->last();
    }

    /**
     * Saves the status
     * @param ServerStatus $status
     * @return ServerStatus returns the added status
     */
    public function newStatus(ServerStatus $status){
        $this->statuses()->save($status);
        return $status;
    }

}
