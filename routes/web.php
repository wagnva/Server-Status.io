<?php

//todo add actual homepage
Route::get("/", function(){
    return redirect()->route("dashboard");
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get("/dashboard", "DashboardController@index")->name("dashboard");

/*
 * **************************************
 *  Routes consumed by the Vuejs frontend
 * **************************************
 */

Route::group(["prefix" => "api/v1"], function(){

    /*
     * All the project related routes
     */
    Route::group(["prefix" => "projects"], function(){
        Route::get("/", "ProjectController@index");
        Route::post("/", "ProjectController@store");

        Route::get("/{project}/server", "ServerController@index");
    });

});
