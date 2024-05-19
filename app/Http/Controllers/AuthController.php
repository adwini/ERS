<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

class AuthController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(User::class, "user");
    }

    public function login(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:35|min:2',
            'password' => 'required|string',
        ]);
        $credentials = $request->only('name', 'password');

        $token = Auth::attempt($credentials);
        if (!$token) {
            return response()->json([
                'status' => 'error',
                'message' => 'Unauthorized',
            ], 401);
        }

        $user = Auth::user();

        return response()->json([
                'status' => 'success',
                'user' => $user,
                'authorisation' => [
                    'token' => $token,
                    'type' => 'bearer',
                ]
            ]);

    }

    public function register(Request $request, User $users){

        if(!Auth::check()) {
            return response()->json(['message' => 'You are not logged in!'], 403);;
        }

        if(!Gate::allows('General_manager', $users) || !Gate::allows('Manager', $users)){
            return response()->json(['message' => 'You are not an admin.'], 403);
        }
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'number' => 'required|integer|max:11',
            'no_of_tokens' => 'integer',
            'roles' => 'required|string',
            'password' => 'required|string|min:6|max:15',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'number' => $request->number,
            'no_of_tokens' =>$request->no_of_tokens,
            'roles' => $request->roles,
            'password' => Hash::make($request->password),
        ]);

        $token = Auth::login($user);
        return response()->json([
            'status' => 'success',
            'message' => 'User created successfully',
            'user' => $user,
            'authorisation' => [
                'token' => $token,
                'type' => 'bearer',
            ]
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return response()->json([
            'status' => 'success',
            'message' => 'Successfully logged out',
        ]);
    }

    public function refresh()
    {
        return response()->json([
            'status' => 'success',
            'user' => Auth::user(),
            'authorisation' => [
                'token' => Auth::refresh(),
                'type' => 'bearer',
            ]
        ]);
    }

}
