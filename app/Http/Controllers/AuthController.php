<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\User;

class AuthController extends Controller
{
    function index(){
        return view('login');
    }
    function do_login(Request $request){
        $users = DB::table('users')->where('name',$request->get('username'))->get();
        foreach($users as $user){
            $name = $user->name;
            $pass = $user->password;
        }
        if(!empty($users)){
            if(password_verify($request->get('password'),$pass)){
                return redirect()->route('LihatUser');
            } else {
                echo "login gagal";
            }
        }
        
        
    }
    function create(){
        return view('create');
    }
    function store(Request $request){
        $users = new User;
        $users->name = $request->get('name');
        $users->email = $request->get('email');
        $users->password = password_hash($request->get('password'),PASSWORD_DEFAULT);
        $users->save();
        return redirect('show');
    }
    function show(){
        $users = User::all();
        return view('index',compact('users'));
    }
    
    function edit($id){
        $users = User::find($id);
        return view('edit',compact('users'));
    }
    function update(Request $request,$id){
        $users = User::find($id);
        
        $users->name = $request->get('name');
        $users->email = $request->get('email');
        $users->password = password_hash($request->get('password'),PASSWORD_DEFAULT);
        $users->save();
        return redirect('show');
    }
    function delete($id){
        $users = User::destroy($id);
        return redirect('show');
    }
}
