<?php

namespace App\Http\Controllers;
use App\Models\user;

use Illuminate\Http\Request;

class userController extends Controller
{
    public function index(){
        $data['user']=user::all();
        return view('admin.manage.manageUsers',$data);
    }
    public function create()
    {
        return view('admin.insert.insertUser');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'contact'=>'required',
            'password'=>'required',
        ]);
        $user=new user();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->contact=$request->contact;
        $user->user_type=$request->user_type;
        $user->password=$request->password;
        $user->save();
        return redirect()->route('user.index')->with('success','Wow! data is inserted successfulley');
    }
    public function show(user $user)
    {
        //
    }
    public function edit(user $user)
    {
        return view('admin.edit.editBarand',['user'=>$user]);
    }
    public function update(Request $request, user $user)
    {
        $request->validate([
            'user_title'=>'required',
        ]);
        $user->user_title=$request->user_title;
        $user->save();
        return redirect()->route('user.index')->with('success','Wow! data updated is inserted successfulley');
    }
    public function destroy(user $user)
    {
        $user ->delete();
        return redirect()->route('user.index')->with('error','Ho! data is delete successfulley');
    }
}
