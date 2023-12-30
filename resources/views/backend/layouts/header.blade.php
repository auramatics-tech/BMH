<!--begin::Header-->
<style>
.dropdown-menu {
    background-color: #ffffff;
    background-clip: padding-box;
    border: 0 solid rgba(0, 0, 0, 0.15);
    border-radius: 0.42rem;
    box-shadow: 0px 0px 0px 0px rgb(82 63 105 / 15%);
}
</style>
<div id="kt_header" class="header header-fixed">
    <!--begin::Container-->
    <div class="container-fluid d-flex align-items-stretch justify-content-between">
        <!--begin::Header Menu Wrapper-->
        <div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">
            <!--begin::Header Menu-->
            <div id="kt_header_menu" class="header-menu header-menu-mobile header-menu-layout-default">

            </div>
            <!--end::Header Menu-->
        </div>
        <!--end::Header Menu Wrapper-->
        <!--begin::Topbar-->
        <div class="topbar">
            <!--begin::User-->
            <div class="topbar-item">
                <div class=" w-auto btn-clean d-flex align-items-center btn-lg px-2" id="kt_quick_user_toggle">
                    <span class="text-muted font-weight-bold font-size-base d-none d-md-inline mr-1">Hi,</span>
                    <span class="text-dark-50 font-weight-bolder font-size-base d-none d-md-inline mr-3">{{Auth::user()->name}}</span>
                    <div class="dropdown">
                    <span class="symbol symbol-lg-35 symbol-25 symbol-light-success"id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="symbol-label font-size-h5 font-weight-bold">{{Auth::user()->name[0]}}</span>
                    </span>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="{{route ('admin.profile')}}">Edit Profile</a></li>
                        <li><a class="dropdown-item" href="{{route ('admin.logout')}}">Log out</a></li>
                        
                    </ul>
                    </div>
                </div>
            </div>
            <!--end::User-->
        </div>
        <!--end::Topbar-->
    </div>
    <!--end::Container-->
</div>
<!--end::Header-->