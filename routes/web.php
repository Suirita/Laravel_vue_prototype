<?php

use Illuminate\Support\Facades\Route;

// Route::get('/{vue_capture?}', function () {
//     return view('welcome');
// })->where('vue_capture', '[\/\w\.-]*');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    return response()->json(['message' => 'Hello World']);
});
