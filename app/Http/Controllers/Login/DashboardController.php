<?php

namespace Login\Http\Controllers\Login;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Login\Http\Requests;
use Login\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index(Request $request){

        $user = $request->user();
        
        return view('login.dashboard.index.index')
            ->with('user', $user);
    }
}
