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
        // dd($users);
        $data = [
            'users'=>$users,
        ];
        return view('user.index', $data);
    }

    // Create new user
    public function create(Request $request)
    {
        // $request->validate([
        //     'name'      => ['required', 'string', 'max:255'],
        //     'username'  => ['required', 'string', 'max:255', 'unique:username'],
        //     'email'     => ['required', 'string', 'email', 'max:255', 'unique:email'],
        //     'role'      => ['required', 'string', 'role'],
        //     'password'  => ['required', 'string', 'min:8', 'confirmed'],
        // ]);

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

    public function edit_user(Request $request, $id=NULL)
    {
        $id = $request->input('id');
        
        $users = User::where('id',$id)->get();
       
        $data = [
            'users'=>$users,
        ];

        return view('user.edit', $data);

    }

    public function update(Request $request)
    {
        // $request->validate([
        //     'name'      => ['required', 'string', 'max:255'],
        //     'username'  => ['required', 'string', 'max:255', 'unique:username'],
        //     'email'     => ['required', 'string', 'email', 'max:255', 'unique:email'],
        //     'role'      => ['required', 'string', 'role'],
        //     'password'  => ['required', 'string', 'min:8', 'confirmed'],
        // ]);

        $id = $request->id;
        $name = $request->name;
        $username = $request->username;
        $email = $request->email;
        $role = $request->role;

        if(!empty($request->password))
            {
                $password = Hash::make($request->password);
                
                $data = [
                    'name'=>$name,
                    'username'=>$username,
                    'email'=>$email,
                    'role'=>$role,
                    'password'=> $password,
                    
                ];
            }else{
                $data = [
                    'name'=>$name,
                    'username'=>$username,
                    'email'=>$email,
                    'role'=>$role,
                    
                ];
            }

       

        User::where('id', $id)->update($data);

        return redirect()->back()->withSuccess('IT WORKS!');
    }

    public function destroy_user(Request $request)
    {
        $data = [ 'id' => $request->id];

        return view('user.delete', $data);
    }

    public function destroy(Request $request)
    {
      $user = User::where('id',$request->id)->delete();
      return redirect()->back()->withSuccess('IT WORKS!');
    }


}
