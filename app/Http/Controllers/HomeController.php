<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\todo;
use Illuminate\Support\Facades\Auth;
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

        $id_connected = Auth::id();

             $todos=todo::where('id_user',$id_connected)->get();

        return view('home',compact('todos'));
    }
}
