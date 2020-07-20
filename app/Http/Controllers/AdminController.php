<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Role;

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

    public function User_edit($id){
        $data['user'] = \App\User::find($id);
        $id = DB::table('users')
          ->join('role_user','users.id','=','role_user.user_id')
          ->join('roles','role_user.role_id','=','roles.id')
          ->select('role_user.role_id')
          ->where('role_user.user_id', $id)->get();
        $data['id_role']= $id['0']->role_id;
        $data['role']= DB::table('roles')->select('*')->whereNotIn('id', [1])->get();
        return view('admin/user/edit_user',$data);    
    }

    public function User_store(Request $request){
        $user= new \App\User;
      $user->name = $request->nama;
      $user->email = $request->email;
      $user->password = Hash::make($request->pass);
      $user->save();
      $role = Role::where('id', $request->role)->first();
      $user->roles()->attach($role);
    }
    public function User_update(Request $request, $id){
        $user= \App\User::find($id);
      $user->name = $request->nama;
      $user->email = $request->email;
      $user->save();
      $relation = DB::table('role_user')
              ->where('user_id', $id)
              ->update(['role_id' => $request->role]);
      
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
