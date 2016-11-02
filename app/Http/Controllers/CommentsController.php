<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Comment;

class CommentsController extends Controller
{
    /*
     * Create a new controller instance
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }
    /*
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function create(Request $request){
        $comment = new Comment();
        $user = \Auth::user();
        $comment->user_id = $user->id;
        $comment->file_id = $request->Input('file');
        $comment->content = $request->Input('content');
        $comment->save();
        return redirect()->back();
    }
}
