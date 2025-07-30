<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    // registers a new user
    public function register(Request $request)
    {
        $validated = $request->validate([
            'FirstName' => 'required|string',
            'LastName' => 'required|string',
            'Email' => 'required|email|unique:users,Email',
            'Password' => 'required|string|min:6',
        ]);

        $user = User::create([
            'FirstName' => $validated['FirstName'],
            'LastName' => $validated['LastName'],
            'Email' => $validated['Email'],
            'PasswordHash' => bcrypt($validated['Password']),
            'Role' => 'User',
            'Department' => null,
            'IsActive' => true,
            'ProfileImageUrl' => null,
            'LastSeenDate' => now(),
            'CreatedDate' => now(),
            'UpdatedDate' => now(),
        ]);

        return response()->json([
            'message' => 'User registered successfully!',
            'user_id' => $user->Id
        ], 201);
    }

    // lists all users
    public function index()
{
    $users = User::all();
    return response()->json($users);
}

// shows a specific user by ID
public function show($id)
{
    $user = User::find($id);

    if (!$user) {
        return response()->json(['message' => 'User not found'], 404);
    }

    return response()->json($user);
}

// updates a specific user by ID
public function update(Request $request, $id)
{
    $user = User::find($id);

    if (!$user) {
        return response()->json(['message' => 'User not found'], 404);
    }

    $user->update($request->all());

    return response()->json([
        'message' => 'User updated successfully',
        'user' => $user
    ]);
}
// deletes a specific user by ID
public function destroy($id)
{
    $user = User::find($id);

    if (!$user) {
        return response()->json(['message' => 'User not found'], 404);
    }

    $user->delete();

    return response()->json(['message' => 'User deleted successfully']);
}
}
