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

    public function index(){
        return Project::where("user_id", Auth::user()->id)
            ->latest()
            ->get();
    }
}
