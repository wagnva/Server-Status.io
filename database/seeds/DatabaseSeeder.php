<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //create a test user
        $user = \App\User::create([
            "name" => "test",
            "email" => "test@test.com",
            "password" => bcrypt("password")
        ]);

        //create test projects
        $posts = factory(\App\Project::class, 5)->create([
            "user_id" => $user->id
        ]);

        //create server for each project
        foreach($posts as $post){
            factory(\App\Server::class, 2)->create([
                "user_id" => $user->id,
                "project_id" => $post->id
            ]);
        }
    }
}
