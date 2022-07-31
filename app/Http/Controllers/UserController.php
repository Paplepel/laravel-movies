<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{


    // function to redirect to view all users
    public function index()
    {
        return view('admin.users.index', [
            'users' => User::all()
        ]);
    }

    //function to delete user
    public function deleteuser($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('/users')->with('status', 'User deleted successfully');
    }

    //function to view add user page
    public function create()
    {
        return view('admin.users.createuser');
    }

    //function to add user
    public function postUser(Request $request)
    {
        $attributes = $request->validate([
            'name' => 'required|min:5|max:60||regex:/^[\pL\s]+$/u',
            'email' => 'bail|required|email|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix|max:255|unique:users,email',
            'password' => 'required|min:6|max:20',
            'user_role' => 'required'
        ]);
        $attributes['password'] = bcrypt($attributes['password']);
        $user = new User();
        $user->name = $attributes['name'];
        $user->email = $attributes['email'];
        $user->password = $attributes['password'];
        $user->user_role = $attributes['user_role'];
        $user->save();
        //$user = User::create($attributes);  This is not saving the user role in the database
        return redirect('/users')->with('status', 'User added successfully');
    }

    public function edituser($id)
    {
        $editUser = User::find($id);
        return view('admin.users.edituser', [
            'user' => $editUser
        ]);
    }

    public function postedituser(Request $request)
    {
        $attributes = $request->validate([
            'name' => 'required|min:5|max:60||regex:/^[\pL\s]+$/u',
            'email' => 'bail|required|email|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix|max:255',
            'password' => 'required|min:6|max:20',
            'user_role' => 'required'
        ]);
        $attributes['password'] = bcrypt($attributes['password']);
        $user = User::find($request->id);
        $user->name = $attributes['name'];
        $user->email = $attributes['email'];
        $user->password = $attributes['password'];
        $user->user_role = $attributes['user_role'];
        $user->save();
        return redirect('/users')->with('status', 'User updated successfully');
    }

}
