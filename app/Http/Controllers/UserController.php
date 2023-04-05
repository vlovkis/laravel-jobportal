<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{

    // Show register/create form
    public function create(){
        return view('users.register');
    }

    //Create New User
    public function store(Request $request){
        $formFields = $request->validate([
            'name'=> ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:3',
            'country' => 'required'
        ]);

        //Hash Password
        $formFields['password'] = bcrypt($formFields['password']);

        //Create User
        $user = User::create($formFields);

        //Login new User
        auth()->login($user);

        return redirect('/')->with('message', 'User created successfully!');
    }


    //Log out

    public function logout(Request $request){
        auth()->logout();
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'You have been loged out!');
    }

    //Login Form
    public function login(){
        return view('users.login');
    }

    //Authenticate User
    public function authenticate(Request $request){
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        if(auth()->attempt($formFields)){
            $request->session()->regenerate();

            return redirect('/')->with('message', 'Your are now logged in!');

        } return back()->withErrors(['email' => 'Invalid credentials'])->onlyInput('email');
    }

    
}
