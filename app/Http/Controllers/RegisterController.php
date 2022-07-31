<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }

    public function store()
    {
        // create the user

       $attributes = request()->validate([
            'name' => ['required' , 'max:255' , 'min:3'],
            'username'=>['required' , 'max:255' , Rule::unique('users','username')],
            'email'=>['required' , 'email' ,Rule::unique('users','email')],
            'password'=>['required' , 'max:255' , 'min:3']  // Another Way  | Password Bcrypt in User.php
        ]);

           User::create($attributes);


           return redirect('/');

    }
}
