@extends('backend.layouts.master')
@section('css')
<style>
    .cke_reset{
        min-height: 600px;
    }
    .si_privacy_btn{
        margin-left: 20px;
    }
</style>
@endsection
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
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Terms and Conditions</h5>
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
                <form action="{{route('admin.store_terms')}}" method="post">
                    @csrf
                    @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            <li>All field are mandatory</li>
                        </ul>
                    </div>
                    @endif
                    <div class="card-body">
                        <div class="row px-4">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label><h5>Terms & Conditions<span class="text-danger">*</span></h5></label>
                                    <textarea class="form-control" name="terms" id="terms" style="width: 100%;">{{ isset($data->terms) ? $data->terms : '' }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="si_privacy_btn">
                        <button type="submit" class="btn btn-primary">Submit</button>
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
<script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
<script type="text/javascript">
    CKEDITOR.replace('terms', {
        filebrowserUploadUrl: HOST_URL + "/ck-image?_token={{csrf_token()}}",
        filebrowserUploadMethod: 'form'
    });
</script>
@endsection