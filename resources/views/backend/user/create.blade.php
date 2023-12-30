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
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Categories Management</h5>
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
                <form action="{{route('admin.save_category')}}" method="post">
                    @csrf
                    @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            <li>All field are mandatory</li>
                        </ul>
                    </div>
                    @endif
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Title<span class="text-danger">*</span></label>
                                    <input type="hidden" class="form-control" name="id" value="{{ isset($data->id) ? $data->id : '' }}" />
                                    <input type="text" class="form-control" name="title" value="{{ isset($data->title) ? $data->title : '' }}" placeholder="Title" />
                                </div>
                            </div>
                            <div class="col-md-6" id="cat_div">
                                <div class="form-group">
                                    <label>Category<span class="text-danger">*</span></label>
                                    <select class="form-control" id="category" name="category_id">
                                        <option value="">Select Category</option>
                                        @foreach ($categories as $category)
                                        <option @if ((isset($form->category_id) && $form->category_id == $category->id) || (isset($data['category']) && $data['category']->id == $category->id)) selected @endif value="{{ $category->id }}">
                                            {{ $category->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6" class="form-group">
                                <label>Type<span class="text-danger">*</span></label>
                                <select class="form-control" id="type" name="type">
                                    <option value="">Select Type</option>
                                    <option @if(isset($data->type) && $data->type == 1) selected @endif value="1"> Pdf </option>
                                    <option @if(isset($data->type) && $data->type == 2) selected @endif value="2"> Image </option>
                                    <option @if(isset($data->type) && $data->type == 3) selected @endif value="3"> Video </option>
                                </select>
                                @error('type')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-6" class="form-group" id="image_type" @if(isset($data->session_category) && $data->session_category != '4')
                                style="display:none;" @endif>
                                <div class="form-group">
                                    <label>Session Description
                                        <span class="text-danger">*</span></label>
                                    <textarea name="session_description" id="session_description" style="width: 100%;">{{ isset($data->session_description) ? $data->session_description : ''}}</textarea>
                                    @error('session_description')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label> Pdf
                                        <span class="text-danger">*</span></label>
                                    <input type="file" class="form-control" name="pdf" placeholder="Pdf" />
                                    @error('session_banner')
                                    <span class="pdf" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
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

<!--begin::Page Scripts(used by this page)-->
<script src="{{ asset('backend/assets/js/pages/crud/ktdatatable/base/html-table.js') }}"></script>
<!--end::Page Scripts-->
<script>
    $('#type').change(function() {
        group_session()
    });
    $(document).ready(function() {
        group_session()
    })

    function group_session() {
        if ($('#type').val() == '1') {
            $('#image_type').show();
        } else {
            $('#image_type').hide();
        }
    }
</script>

@endsection