@extends('backend.layouts.master')

@section('content')

<!--begin::Content-->

<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-1"> 
                <!--begin::Page Heading-->
                <div class="d-flex align-items-baseline flex-wrap mr-5">
                    <!--begin::Page Title-->
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Customer Management</h5>
                    <!--end::Page Title-->
                </div>
                <!--end::Page Heading--> 
            </div>
            <!--end::Info-->
        </div>
    </div>
    <!--end::Subheader-->
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <div class="card card-custom gutter-b example example-compact">
                <form action="{{route('admin.save_user')}}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Name<span class="text-danger">*</span></label>
                                    <input type="hidden" class="form-control" name="id" value="{{ isset($data->id) ? $data->id : '' }}" />
                                    <input type="text" class="form-control" name="name" value="{{ isset($data->name) ? $data->name : old('name') }}" placeholder="Name" />
                                </div>
                                @error('name')
                                <span class="alert alert-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Email<span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" name="email" value="{{ isset($data->email) ? $data->email : old('email') }}" placeholder="Email" />
                                </div>
                                @error('email')
                                <span class="alert alert-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Phone no<span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" name="mobile_no" value="{{ isset($data->mobile_no) ? $data->mobile_no : old('mobile_no') }}" placeholder="Phone no" />
                                </div>
                                @error('mobile_no')
                                <span class="alert alert-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror 
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Password<span class="text-danger">*</span></label>
                                    <input type="password" class="form-control" name="password" value="" placeholder="Password" />
                                </div>
                                @error('password')
                                <span class="alert alert-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Confirm Password<span class="text-danger">*</span></label>
                                    <input type="password" name="password_confirmation" value="" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
</div>
<!--end::Content-->
@endsection
@section('script')

@endsection