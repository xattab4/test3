<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request; 
use App\Http\Controllers\Controller; 
use Illuminate\Support\Facades\Auth; 

use App\User; 

use Hash;
use Validator;

class AuthController extends Controller 
{

    public function register(Request $request) 
    {    
        $validator = Validator::make($request->all(), [ 
            'name' => 'required',
            'email' => 'required|email|allowed_domain',
            'password' => 'required',  
            'password_confirmation' => 'required|same:password', 
        ]);   

        if ($validator->fails()) {          
            return response()->json(['error' => $validator->errors()], 401);        
        }    

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $success['token'] =  $user->createToken('AppName')->accessToken;

        return response()->json(['success' => $success], 201); 
    }


    public function login(Request $request)
    { 
        $validator = Validator::make($request->all(), [ 
            'email' => 'required|email|allowed_domain',
            'password' => 'required',  
        ]);  

        if ($validator->fails()) {          
            return response()->json(['error' => $validator->errors()], 401);        
        }   
        
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])) { 
            $user = Auth::user(); 
            $success['token'] =  $user->createToken('AppName')->accessToken; 

            return response()->json(['success' => $success], 200); 
        } else { 
            return response()->json(['error' => 'Unauthorised'], 401); 
        } 
    }

    public function user() 
    {
        $user = Auth::user();

        return response()->json(['success' => $user], 200); 
    }

    public function logout()
    { 
        if (Auth::check()) {
            Auth::user()->AauthAcessToken()->delete();
        }

        return response()->json(['success' => 'logged out'], 200); 
    }
} 