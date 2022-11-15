<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EngiController extends Controller
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

    public function index()
    {
        return view('engi.list');
    }

    public function create()
    {
        return view('engi.edit');
    }

    public function edit()
    {
        return view('engi.edit');
    }
}
