<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Auth;


class PostController extends Controller{

    public function __construct(){
        $this->middleware('auth', ['except' => ['index']]);
    }

    public function index(){
        // $post = Post::latest()->get(); is zelfde als orderBy.
        $posts = Post::orderBy('created_at','desc')->get();
        return view('posts.index', compact('posts')); 
    }

    public function create(){
        return view('posts.create');
    }

    public function store(Request $request){

        $validated = $request->validate([
            'title'      => 'required|min:3',
            'content'    => 'required|min:20',
        ]);

        $post = new Post;
        $post->title= $validated['title'];
        $post->message = $validated['content'];
        $post->user_id = Auth::user()->id;
        $post->save();

        return redirect()->route('index')->with('status','Post added');

    }

    public function edit($id){
        $post = Post::findOrFail($id);
        if($post->user_id != Auth::user()->id){
            abort(403);
        }

        return view('posts.edit', compact('post'));
    }

    public function update($id, Request $request){
        $post = Post::findOrFail($id);

        if($post->user_id != Auth::user()->id){
            abort(403);
        }


        $validated = $request->validate([
            'title'      => 'required|min:3',
            'content'    => 'required|min:20',
        ]);

        $post->title = $validated['title'];
        $post->message = $validated['content'];
        $post->save();

        return redirect()->route('index')->with('status','Post edited');
    }
}
