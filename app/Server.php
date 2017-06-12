<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Server extends Model
{

    protected $fillable = [
        "title", "description", "user_id", "project_id"
    ];

    protected $hidden = [
        "user_id", "project_id"
    ];

    public function project(){
        return $this->belongsTo(Project::class);
    }

}
