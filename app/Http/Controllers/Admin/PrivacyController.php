<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use File;
use App\Models\Privacy;

class PrivacyController extends Controller
{

    public function index()
    {
        $data = Privacy::Find(1);
        return view('backend.privacy',compact('data'));                                                               
    }
    public function store_privacy(Request $request){
        $privacy = Privacy::Find(1);
        $privacy->privacy = $request->privacy;
        $privacy->save();
        return redirect()->route('admin.privacy')->with('success','Record updated successfully!');
    }
    public function terms()
    {
        $data = Privacy::Find(1);
        return view('backend.terms',compact('data'));                                                               
    }
    public function store_terms(Request $request){
        $privacy = Privacy::Find(1);
        $privacy->terms = $request->terms;
        $privacy->save();
        return redirect()->route('admin.terms')->with('success','Record updated successfully!');
    }

}
