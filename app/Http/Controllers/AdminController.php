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
          ->select('users.id','users.name','users.email','roles.role')
          ->whereNotIn('role_user.role_id', [1])->get();
        return view('admin/user/list_user',$data);
    }

    public function User_tambah(){
        $data['role']= DB::table('roles')->select('*')->whereNotIn('id', [1])->get();
        return view('admin/user/add_user',$data);
    }

    public function destroy_user($id){
        $role = DB::table('role_user')->where('user_id', '=', $id)->delete();
        if ($role) {
            \App\User::destroy($id); 
            return true;
        }else{
            return false;
        }
   }
   
}
