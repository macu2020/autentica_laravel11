<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class DashboardController extends Controller
{
    public function dashboard(){
        if(Auth::user()->is_role == 2){
            $data['getRecord'] = User::find(Auth::user()->id);
            return view('superadmin.dashboard',$data);
        }else if(Auth::user()->is_role == 1){
            $data['getRecord'] = User::find(Auth::user()->id);
            return view('admin.dashboard',data);
        }else if(Auth::user()->is_role == 0){
            $data['getRecord'] = User::find(Auth::user()->id);
            return view('user.dashboard',data);
        }
    }
}
