<?php

namespace App\Http\Controllers;

use App\Models\Permissions;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $users = User::all();
        return view('users', $users);
    }

    public function search(Request $request): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $query = $request->input('query');
        $users = User::where('name', 'LIKE', '%'.$query.'%');
        $roles = Role::where('name', 'LIKE', '%'.$query.'%');
        $permissions = Permissions::where('name', 'LIKE', '%'.$query.'%');
        if (count($roles) > count($permissions)){
            $role_users = [];
            foreach ($roles as $role){
                $role_user = $role->user();
                $role_users[] = $role_user;
            }
            return view('/users/dds',$role_users);
        }
        elseif (count($permissions) > count($users)){
            $permission_users = [];
            foreach ($permissions as $permission){
                $permission_user = $permission->user();
                $permission_users[] = $permission_user;
            }
            return view('/users/dds',$permission_users);
        }
        else
            return view('/users/dds',$users);
    }

}
