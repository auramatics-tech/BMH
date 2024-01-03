<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Services;
use App\Models\UserService;
use Hash;
use Auth;


class CustomerController extends Controller
{

    public function index()
    {
        $data = User:: where('role' , 2)->get();
        return view('backend.customer.index',compact('data'));
    }

    public function create()
    {
        $data = User::all(); 
        $services = Services::all();
        return view('backend.customer.create',compact('data','services'));
    }


    public function save_customer(Request $request)
    {
        // echo"<pre>";print_r($request->all());die;

        $rules = [

            'name' => 'required',
            'email' => 'required',
            'mobile_no' => 'required', 

        ];

        if (!$request->id || $request->password) {
            $rules['password'] = ['required', 'confirmed'];
        }

        if (isset($request->id) && $request->id)
        $rules['email'] = 'required|string|email|max:255|unique:users,email,' . $request->id . ',id';
        else
        $rules['email'] = 'required|string|email|max:255|unique:users,email';
        $validated = $request->validate($rules);


        if (isset($request->id) && $request->id != '') {
            $data = User::Find($request->id);
            $msg = 'Updated successfully!';
        } else {
            $data = new User;
            $msg = 'Created successfully!';
        }
        $data->name = $request->name;
        $data->email = $request->email;
        $data->mobile_no = $request->mobile_no;
        $data->role = 2;
        if (!$request->id || $request->password) {
            $data->password = Hash::make($request->password);
        }
        $data->save();

        $delete_services = UserService::where('user_id',$data->id)->delete();

        if (isset($request->service)) {
            foreach ($request->service as $key => $service) {
                $user_services = new UserService();
                $user_services->service_id = $service;
                $user_services->user_id = $data->id;
                $user_services->s_username = isset( $request->s_username[$service]) ?  $request->s_username[$service] : NULL;
                $user_services->s_password = isset($request->s_password[$service]) ? $request->s_password[$service] : NUll;
                $user_services->save();
            }
        }

        return redirect()->route('admin.customers')->with('success', $msg);
    }

    public function edit_customer($id)
    {
        $data = User::Find($id);
        $services = Services::all();
        $user_services = UserService::where('user_id',$id)->get();
        return view('backend.customer.create', compact('data','services','user_services'));
    }


    public function delete_customer($id)
    {
        $delete = User::Find($id);
        $delete->delete();
        return back()->with('success', ' deleted successfully');
    }

}
