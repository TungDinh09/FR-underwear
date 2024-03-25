<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;

class UserController extends Controller
{
    //
     public function index(){
        $users = User::all();
        return view('userList',compact('users'));
    }
    public function login(){
        return view("login");
    }
    public function register(){
        return view("register");
    }
    public function registerUser(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:5|max:12',
            'image'=>'required'
        ]);
        $avatar = $request->file('image')->getClientOriginalName();
        $request->file('image')->storeAs('public/images',$avatar);

        $user = new User();
        $user->name = $request->name;
        $user->avatar = $avatar;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect('/login');

    }
    public function loginUser(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:5|max:12'
        ]);
        $user = User::where('email','=',$request->email)->first();
        if($user){
            if(Hash::check($request->password, $user->password)){
                // $request->session()->put('user',$user);
                // return redirect('/');
                if($user->is_admin ==1){
                    $request->session()->put('user',$user);
                    return redirect('/');
                }else{
                    $request->session()->put('admin',$user);
                    return redirect('/admin');
                    // return session('user');
                }

            }else{
                return back()->with('fail','Password not matches');
            }
        }else{
            return back()->with('fail','this email is not registered');
        }

    }
}
