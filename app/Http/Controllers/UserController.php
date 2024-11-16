<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Category;


class UserController extends Controller
{
    public function viewLogin()
    {
        // $error='Username or password is invalid';
        return view('auth.login');
    }

    public function viewRegister()
    {
        // $error='Username or email or password is invalid';
        return view('auth.register');
    }

    public function view_about(){
        $categories = Category::all();
        return view('about', compact('categories'));
    }

    public function view_profile($username){
        $user = User::where('username', $username)->first();
        $categories = Category::all();
        return view('user.profile', compact('user', 'categories'));
    }

    public function store(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required|unique:users,username|min:5|max:50',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8'
        ]
        ,
        [//error messages
            'username.required' => 'Please enter your username.',
            'password.required' => 'Please enter your password.',
            'email.required' => 'Please enter your email.',
            'email.email' => 'Please enter a valid email.',
            'email.unique' => 'This email is already exist.',
        ]
    );

        // $user = User::create(request(['username', 'email', 'password']));
        $user = User::create($credentials);
        Auth::login($user);
        $request->session()->regenerate();
        return redirect()->route('products.index')->withErrors([
            'error' => 'Username or email or password is incorrect',
        ]);
    }
///////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required|min:5|max:50',
            'password' => 'required|min:8'
        ],
        [//error messages
            'username.required' => 'Please enter your username.',
            'password.required' => 'Please enter your password.',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if (Auth::user()->role === 'admin') {
                return redirect()->route('adminproducts.index');
            }
            else {
                return redirect()->route('products.index');
            }
        }

        return back()->withErrors([
            'error' => 'username or password is incorrect',
        ]);
    }
///////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('products.index');
    }
}
