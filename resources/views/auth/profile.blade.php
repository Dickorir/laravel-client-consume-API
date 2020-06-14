@extends('layouts/default')

{{-- Page title --}}
@section('title')
    IBSN
    @parent
@stop

{{-- page level styles --}}
@section('header_styles')
    <!-- put styling here -->

    <!-- DataTable -->
    <link rel="stylesheet" href="../../vendors/dataTable/datatables.min.css" type="text/css">
@stop
{{-- Page content --}}
@section('content')
    <!-- Content -->

    <div class="content">

        <div class="page-header">
            <div class="col-md-4">
                <div>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="#">Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Profile</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="col-md-4">
                <div class="text-center">
                    <p class="font-weight-bold">Profile</p>
                </div>
            </div>
            <div class="col-md-4">
            </div>


        </div>


        <div class="row">
            <div class="col-md-12">

                <div class="row">
                    <div class="col-md-3 app-sidebar">
                        <div class="card">
                            <div class="card-body">

                            </div>
                        </div>
                        <div class="app-sidebar-menu">
                            <div class="list-group list-group-flush">

                                <a href="#profile" class="list-group-item d-flex " data-toggle="tab" role="tab" aria-selected="true">
                                    <i data-feather="info" class="width-15 height-15 mr-2"></i>
                                    Personal Details
                                    <!-- <span class="small ml-auto">45</span> -->
                                </a>
                                <a href="#password" class="list-group-item d-flex " data-toggle="tab" role="tab" aria-selected="true">
                                    <i data-feather="key" class="width-15 height-15 mr-2"></i>
                                    Change Password
                                    <!-- <span class="small ml-auto">45</span> -->
                                </a>


                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="profile" role="tabpanel">
                                <div class="card">
                                    <div class="card-body">
                                        <h6 class="card-title">Profile</h6>
                                        <hr>
                                        <div class="ml-5 mr-5">
                                            <ul class="list-group list-group-flush mb-3">
                                                <li class="list-group-item px-0">
                                                    <p class="font-weight-bold">Name</p>
                                                    <p>{{ auth()->user()->name ?? 'None' }}</p>
                                                </li>
                                                <li class="list-group-item px-0">
                                                    <p class="font-weight-bold">Email</p>
                                                    <p>{{ auth()->user()->email ?? 'None' }}</p>
                                                </li>
                                                <li class="list-group-item px-0">
                                                    <p class="font-weight-bold">Phone Number</p>
                                                    <p>{{ auth()->user()->phone ?? 'None' }}</p>
                                                </li>
                                            </ul>
                                            <a href="{{ url('edit-profile') }}" class="text-secondary edit-prof btn-info btn" id="" data-toggle="modal" data-target="#profile-modal" title="Edit">
                                                <i class="ti-pencil text-white" >&nbsp;Edit Profile</i>&nbsp;&nbsp;
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="password" role="tabpanel">
                                <div class="card">
                                    <div class="card-body">
                                        <h6 class="card-title">Change Password</h6>
                                        <hr>
                                        <div >
                                            <div id="validation-errors"></div>
                                            <form class="needs-validation" id="change-password-form" method="POST" action="{{ route('passwordreset') }}">
                                                @csrf
                                                <div class="form-row">
                                                    <div class="col mb-3">
                                                        <label for="password">New password</label>
                                                        <input type="password" name="password" id="password"
                                                               class="form-control"/>
                                                        {{ $errors->first('password', '<span class="help-block">:message</span>') }}
                                                    </div>
                                                    <div class="col mb-3">
                                                        <label class="control-label" for="password_confirm">Confirm Password</label>
                                                        <input type="password" name="password_confirm" id="password_confirm"
                                                               value="{{ old('password_confirm') }}" class="form-control"/>
                                                        {{ $errors->first('password_confirm', '<span class="help-block">:message</span>') }}
                                                    </div>
                                                </div>
                                                <button class="btn btn-primary float-right" id="change-password" type="submit">Change</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-3">
                        <div class="card">

                        </div>
                    </div>

                    <div class="modal fade" tabindex="-1" role="dialog" id="profile-modal">
                        <div class="modal-dialog modal-sm" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Edit Profile </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <i class="ti-close"></i>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div id="validation-errors-profile"></div>

                                    <form class="needs-validation" id="edit-profile-form" method="POST" action="">
                                        @csrf

                                        <div class="form-row">
                                            <div class="mb-3">
                                                <label>Name</label>
                                                <input type="text" class="form-control" name="name" value="{{ auth()->user()->name }}">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="mb-3">
                                                <label>Email</label>
                                                <input type="text" class="form-control" name="email" value="{{ auth()->user()->email }}">
                                            </div>
                                        </div>
                                        {{--<div class="form-row">
                                            <div class="mb-3">
                                                <label>Phone</label>
                                                <input type="text" class="form-control" name="phone" value="{{ auth()->user()->phone }}">
                                            </div>
                                        </div>--}}
                                        <div>
                                            <div class="d-flex justify-content-between float-right">

                                                <button class="btn btn-success" id="sendProfileSubmit" type="submit">
                                                    <i data-feather="send" class="mr-2"></i>
                                                    Update
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
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
    <script type="text/javascript">
        $(document).ready(function(){
            // $("#search_input").bind("keyup change focus", function(event) {
            $("#sendProfileSubmit").click(function(event){
                event.preventDefault();

                jQuery.support.cors = true;
                $.ajax({
                    url: '/updateprofile',
                    method:"POST",
                    data:$('#edit-profile-form').serialize(),
                    beforeSend:function(){
                        //
                    },
                    success:function(data){
                        if (data.status == "errors"){
                            $('#validation-errors-profile').html('');
                            $.each(data.errors, function(key,value) {
                                $('#validation-errors-profile').append('<li class="alert alert-danger">'+value+'</li>');
                            });

                            toastr.error(data.errors,'Error');
                            return false;
                        }else if(data.status == "error") {
                            toastr.error(data.error,'Error');
                        }else if(data.status == "success") {
                            $('#profile-modal').modal('hide');
                            toastr.success(data.success, 'Success');
                        }
                    },
                    error: function (data) {
                        $('#validation-errors-profile').html('');
                        $.each(data.errors, function(key,value) {
                            $('#validation-errors-profile').append('<div class="alert alert-danger">'+value+'</div>');
                        });
                    },
                    complete : function (data){

                    }
                });
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            // $("#search_input").bind("keyup change focus", function(event) {
            $("#change-password").click(function(event){
                event.preventDefault();

                jQuery.support.cors = true;
                $.ajax({
                    url: '/passwordreset',
                    method:"POST",
                    data:$('#change-password-form').serialize(),
                    beforeSend:function(){
                        //
                    },
                    success:function(data){
                        if (data.status == "errors"){
                            $('#validation-errors').html('');
                            $.each(data.errors, function(key,value) {
                                $('#validation-errors').append('<li class="alert alert-danger">'+value+'</li>');
                            });

                            toastr.error(data.errors,'Error');
                            return false;
                        }else if(data.status == "error") {
                            toastr.error(data.error,'Error');
                        }else if(data.status == "success") {
                            toastr.success(data.success, 'Success');
                            window.location = '/signout';
                        }
                    },
                    error: function (data) {
                        $('#validation-errors').html('');
                        $.each(data.errors, function(key,value) {
                            $('#validation-errors').append('<div class="alert alert-danger">'+value+'</div>');
                        });
                    },
                    complete : function (data){

                    }
                });
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function(){

            $(".edit-profd").click(function(event){
                event.preventDefault();
                //Save the link in a variable called element
                var element = $(this);
                //Find the id of the link that was clicked
                var id = element.attr("id");
                $('.profile-modal').modal('show');

                $.ajax({
                    url: '/edit-config/'+id,
                    method:"GET",
                    data:{},
                    beforeSend:function(){
                        //
                    },
                    success:function(data){
                        $('.edit-body').html(data.modal);
                    },
                    error: function (data) {
                        alert('Ooops something went wrong!');
                    },
                    complete : function (data){
                        $('.modal-title').html('Edit Configs');
                    }
                });
            });
        });
    </script>
@stop
