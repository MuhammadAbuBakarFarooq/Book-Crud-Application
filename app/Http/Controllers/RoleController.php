<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Session;
class RoleController extends Controller
{
    public function assignRoleView()
    {
    	$users = User::all();
		$roles = Role::all();
		return view('assignRole', ['users'=> $users, 'roles'=> $roles]);
    }
    public function saveNewRole(Request $request)
    {
    	$user= $request->input('user');
    	$role = $request->input('role');
    	$users = User::find($user);
        
        if($users->hasRole($role)){
            Session::flash('success' , 'User has already this role!!!');
        return redirect()
        ->route('home');
        };
    	
        $users->assignRole($role);
		// sync role guest role only view role
    	// registration guest role
    	Session::flash('success' , 'Role Assigned Successfully!!!');
		return redirect()
		->route('home');
    }
}
