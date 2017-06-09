<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{

    protected $fillable = [
        "title", "description", "user_id"
    ];

    protected $hidden = [
        "user_id"
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

}
