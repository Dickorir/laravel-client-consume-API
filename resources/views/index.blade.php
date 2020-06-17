@extends('layouts/default')

{{-- Page title --}}
@section('title')
    ISBN
    @parent
@stop

{{-- page level styles --}}
@section('header_styles')
    <!-- put styling here -->
@stop
{{-- Page content --}}
@section('content')
    <!-- Content -->
    <div class="content">
        <div class="page-header">
            <div>
                <h3>ISBN</h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="#">Home</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                    </ol>
                </nav>
            </div>
            <div>
                <!-- <div id="ecommerce-dashboard-daterangepicker" class="btn bg-white"> -->

                <div id="" class="btn bg-white">
                    {{ date('d D M Y') }}
                    <span></span>
                </div>
                <a href="#" class="btn btn-primary ml-2" data-toggle="dropdown">
                    <i data-feather="download"></i>
                </a>
                <!--<div class="dropdown-menu dropdown-menu-right">
                    <a href="#" class="dropdown-item">Download</a>
                    <a href="#" class="dropdown-item">Print</a>
                </div>  -->

            </div>
        </div>

        <div class="row">
            <div class="col-lg-4 col-md-12">
                <div class="card bg-secondary">
                    <div class="card-body">
                        <h6 class="card-title d-flex justify-content-between">
                            Members
                            <small class="opacity-7">All</small>
                        </h6>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="font-size-35">500</div>
                            <div class="icon-block icon-block-xl icon-block-floating icon-block-outline-white opacity-7">
                                <i class="ti-user"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="card bg-info">
                    <div class="card-body">
                        <h6 class="card-title d-flex justify-content-between">
                            Fully Reg Members
                            <small class="opacity-7">All</small>
                        </h6>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="font-size-35">700</div>
                            <div class="icon-block icon-block-xl icon-block-floating icon-block-outline-white opacity-7">
                                <i class="ti-package"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="card bg-warning">
                    <div class="card-body">
                        <h6 class="card-title d-flex justify-content-between">
                            Users
                            <small class="opacity-7">All</small>
                        </h6>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="font-size-35">68</div>
                            <div class="icon-block icon-block-xl icon-block-floating icon-block-outline-white opacity-7">
                                <i class="ti-user"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- ./ Content -->
@stop

{{-- page level scripts --}}
@section('footer_scripts')
    <!-- put scripts gera -->
@stop
