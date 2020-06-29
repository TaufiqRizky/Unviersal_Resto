<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin/dashboard');
    }

    public function User_list(){
         $data['user']= DB::table('users')
          ->join('role_user','users.id','=','role_user.user_id')
          ->join('roles','role_user.role_id','=','roles.id')
          ->select('users.id','users.name','users.email','roles.role')->get();
        return view('admin/list_user',$data);
    }
   
}
