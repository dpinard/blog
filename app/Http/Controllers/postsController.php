<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Post;

class postsController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index() {        
        return view('posts');
    }
    
    public function create(Request $request, Post $post) {
        $post = Post::create([
            'name' => request("name"),
            'content' => request('content'),
            'user_id' => Auth::user()->id  
        ]);
        // $post->user_id = Auth::user()->id;
        // $post-save();
        
        // $post->name = $request->input('name');
        // $post->content = $request->input('content');
        // $post->user_id = Auth::user()->id;
        // $post->save();
        
        return redirect('/home');
    }

    public function read(Post $post) {
        $all = $post::where('user_id', Auth::user()->id)->get();
        return redirect('/home')->with('post_read', $all);
    }

    public function update(Post $post, $id) {
        $update = $post::where('id', $id)->get();
        return $update;
    }

    public function delete(Post $post, $id) {
        $delete = $post::where('id', $id)->delete();
        return redirect('/home');
    }
}
