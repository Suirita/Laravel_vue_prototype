<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\User;

// Route::get('/{vue_capture?}', function () {
//     return view('welcome');
// })->where('vue_capture', '[\/\w\.-]*');

Route::get('/', function () {
    return view('welcome');
});

Route::post('/submit-form', function (Request $request) {
    $request->validate([
        'name' => 'required|string',
        'email' => 'required|email',
        'password' => 'required|string',
    ]);

    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => $request->password,
    ]);

    return response()->json([
        'name' => $request->name,
        'email' => $request->email,
        'password' => $request->password,
    ]);
});
