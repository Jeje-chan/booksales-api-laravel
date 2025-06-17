<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function register(Request $request)
{
    $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|min:8',
        'role' => 'required|in:admin,customer', // tambahkan validasi role
    ]);

    if ($validator->fails()) {
        return response()->json([
            'success' => false,
            'message' => 'Validation failed',
            'errors' => $validator->errors(),
        ], 422);
    }

    // Buat user dan simpan ke variabel $user
    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'role' => $request->role,
    ]);

    if ($user) {
        return response()->json([
            'success' => true,
            'message' => 'User registered successfully',
            'data' => $user,
        ], 200);
    }

    return response()->json([
        'success' => false,
        'message' => 'User registration failed',
    ], 409);
}

    public function login(Request $request){
    // 1. setup validator
    $validator = Validator::make($request->all(), [
        'email' => 'required|email',
        'password' => 'required',
    ]);
    // 2. cek validator
    if ($validator->fails()) {
        return response()->json([
            'success' => false,
            'message' => 'Validation failed',
            'errors' => $validator->errors(),
        ], 422);
    }
    // 3. get krudensial postman
    $credentials = $request->only('email', 'password');

    // 4. cek isFailed
    if (!$token = JWTAuth::attempt($credentials)) {
    return response()->json([
        'success' => false,
        'message' => 'Invalid credentials',
    ], 401);
}

// Ambil user yang sedang login
$user = JWTAuth::user();

return response()->json([
    'token' => $token,
    'user' => [
        'id' => $user->id,
        'name' => $user->name,
        'email' => $user->email,
        'role' => $user->role,
    ]
]);
}
 public function listUsers()
    {
        $users = User::all();
        return response()->json([
            'success' => true,
            'users' => $users
        ]);
    }

    public function logout()
{
    try {
        $token = JWTAuth::getToken();

        if (!$token) {
            return response()->json([
                'success' => false,
                'message' => 'Token not provided'
            ], 400);
        }

        JWTAuth::invalidate($token);

        return response()->json([
            'success' => true,
            'message' => 'Logout successful'
        ], 200);

    } catch (TokenExpiredException $e) {
        return response()->json([
            'success' => false,
            'message' => 'Token already expired'
        ], 401);
    } catch (TokenInvalidException $e) {
        return response()->json([
            'success' => false,
            'message' => 'Token invalid'
        ], 401);
    } catch (JWTException $e) {
        return response()->json([
            'success' => false,
            'message' => 'Failed to logout: '.$e->getMessage()
        ],500);
    }
}

}
