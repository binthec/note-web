<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EngiController extends Controller
{
    public function index()
    {
        return view('engi.list');
    }
}
