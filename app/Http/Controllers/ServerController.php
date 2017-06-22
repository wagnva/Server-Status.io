<?php

namespace App\Http\Controllers;

use App\Project;
use App\Server;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Integer;

class ServerController extends Controller
{

    public function __construct(){
        $this->middleware(["auth"]);
    }

    public function index($id){

        $server = $project->server()->with("statuses")->get();

        return $server;
    }

}
