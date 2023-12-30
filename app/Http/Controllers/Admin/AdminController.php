<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Auth;
class AdminController extends Controller
{

    public function index()
    {
        $admin =Auth:: user();
        return view('backend.admin.admin',compact('admin'));
    }

    public function change_password(Request $request)
    {
        $data = $request->except('_token');
        $check = Hash::check($data['current_password'], auth()->user()->password);
        if(!$check)
        {
            return redirect()->back()->with('error', 'Your current password is wrong.'); 
        }
        if($data['new_password'] != $data['confirm_password'])
        {
            return redirect()->back()->with('error', 'New password and confirm password does not match.');  
        }
        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
        return redirect()->back()->with('success', 'Password successfully changed.'); 
    }
}