<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use Hash;

class UsersController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    
    public function profile(){
        $user = \Auth::user();
        return view('auth/profile', compact('user'));
    }
    
    public function setprofile(Request $request){
        $this->validate($request, [
            'name' => 'required',
        ]);
        $user = \Auth::user();
        $user->name = $request->input('name');
        $logo = $request->file('avatar');
        $name = $logo->getClientOriginalName();
        $success = $logo->move('image', time() . $name);
        $user->avatar = time() . $name;
        $user->save();
        \Session::flash('message', 'Your Profile has been updated successfully!');
        return redirect('/');
    }

    public function changePassword(){
        return view('auth/changePassword');
    }
    
    public function change(Request $request){
        $this->validate($request, [
            'password' => 'required',
            'new_password' => 'required|min:6',
            'confirm_password' => 'required',
        ]);
        
        $user = \Auth::user();
        if(Hash::check($request->input('password'), $user->password)){
            if($request->input('new_password') == $request->input('confirm_password')){
                $user->password = bcrypt($request->input('new_password'));
                $user->save();
                \Session::flash('message', 'The new password has been updated successfully!');
                return redirect('/');
            }
            else{
                \Session::flash('message1', 'The confirmation password is not connected!');
                return redirect()->back();
            }
        }
        else{
            \Session::flash('message2', 'The password is not connect!');
            return redirect()->back();
        }
    }
    
}
