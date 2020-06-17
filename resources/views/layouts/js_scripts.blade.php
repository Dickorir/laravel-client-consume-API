
<script src="{{ asset('vendors/bundle.js') }}"></script>

<!-- To use theme colors with Javascript -->
<div class="colors">
    <div class="bg-primary"></div>
    <div class="bg-primary-bright"></div>
    <div class="bg-secondary"></div>
    <div class="bg-secondary-bright"></div>
    <div class="bg-info"></div>
    <div class="bg-info-bright"></div>
    <div class="bg-success"></div>
    <div class="bg-success-bright"></div>
    <div class="bg-danger"></div>
    <div class="bg-danger-bright"></div>
    <div class="bg-warning"></div>
    <div class="bg-warning-bright"></div>
</div>

<!-- Apex chart -->
<script src="{{ asset('assets/js/irregular-data-series.js') }}"></script>
<script src="{{ asset('vendors/charts/apex/apexcharts.min.js') }}"></script>

<!-- Daterangepicker -->
<script src="{{ asset('vendors/datepicker/daterangepicker.js') }}"></script>

<!-- DataTable -->
<script src="{{ asset('vendors/dataTable/datatables.min.js') }}"></script>

<!-- Vamp -->
<script src="{{ asset('vendors/vmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('vendors/vmap/maps/jquery.vmap.usa.js') }}"></script>
<script src="{{ asset('assets/js/muson/vmap.js') }}"></script>

<!-- Dashboard scripts -->
<script src="{{ asset('assets/js/muson/pages/ecommerce-dashboard.js') }}"></script>

<!-- App scripts -->
<script src="{{ asset('assets/js/app.min.js') }}"></script>

<script type="text/javascript">
    toastr.options = {
        timeOut: 5000,
        progressBar: true,
        showMethod: "fadeIn",
        hideMethod: "fadeOut",
        showDuration: "300",
        hideDuration: "1000",
        extendedTimeOut: "1000",
        showEasing: "swing",
        hideEasing: "linear",
    };
</script>

@include('notification.notifications')
