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
        return redirect('/home');
    }

    public function read(Post $post) {
        $all = $post::where('user_id', Auth::user()->id)->get();
        return redirect('/home')->with('post_read', $all);
    }

    public function update(Post $post, $id) {
        $update = $post::Id($id)->get();
        return view('update', [ 'update' => $update ]);
    }

    public function update_post(Post $post, Request $request) {
        $id = request('id');
        $update = 'post edited';
        $stack['name'] = request('name');
        $stack['content'] = request('content');
        $user = $post::Id($id)->Update($stack);
        
        return view('home')->with('msg', $update);
    }

    public function delete(Post $post, $id) {
        $delete = $post::Id($id)->delete();
        return redirect('/home');
    }
}
