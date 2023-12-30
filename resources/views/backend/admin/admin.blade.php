@extends('backend.layouts.master')
@section('content')
<div class="container mt-10">
            <div class="card card-custom">
                <div class="card-header flex-wrap border-0 pt-6 pb-0">
                    <div class="card-title">
                        <h3 class="card-label"> Change Password
                        </h3>
                    </div>
                </div>
                <div class="card-body"> 
                    <form action="{{route('admin.change_password')}}" method="post">
                        @if(session()->has('error'))
                        <p class="alert alert-danger">{{session('error')}}</p>
                        @endif
                        @if(session()->has('success'))
                        <p class="alert alert-success">{{session('success')}}</p>
                        @endif
                        @csrf
                        <div class="form-group"> 
                            <label>Current Password
                                <span class="text-danger">*</span></label>
                            <input type="password" name="current_password" id="current_password" class="form-control" placeholder="Current Password" required />
                        </div>
                        <div class="form-group">
                            <label>New Password
                                <span class="text-danger">*</span></label>
                            <input type="password" name="new_password" id="new_password" class="form-control" placeholder="New Password" required />
                        </div>
                        <div class="form-group">
                            <label>Confirm Password
                                <span class="text-danger">*</span></label>
                            <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Confirm Password" required />
                        </div>

                        <button type="submit" class="btn btn-primary mr-2">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!--end::Entry-->
</div>
@endsection