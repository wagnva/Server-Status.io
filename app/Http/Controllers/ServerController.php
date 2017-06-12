<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Integer;

class ServerController extends Controller
{

    public function __construct(){
        $this->middleware(["auth"]);
    }

    public function index(Project $project){
        $server = $project->server()->get();

        return $server;
    }

}
