<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{

    public function create()   // Route to Login page
    {
        return view('session.create');
    }

    public function store() // Trying to [Auth] the User
    {
        $attributes = request()->validate([
            'email'=>['required' , 'email'],
            'password'=>['required']
        ]);
        if(auth()->attempt($attributes)) // If Successful Auth Log in, and You will be redirect to The Home Page
        {
            session()->regenerate();
           return redirect('/')->with('success', 'Welcome Back!');
        }

        // Auth Failed
        return back()
            ->withInput()   // to Save the Input
            ->withErrors(['email'=>'Pleases Try Again ']);



    }


    public function destroy()  // Log Out the user
    {
        auth()->logout();
       return redirect('/')->with('success' , 'GoodBye!');
    }

}
