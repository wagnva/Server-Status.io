<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(Schema::hasTable("servers")){return;}

        Schema::create('servers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("user_id");
            $table->integer("project_id");
            $table->string("title");
            $table->string("description");
            $table->string("address"); //the ip or domain of the server
            $table->integer("timeBetweenRepeats"); //time between every servercheck in minutes
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('servers');
    }
}
