<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Post;
use App\User;

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
        $all = Post::where('user_id', Auth::user()->id)->get();
        return redirect('/home')->with('post_read', $all);
    }

    public function update(Post $post, $id) {
        $update = Post::Id($id)->get();
        return view('update', [ 'update' => $update ]);
    }

    public function update_post(Post $post, Request $request) {
        $id = request('id');
        $update = 'post edited';
        $stack['name'] = request('name');
        $stack['content'] = request('content');
        $user = Post::Id($id)->Update($stack);
        
        return view('home')->with('msg', $update);
    }

    public function delete(Request $request, $id) {
        $user_id = Auth::user()->id;
        $t = Post::where('id', $id)->first();
        
        if ($user_id === $t->user->id) {    
            Post::Id($id)->delete();
            return view('home')->with('msg', 'Post bien supprimé');
        } else
            return view('home')->with('msg', 'Vous n\'avez pas les droits');
    }
}
