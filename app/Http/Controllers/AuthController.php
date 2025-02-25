<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\src\Users\Application\Create\UserCreator;
use App\src\Users\Application\Create\UserCreatorRequest;
use App\src\Users\Infrastructure\Persistence\Eloquent\EloquentUserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'birth_date' => 'required|date',
            'gender' => 'required|string|in:male,female,custom'
        ]);

        $userCreator = new UserCreator(new EloquentUserRepository(new User));
        $userCreator(new UserCreatorRequest(
            $request->firstName,
            $request->lastName,
            $request->email,
            $request->password,
            $request->birth_date,
            $request->gender
        ));

        $user = User::where('email', $request->email)->first();
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'user' => $user,
            'token' => $token,
        ], 201);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'message' => 'Invalid login details'
            ], 401);
        }

        $user = User::where('email', $request->email)->firstOrFail();
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'user' => $user,
            'token' => $token
        ]);
    }
}
