<?php

namespace Login\Http\Controllers\Login;

use Illuminate\Http\Request;

use Login\Http\Requests;
use Login\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index(){
        return view('login.dashboard.index.index');
    }
}
