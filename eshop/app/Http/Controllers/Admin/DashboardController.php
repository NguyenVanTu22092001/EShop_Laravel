<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function users(){
        $users=User::all();
        return view('admin.user.index')->with(compact('users'));
    }
    public function viewuser($id){
        $users=User::find($id);
        return view('admin.user.view')->with(compact('users'));
    }
    public function updateuser( $user_id){
        if(Auth::id()=="1"){
            $users=User::find($user_id);
        $users->role_as=1;
        $users->update();
        return redirect()->back()->with('status', 'Now this user is admin');
        }
        else{
            return redirect()->back()->with('status', 'You are not the boss');
        }

    }
}
