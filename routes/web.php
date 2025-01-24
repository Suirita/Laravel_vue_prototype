<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

// Route::get('/{vue_capture?}', function () {
//     return view('welcome');
// })->where('vue_capture', '[\/\w\.-]*');

Route::get('/', function () {
    return view('welcome');
});

Route::post ('/submit-form', function (Request $request) {
    
    return response()->json([
        'name' => $request->name,
        'email' => $request->email,
    ]);
});
