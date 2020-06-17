<!doctype html>
<html lang="en">

@include('layouts.head')
@yield('header_styles')

<body  class="horizontal-navigation" >
<!-- Preloader -->
<div class="preloader">
    <div class="preloader-icon"></div>
</div>
<!-- ./ Preloader -->

<!-- Layout wrapper -->
<div class="layout-wrapper">

    <!-- Header -->
@include('layouts.header')
<!-- ./ Header -->

    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- begin::navigation -->
    @include('layouts.navigation')
    <!-- end::navigation -->

        <!-- Content body -->
        <div class="content-body">
        <!-- Content -->
        @yield('content')
        <!-- ./ Content -->

        <!-- Footer -->
        @include('layouts.footer')
        <!-- ./ Footer -->
        </div>
        <!-- ./ Content body -->
    </div>
    <!-- ./ Content wrapper -->
</div>
<!-- ./ Layout wrapper -->

<!-- Main scripts -->
@include('layouts.js_scripts')
@yield('footer_scripts')

</body>

</html>
