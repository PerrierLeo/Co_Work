<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;


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

        $boards = Auth::user()->boards()->get();
        return view('home', ['boards' => $boards]);
    }
}
