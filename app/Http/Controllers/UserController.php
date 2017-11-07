<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function user()

    {
    	$users=User::where('id','!=',1)->get();
    	
    	return view('users.user',compact('users'));
    }

    public function editUser(Request $request,$user_id)
    {

       $this->validate($request,[
       'name'=>'required',
       'email'=>'required',


       ]);
       $users=User::find($user_id);
       $users->name=$request->input('name');
       $users->email=$request->input('email');
       $users->save();

       // $data=array(
       // 'name'=> $users->name,
       // 'email'=>$users->email
       // );
       // User::where('id',$user_id)
       // ->update($data);
       // $users->update();
       return redirect('/user');
       with('response','User updated Successfully');
    }

    public function deleteUser($user_id)
    {

      User::where('id',$user_id)
      ->delete();
       return redirect ('/home')->with('response','User Deleted Successfully');
    }
}
