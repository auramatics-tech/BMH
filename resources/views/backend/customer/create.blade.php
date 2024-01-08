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
                    <form action="{{ route('admin.save_user') }}" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Name<span class="text-danger">*</span></label>
                                        <input type="hidden" class="form-control" name="id"
                                            value="{{ isset($data->id) ? $data->id : '' }}" />
                                        <input type="text" class="form-control" name="name"
                                            value="{{ isset($data->name) ? $data->name : old('name') }}"
                                            placeholder="Name" />
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
                                        <input type="email" class="form-control" name="email"
                                            value="{{ isset($data->email) ? $data->email : old('email') }}"
                                            placeholder="Email" />
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
                                        <input type="number" class="form-control" name="mobile_no"
                                            value="{{ isset($data->mobile_no) ? $data->mobile_no : old('mobile_no') }}"
                                            placeholder="Phone no" />
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
                                        <input type="password" class="form-control" name="password" value=""
                                            placeholder="Password" />
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
                                        <input type="password" name="password_confirmation" value=""
                                            class="form-control">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        @foreach ($services as $service)
                                            <div class="checkbox-container">
                                                <input type="checkbox" @if (isset($user_services) && $user_services->contains('service_id', $service->id)) checked @endif
                                                    name="service[]" class="service-checkbox" value="{{ $service->id }}">
                                                {{ $service->name }}<br>
                                                <div class="additional-fields" id="additional-fields-{{ $service->id }}">
                                                    @if (isset($user_services) && $user_services->contains('service_id', $service->id))
                                                        @php
                                                            $matchingService = $user_services->where('service_id', $service->id)->first();
                                                        @endphp
                                                        @if($service->id == 4)
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label for="api_key_{{ $service->id }}">Api Key:</label>
                                                                <input class="form-control" type="text"
                                                                    value="{{ $matchingService->s_api_key }}"
                                                                    name="s_api_key[{{ $service->id }}]"
                                                                    id="api_key_{{ $service->id }}" required>
                                                            </div>
                                                        </div>
                                                        @elseif($service->id == 1)
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label for="username_{{ $service->id }}">Username:</label>
                                                                <input class="form-control" type="text"
                                                                    value="{{ $matchingService->s_username }}"
                                                                    name="s_username[{{ $service->id }}]"
                                                                    id="username_{{ $service->id }}" required>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="password_{{ $service->id }}">Password:</label>
                                                                <input class="form-control" type="text"
                                                                    value="{{ $matchingService->s_password }}"
                                                                    name="s_password[{{ $service->id }}]"
                                                                    id="password_{{ $service->id }}" required>
                                                            </div>
                                                            <div class="col-md-6 d-flex justify-content-between">
                                                                <label for="alarm_{{ $service->id }}">Alarm</label><br>
                                                                <input type="checkbox" id="alarm_{{ $service->id }}"
                                                                    name="alarm[{{ $service->id }}]" value="1"
                                                                    {{ $matchingService->alarm ? 'checked' : '' }}>

                                                            </div>
                                                            <div class="col-md-6 d-flex justify-content-between">
                                                                <label
                                                                    for="tracking_{{ $service->id }}">Tracking</label><br>
                                                                <input type="checkbox" id="tracking_{{ $service->id }}"
                                                                    name="tracking[{{ $service->id }}]" value="1"
                                                                    {{ $matchingService->tracking ? 'checked' : '' }}>

                                                            </div>
                                                        </div>
                                                        @else
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label for="username_{{ $service->id }}">Username:</label>
                                                                <input class="form-control" type="text"
                                                                    value="{{ $matchingService->s_username }}"
                                                                    name="s_username[{{ $service->id }}]"
                                                                    id="username_{{ $service->id }}" required>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="password_{{ $service->id }}">Password:</label>
                                                                <input class="form-control" type="text"
                                                                    value="{{ $matchingService->s_password }}"
                                                                    name="s_password[{{ $service->id }}]"
                                                                    id="password_{{ $service->id }}" required>
                                                            </div>
                                                        </div>
                                                        @endif
                                                    @endif
                                                </div>
                                            </div>
                                        @endforeach
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
    <script>
        $(document).ready(function() {
            $('.service-checkbox').change(function() {
                var serviceId = $(this).val();
                if (this.checked) {
                    addAdditionalFields(serviceId);
                } else {
                    removeAdditionalFields(serviceId);
                }
            });

            function addAdditionalFields(serviceId) {
                if (serviceId == 4) {
                    $('#additional-fields-' + serviceId).html(`
                        <div class="row">
                        <div class="col-md-6">
                                <label for="api_key_${serviceId}">Api Key:</label>
                                <input class="form-control" type="text" name="s_api_key[${serviceId}]" id="api_key${serviceId}" required>
                            </div>
                        </div>
                        `);
                } else if(serviceId == 1) {
                    $('#additional-fields-' + serviceId).html(`
                        <div class="row">
                            <div class="col-md-6">
                                <label for="username_${serviceId}">Username:</label>
                                <input class="form-control" type="text" name="s_username[${serviceId}]" id="username_${serviceId}" required>
                            </div>
                        <div class="col-md-6">
                                <label for="password_${serviceId}">Password:</label>
                                <input class="form-control" type="text" name="s_password[${serviceId}]" id="password_${serviceId}" required>
                            </div>
                            <div class="col-md-6 d-flex justify-content-between">
                                <label for="alarm_${ serviceId }">Alarm:</label><br>
                                <input type="checkbox" id="alarm_${ serviceId }" name="alarm[${serviceId}]" value="1">
                            </div>
                            <div class="col-md-6 d-flex justify-content-between">
                                <label for="tracking_${ serviceId }">Tracking:</label><br>
                                <input type="checkbox" id="tracking_${ serviceId }" name="tracking[${serviceId}]" value="1">
                            </div>
                        </div>
                        `);
                }else{
                    $('#additional-fields-' + serviceId).html(`
                    <div class="row">
                        <div class="col-md-6">
                            <label for="username_${serviceId}">Username:</label>
                            <input class="form-control" type="text" name="s_username[${serviceId}]" id="username_${serviceId}" required>
                        </div>
                    <div class="col-md-6">
                            <label for="password_${serviceId}">Password:</label>
                            <input class="form-control" type="text" name="s_password[${serviceId}]" id="password_${serviceId}" required>
                        </div>
                    </div>
                    `);
                }

            }

            function removeAdditionalFields(serviceId) {
                $('#additional-fields-' + serviceId).html('');
            }
        });
    </script>
@endsection
