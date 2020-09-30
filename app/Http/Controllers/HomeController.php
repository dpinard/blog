<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

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
        $tab = [];
        $user_id = Auth::user()->id;
        $user = User::find($user_id);

        foreach ($user->roles as $role) {
            array_push($tab, $role->name);
        }

        return view('home')->with('role', $tab);
    }
}
