<?php

namespace App\Http\Controllers\Api;
use Illuminate\Auth\Events\Registered;
use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request){
        $data=$request->validate([
            'name' => 'required|string|min:3',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|max:20',
            'confirmPassword' => 'required|same:password',
            'profileImg' => 'required|image|mimes:jpg,jpeg,png',
            'nationalId' => 'required|unique:users|digits_between:14,14',
            'gender' =>'required|in:male,female',
            'address' =>'required',
            'phone'=>'required|unique:users|digits_between:11,11',
            'type' =>'required|in:business,client',
        ]);
        $img=$request->file('profileImg')->store('images/client');
        $file_name = $request->file('profileImg')->getClientOriginalName();
        $user=User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'profileImg' =>$file_name,
            'gender' => $data['gender'],
            'nationalId'=> $data['nationalId'],
            'address'=> $data['address'],
            'phone'=> $data['phone'],
            'type'=>$data['type']
        ]);
        $token = $user->createToken('BusinessFounderProjectTokenLogin')->plainTextToken;
        // sending mail to registered user
        $response=[
            'user'=>$user,
            'token'=>$token,
        ];

        event(new Registered($user));
        return response($response,201);
    }

    public function logout(){
        auth()->user()->tokens()->delete();
        return response(['message'=>'logged out successfully']);
    }


    public function login(Request $request){
        $data=$request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6|max:20',
        ]);
        $user = User::where('email', $data['email'])->first();

        if (! $user || ! Hash::check($data['password'], $user->password)) {
            return response(['message'=> 'Invalid credentials'],401);
        }
        else{
            $token = $user->createToken('BusinessFounderProjectTokenLogin')->plainTextToken;
            $user->update(["last_login" => Carbon::now()->toDateTimeString()]);
            $response=[
                'user'=>$user,
                'token'=>$token,
            ];
            return response($response,200);
        }

    }

}
