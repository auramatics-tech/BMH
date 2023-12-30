<html lang="en">
<!--begin::Head-->

<head>
    <base href="">
    <meta charset="utf-8" />
    <title>BMH</title>
  <link rel="icon" type="image/x-icon" href="{{asset('frontend/images/logophotoshop.jpg')}}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->

    @guest
        <!--begin::Page Custom Styles(used by login page)-->
        <link href="{{ asset('backend/assets/css/pages/login/classic/login-4.css') }}" rel="stylesheet" type="text/css" />
        <!--end::Page Custom Styles-->
    @endguest

    <!--begin::Global Theme Styles(used by all pages)-->
    <link href="{{ asset('backend/assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/assets/plugins/custom/prismjs/prismjs.bundle.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('backend/assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Global Theme Styles-->
    <!--begin::Layout Themes(used by all pages)-->
    <link href="{{ asset('backend/assets/css/themes/layout/header/base/light.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('backend/assets/css/themes/layout/header/menu/light.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('backend/assets/css/themes/layout/brand/dark.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/assets/css/themes/layout/aside/dark.css') }}" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <!--end::Layout Themes-->
    <link rel="shortcut icon" href="{{ asset('assets/media/logos/favicon.ico') }}" />
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}"> -->
    <!-- <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}"> -->
    <link rel="stylesheet" href="{{ asset('assets/css/advertisement.css') }}">
    <link href="//cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />  
      @yield('css')

</head>
<!--end::Head-->

<body id="kt_body"
    class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">

    @auth
        @include('backend.layouts.header_mobile')
    @endauth
    <div class="d-flex flex-column flex-root">
        <!--begin::Page-->
        <div class="d-flex flex-row flex-column-fluid page">
            @auth
                <!--begin::Aside-->
                @include('backend.layouts.sidebar')
                <!--end::Aside-->
            @endauth

            @auth
                <!--begin::Wrapper-->
                <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
                    <!--begin::Header-->
                    @include('backend.layouts.header')
                    <!--end::Header-->
                    <!--begin::Content-->
                    @yield('content')
                    <!--begin::Footer-->
                    @include('backend.layouts.footer')
                    <!--end::Footer-->
                </div>
            @else
                <div class="login login-4 login-signin-on d-flex flex-row-fluid" id="kt_login">
                    @yield('content')
                </div>
            @endauth
            <!--end::Wrapper-->
        </div>
        <!--end::Page-->
    </div>
    <!--begin::Scrolltop-->
    <div id="kt_scrolltop" class="scrolltop">
        <span class="svg-icon">
            <!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Up-2.svg-->
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                height="24px" viewBox="0 0 24 24" version="1.1">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <polygon points="0 0 24 0 24 24 0 24" />
                    <rect fill="#000000" opacity="0.3" x="11" y="10" width="2" height="10" rx="1" />
                    <path
                        d="M6.70710678,12.7071068 C6.31658249,13.0976311 5.68341751,13.0976311 5.29289322,12.7071068 C4.90236893,12.3165825 4.90236893,11.6834175 5.29289322,11.2928932 L11.2928932,5.29289322 C11.6714722,4.91431428 12.2810586,4.90106866 12.6757246,5.26284586 L18.6757246,10.7628459 C19.0828436,11.1360383 19.1103465,11.7686056 18.7371541,12.1757246 C18.3639617,12.5828436 17.7313944,12.6103465 17.3242754,12.2371541 L12.0300757,7.38413782 L6.70710678,12.7071068 Z"
                        fill="#000000" fill-rule="nonzero" />
                </g>
            </svg>
            <!--end::Svg Icon-->
        </span>
    </div>
    <!--end::Scrolltop-->
    <script>
        var HOST_URL = "{{ url('/') }}";

    </script>
    <!--begin::Global Config(global config for global JS scripts)-->
    <script>
        var KTAppSettings = {
            "breakpoints": {
                "sm": 576,
                "md": 768,
                "lg": 992,
                "xl": 1200,
                "xxl": 1400
            },
            "colors": {
                "theme": {
                    "base": {
                        "white": "#ffffff",
                        "primary": "#3699FF",
                        "secondary": "#E5EAEE",
                        "success": "#1BC5BD",
                        "info": "#8950FC",
                        "warning": "#FFA800",
                        "danger": "#F64E60",
                        "light": "#E4E6EF",
                        "dark": "#181C32"
                    },
                    "light": {
                        "white": "#ffffff",
                        "primary": "#E1F0FF",
                        "secondary": "#EBEDF3",
                        "success": "#C9F7F5",
                        "info": "#EEE5FF",
                        "warning": "#FFF4DE",
                        "danger": "#FFE2E5",
                        "light": "#F3F6F9",
                        "dark": "#D6D6E0"
                    },
                    "inverse": {
                        "white": "#ffffff",
                        "primary": "#ffffff",
                        "secondary": "#3F4254",
                        "success": "#ffffff",
                        "info": "#ffffff",
                        "warning": "#ffffff",
                        "danger": "#ffffff",
                        "light": "#464E5F",
                        "dark": "#ffffff"
                    }
                },
                "gray": {
                    "gray-100": "#F3F6F9",
                    "gray-200": "#EBEDF3",
                    "gray-300": "#E4E6EF",
                    "gray-400": "#D1D3E0",
                    "gray-500": "#B5B5C3",
                    "gray-600": "#7E8299",
                    "gray-700": "#5E6278",
                    "gray-800": "#3F4254",
                    "gray-900": "#181C32"
                }
            },
            "font-family": "Poppins"
        };

    </script>
    <!--end::Global Config-->
    <!--begin::Global Theme Bundle(used by all pages)-->
    <script>
        var HOST_URL = "{{ url('/admin') }}";
    </script>
    <script src="{{ asset('backend/assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/custom/prismjs/prismjs.bundle.js') }}"></script>
    <script src="{{ asset('backend/assets/js/scripts.bundle.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <!--end::Global Theme Bundle-->
    <script src="//cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
     $(document).on('click', ".deleteRecord", function() {
        var $this = $(this);
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                var id = $this.attr('rel');
                var deleteFunction = $this.attr('rel1');
                window.location.href = HOST_URL + "/" + deleteFunction + "/" + id;
                Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success',
                )
            }
        })
    });
    </script>

    @yield('script')
</body>
<!--end::Body-->

</html>
