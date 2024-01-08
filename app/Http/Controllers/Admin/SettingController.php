<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Setting;

class SettingController extends Controller
{

    public function create()
    {
        // echo"here";die;
        $setting = Setting::Find(1);
        return view('backend.setting.create',compact('setting'));
    }

    public function save_setting(Request $request)
    {
        $this->validate($request, [
            'contact_email' =>'required',
            'contact_phone' =>'required',
        ]);

        $setting = Setting::Find(1);
        $setting->contact_email = $request->contact_email;
        $setting->contact_phone = $request->contact_phone;
        $setting->save();
        return redirect()->route('admin.setting')->with('success', 'Data updated successfully');
    }

}