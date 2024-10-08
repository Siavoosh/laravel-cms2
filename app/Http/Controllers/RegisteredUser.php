<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class RegisteredUser extends Controller
{
    public function index(){
        return view('auth.register');
    }
    public function create(){

        return view('dashboard.registeruser');
    }
    public function createtheuser(Request $request){
        $attributes = $request->validate([
            'name'=> ['required','min:3','max:25'],
            'email'=> ['required','email'],
            'password'=> ['required',Password::min('6')],
            'role'=> ['required'],
            
        ]);
       
         User::create($attributes);
        return back()->with('success','user '. $request->name . ' created');
    }
    public function store(Request $request){

        $attributes = $request->validate([
            'name'=> ['required','min:3','max:25'],
            'email'=> ['required','email'],
            'password'=> ['required',Password::min('6'),'confirmed']
        ]);
        
        $user = User::create($attributes);


        Auth::login($user);
        return redirect()->route('dashboard');

    }
}
