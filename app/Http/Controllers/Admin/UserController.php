<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{

    public function index()
    {
     
        return view('backend.user.index');                                                               
    }

    public function user_create()
    {

        return view('backend.user.create');                                                               
    }


  

}
