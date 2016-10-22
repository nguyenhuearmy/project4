<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use Hash;

class UsersController extends Controller
{
    public function __construct() {
        $this->middleware('auth')->only(['changePassword', 'change']);
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
        
        $credentials = $request->only('password', 'new_password', 'confirm_password');
        $user = \Auth::user();
        if(Hash::check($credentials['password'], $user->password)){
            if($credentials['new_password'] == $credentials['confirm_password']){
                $user->password = bcrypt($credentials['new_password']);
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
