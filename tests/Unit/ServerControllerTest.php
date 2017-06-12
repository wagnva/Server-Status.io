<?php

namespace Tests\Unit;

use App\Project;
use App\User;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ServerControllerTest extends TestCase
{

    public function setUp(){
        parent::setUp();

        Artisan::call("migrate:reset");
        Artisan::call("migrate");
        Artisan::call("db:seed");

        $this->be(User::first());
    }

    public function testServerReturned(){
        $response = $this->json("GET", "api/v1/projects/1/server");

        $servers = Project::find(1)->server()->get();

        $response
            ->assertExactJson($servers->toArray());
    }

}
