<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{

    public function __construct(){
        $this->middleware(["auth"]);
    }

    /**
     * Returns all routes for the authenticated user
     * @return mixed
     */
    public function index(){
        return Project::with("server", "server.statuses")
            ->where("user_id", Auth::user()->id)
            ->latest()
            ->get();
    }

    /**
     * Creates a new project
     * @return array
     */
    public function store(){

        $this->validate(request(), [
            "title" => "required",
            "description" => "required"
        ]);

        $project = auth()->user()->newProject(
            new Project(request(["title", "description"]))
        );

        return [
            "error" => "false",
            "msg" => "Project was created",
            "data" => $project
        ];
    }
}
