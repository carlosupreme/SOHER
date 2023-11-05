<?php

namespace App\Http\Controllers;

use App\Models\User;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Laravel\Fortify\Rules\Password;

class AuthApiController extends Controller
{
    public function create(Request $request)
    {
        try {
            Validator::make($request->input(), [
                'name' => ['required', 'string', 'max:255'],
                'phone' => ['required', 'numeric', 'digits:10'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', new Password, 'confirmed'],
            ])->validate();
        } catch (ValidationException $exception) {
            return response()->json(['statusText' => $exception->getMessage()], 400);
        }

        $user = User::create([
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        $user->assignRole('client');

        return response()->json([
            'status' => true,
            'statusText' => 'User created successfully',
            'token' => $user->createToken('API TOKEN')->plainTextToken
        ], 201);
    }

    public function login(Request $request)
    {
        try {
            Validator::make($request->input(), [
                'email' => ['required', 'string', 'email', 'max:255'],
                'password' => ['required', 'string'],
            ])->validate();
        } catch (ValidationException $exception) {
            return response()->json(['statusText' => $exception->getMessage()], 400);
        }

        if(!Auth::attempt($request->only('email', 'password'))){
            return response()->json(['statusText' => 'Bad Credentials'], 401);
        }

        $user = User::where('email', $request->input('email'))->first();

        return response()->json([
           'status' => true,
           'statusText' => 'User logged succesfully',
           'data' => $user,
           'token' => $user->createToken('API TOKEN')->plainTextToken
        ]);
    }

    public function logout()
    {
        Auth::user()->tokens->each->delete();
        return response()->json(['statusText' => 'User logged out succesfully']);
    }
}
