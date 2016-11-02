<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\CheckFileRequest;

use App\Http\Response;
use App\File;
use App\User;
use App\Category;
use App\Like;
use DB;

class FilesController extends Controller
{
    /**
     * Create a new controller instance
     * 
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $files = File::all();
        $user = \Auth::user()->id;
        $likes = DB::table('likes')->where('user_id', '=', $user)->get();
        // get the name value from the search box
        $name = \Request::get('searchfile');
        // find file by name of the file 
        if($name != ''){
            $files = DB::table('files')->where('name', 'LIKE', '%'.$name.'%')->get();
        }
        return view('file/home', compact('files', 'name', 'likes'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('file/add', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request\CheckFileRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CheckFileRequest $request)
    {
        $input = new File();
        
        $file = $request->file('link');
        $filename = $file->getClientOriginalName();
        $file->move('files', time() . '.' . $filename);
        
        $user = \Auth::user();
        $input->name = $request->Input('name');
        $input->link = $filename;
        $input->user_id = $user->id; 
        $input->category_id = $request->Input('category_id');
        $input->save();
        return redirect('file');
    }

    /**
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function download($id)
    {
        $files = File::findOrFail($id);
        $file= public_path(). "/files/". $files->link;
        return response()->download($file);
    }
    
    /**
     * Show user file
     * 
     */
    public function myFile(){
        $id = \Auth::user()->id;
        $files = DB::table('files')->where('user_id', '=', $id)->get();
        return view('file/myfile', compact('files'));
    }


    /**
     * 
     * Show detail a file with some comments 
     * 
     */
    public function detail($id){
        $file = File::findOrFail($id);
        // find comment by file_id
        $comments = DB::table('comments')->where('file_id', '=', $id)->get();
        $result = array();  // array store name(user), avatar, content(comment)
        foreach($comments as $comment){
            $users = DB::table('users')->where('id', '=', $comment->user_id)->get();
            foreach($users as $user){
                $user1 = array($user->name, $user->avatar, $comment->content, $comment->created_at);
                array_push($result, $user1);
            }
        }
        return view('file/detail', compact('result', 'file'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $file = File::findOrFail($id);
        if(\Auth::user()->id == $file->user_id){  // check auth user
            return view('file/edit', compact('file', 'categories'));
        }
        else{
            return redirect('file');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request\CheckFileRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CheckFileRequest $request)
    {
        $id = $request->Input('id');
        $file = File::findOrFail($id);
        
        $link = $request->file('link');
        $filename = $link->getClientOriginalName();
        $link->move('files', $filename);
        
        $file->category_id = $request->Input('category');
        $file->name = $request->Input('name');
        $file->link = $filename;
        
        $file->update();
        
        return redirect('file');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $file = File::findOrFail($id);
        $file->delete();
        \Session('message1', 'This File has been deleted successfully!');
        return redirect()->back();
    }
    
    /**
     * Like a file
     * @param Request $request
     * @return type
     * 
     */
    public function like(Request $request){
        $like = new Like();
        $like->user_id = $request->input('user_id');
        $like->file_id = $request->input('file_id');
        $like->save();
        return redirect()->back();
    }
    
    /**
     * Dis like a file
     * 
     */
    public function dislike(Request $request){
        $user_id = $request->input('user_id');
        $file_id = $request->input('file_id');
        DB::table('likes')->where('user_id', '=', $user_id)->where('file_id', '=', $file_id)->delete();
        return redirect()->back();
    }
}

