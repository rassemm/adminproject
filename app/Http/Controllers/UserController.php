<?php

namespace App\Http\Controllers;
use App\User;
use App\Role;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct ()
    {

        $this->middleware(['role:super_admin']);
    }
    public function index () {
        $users =User::all();
        return view ('user.index',compact('users'));
    }
    public function edit (User $user){
        return view ('user.edit',compact('user'));
    }
    public function update(Request $request ,User $user){
       /* $request->validate([
           ' name'=> 'required',
            'roles'=>'required|array|min:1'
        ]);*/
        //$requestData=$request::all()->except('email');
        $user->name = $request->input('name');
        $user->update();
        //$user->assignRole($request->input('roles'));
         $user->syncRoles($request->roles);
    
        

        return redirect()->route('user.index');
    }
    

}
