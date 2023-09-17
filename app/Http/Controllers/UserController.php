<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
   public function userRegistration(Request $request){

        $validation = Validator::make($request->all(), [
            'name' => 'required|max:150',
            'userName' => 'required',
            'email' => 'required|regex:/(.+)@(.+)\.(.+)/i',
            'password' => 'required'
        ]);


        if($validation->fails()){
            return redirect()->back()->withErrors($validation);
        }else{

            $user = User::create([
                'name' => $request->name,
                'userName' => $request->userName,
                'email' => $request->email,
                'password'=>Hash::make($request->password)
            ]);
            return redirect()->back()->with('message', 'Registered successfully');
        }
   }

   public function login($id){

        return view("login",['id'=>$id]);
   }

   public function userLogin(Request $request){

    $validation = Validator::make($request->all(), [
        'email' => 'required|regex:/(.+)@(.+)\.(.+)/i',
        'password' => 'required'
    ]);

    if($validation->fails()){
        return redirect()->back()->withErrors($validation);
        } else {

            $validated = Auth::attempt([
                'email' => $request->email,
                'password' => $request->password
            ]);
           
            if($validated){
                $request->session()->regenerate();
                $user = Auth::user();
                return view("userDetails",['user'=>$user]);
            }else{
                return redirect()->back()->with('message', 'Wrong credentials');
            }
            

        }
}

public function logout(){

        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();
    return view("login");
}


}
