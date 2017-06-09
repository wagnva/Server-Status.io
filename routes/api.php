<?php

use Illuminate\Http\Request;


//todo remove/refactor later
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});





