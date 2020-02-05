<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
class TaskController extends Controller
{
    /*public function create(){

        return view('home');
    }

    public function store(Request $request){

       $title = $request->get('title');

       echo $title;
    }*/

    public function index(){

        $posts = Post::with('users')->get();

        return view('home', compact('posts'));



    }

}
