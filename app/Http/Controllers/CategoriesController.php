<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Category;
use App\User;
use DB;
use App\File;

class CategoriesController extends Controller
{
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
        $user = \Auth::user();
        if($user->key == 1){
            $name = \Request::get('name');
            if(!empty($name)){
                $category = Category::all();
                $valid = true;
                foreach($category as $row){
                        if($row->name == $name){
                        $valid = false;
                        break;
                    }
                }
                if($valid){
                    $record = new Category();
                    $record->name = $name;
                    $record->save();
                    \Session::flash('message1', 'A new Category has been added successfully!');
                }
                else{
                    \Session::flash('message1', 'The category has been taken!');
                }
            }
            $categories = Category::all();
            return view('category/home', compact('categories'));
        }
        else{
            \Session::flash('message', "You do not access");
            return redirect('/');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(){
        $categories = Category::all();
        return view('category/show', compact('categories'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //$id = $request->input('id');
        $category = Category::findOrFail($id);
        $category->delete();
        \Session('message1', 'The category has been deleted successfully!');
        return redirect()->back();
    }
    
    /*
     * get files by category_id
     */
    public function category($id){
        $files = DB::table('files')->where('category_id', '=', $id)->get();
        return view('category/category', compact('files'));
    }
}
