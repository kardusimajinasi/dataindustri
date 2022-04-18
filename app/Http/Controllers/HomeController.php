<?php

namespace App\Http\Controllers;

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

    //function index akan untuk mendirect ke halaman home (user)
    public function index()
    {
        return view('home');
    }
    //function adminHome akan untuk mendirect ke halaman adminHome (admin)
    public function adminHome()
    {
        return view('adminHome');
    }

    //function superadminhome akan untuk mendirect ke halaman superadminHome (super admin)
    public function superadminHome()
    {
        return view('superadminHome');
    }

}
