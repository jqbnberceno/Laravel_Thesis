<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\products_table;
use Hash;
use Session;

class User_Controller extends Controller
{
    public function index()
    {
        return redirect('/');
    }

    public function registration()
    {
        return view('registration');
    }

    public function validate_registration(Request $request)
    {
        $request->validate([ 
            'name' => 'required',
            'email' => 'required|email|unique:users', 
            'password' => 'required|min:8'
        ]);

        $data = $request->all();

        User::create([
            'name' => $data['name'],
            'email' => $data['email'], 
            'password' => Hash::make($data['password'])
        ]);

        return redirect('/')->with('success', 'Registration Successful!');
    }

    public function validate_login(Request $request)
    {
        $request->validate(['email' => 'required', 'password' => 'required']);

        $credentials = $request->only('email', 'password');

        if(Auth::attempt($credentials))
        {
            return redirect('products');
        }

        return redirect('/')->with('success', 'Incorrect Email or Password!');
    }

    public function products()
    {
        if(Auth::check())
        {
        
        return view('dashboard');
        }

        return redirect('/')->with('success', 'Access Denied, You must log in first!');
    }

    public function logout()
    {
        Session::flush();

        Auth::logout();

        return redirect('/');
    }


}
