<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function projects(){
        return $this->hasMany(Project::class);
    }

    /**
     * Creates a new project for this user
     * @param Project $project
     * @return Project returns the added project
     */
    public function newProject(Project $project){
        $this->projects()->save($project);
        return $project;
    }
}
