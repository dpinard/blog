<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Role;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user_session = Auth::user()->id;
        $tab = [];
        $user = User::find($user_session);

        foreach ($user->roles as $role) {
            array_push($tab, $role->name);
        }

        // $role = Role::find();
// 
        // foreach ($role->users as $key) {
            // echo($key);
        // }
        // dd($tab);
        
        return view('home')->with('role', $tab);
    }
}
