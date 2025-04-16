<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class UserAuthController extends Controller
{
    //

    public function login(Request $request){
        $user = User::where('email',$request->email)->first();
        if(!$user || !hash::check($request->password,$user->password)){
            return ['status'=>false,'message'=>'user not found'];
        } 

        $token['token'] = $user->createToken('myapp')->plainTextToken;
        $name['name'] = $user->name;
        return ['token'=>$token,'name'=>$name];
    }

    public function signup(Request $request){
        $input = $request->all();
        $input["password"]= bcrypt($input["password"]);
        $user = User::create($input);
        $token ['token'] = $user->createToken('myapp')->plainTextToken;
        $name['name']=$user->name;
        return ['success'=>$token,'name'=>$name];
    }
}
