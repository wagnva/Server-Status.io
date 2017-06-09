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

        $projects = Project::where("user_id", 1)
            ->latest()->get();

        $response
            ->assertExactJson($projects->toArray());
    }
}
