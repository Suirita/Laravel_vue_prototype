<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;

// Welcome route
Route::get('/', function () {
    return view('welcome');
});

// Get all users
Route::get('/users/index', function () {
    $users = User::select('name', 'email')->get();
    return response()->json($users);
});

// Submit form route
Route::post('/submit-form', function (Request $request) {
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|min:8',
    ]);

    $user = User::create([
        'name' => $validated['name'],
        'email' => $validated['email'],
        'password' => Hash::make($validated['password']),
    ]);

    return response()->json([
        'name' => $user->name,
        'email' => $user->email,
    ]);
});
