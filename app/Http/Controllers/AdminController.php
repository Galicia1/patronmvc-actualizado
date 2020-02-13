<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{

    //Con esto hace que se vaya al login
    public function __construct() {

        $this->middleware('auth');

    }

    public function dashboard() {

        return view('admin.dashboard');

    }



}


