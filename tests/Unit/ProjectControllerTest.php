<?php

namespace Tests\Unit;

use App\Project;
use App\User;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProjectControllerTest extends TestCase
{

    public function setUp(){
        parent::setUp();

        Artisan::call("migrate:reset");
        Artisan::call("migrate");
        Artisan::call("db:seed");

        $this->be(User::first());
    }

    /**
     * Tests the projects route
     * @return void
     */
    public function testProjectsReturned()
    {
        $response = $this->json("GET", "api/v1/projects");

        $projects = Project::with("server")
            ->where("user_id", 1)
            ->latest()
            ->get();

        $response
            ->assertExactJson($projects->toArray());
    }

    public function testProjectCanBeCreated(){

        $project = [
            "title" => "New Project",
            "description" => "Project Description that is a long text"
        ];

        //get all projects before we add the new one
        $allBefore = json_decode($this->json("GET", "api/v1/projects")->content());

        //add the new project
        $response = $this->call("POST", "api/v1/projects", $project);

        //make sure a new one was actually added
        $allAfter = json_decode($this->json("GET", "api/v1/projects")->content());

        $response->assertJsonFragment([
            "error" => "false",
            "msg" => "Project was created"
        ]);


        $this->assertCount((count($allBefore) + 1), $allAfter);
    }

}
