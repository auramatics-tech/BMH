<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use File;

class DashboardController extends Controller
{

    public function index()
    {
        return view('backend.dashboard');                                                               
    }
}
