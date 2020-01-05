<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class UserController extends Controller
{
    //
    public function index()
    {
        $users = User::paginate(15);
        return view('user.create', ['users'=>$users]);
    }

    // Create new user
    public function create(Request $request)
    {
        $request->validate([
            'name'      => ['required', 'string', 'max:255'],
            'username'  => ['required', 'string', 'max:255', 'unique:usernames'],
            'email'     => ['required', 'string', 'email', 'max:255', 'unique:email'],
            'role'      => ['required', 'string', 'role'],
            'password'  => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        User::create([
            'name'      => $request->name,
            'username'  => $request->username,
            'email'     => $request->email,
            'role'      => $request->role,
            'status'      => $request->status,
            'status'    => $request->status,
            'password'  => Hash::make($request->password),
        ]);
        
        return redirect()->back()->withSuccess('IT WORKS!');
    }


}
