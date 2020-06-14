<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>International Business Students Network (IBSN)</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/media/logo/favicon-white.png') }}"/>

    <!-- Plugin styles -->
    <link rel="stylesheet" href="../../vendors/bundle.css" type="text/css">

    <!-- App styles -->
    <link rel="stylesheet" href="../../assets/css/app.min.css" type="text/css">
    <link rel="stylesheet" href="../../assets/css/custom.css" type="text/css">
    <style>
        .custom-checkbox .custom-control-input:checked ~ .custom-control-label::before, .custom-radio .custom-control-input:checked ~ .custom-control-label::before, .custom-switch .custom-control-input:checked ~ .custom-control-label::before {
            border-color: #2DAD3B;
            background-color:#2DAD3B;
        }
        .btn.btn-primary:not(:disabled):not(.disabled):hover, a.btn[href="#next"]:not(:disabled):not(.disabled):hover, a.btn[href="#previous"]:not(:disabled):not(.disabled):hover, .btn.btn-primary:not(:disabled):not(.disabled):focus, a.btn[href="#next"]:not(:disabled):not(.disabled):focus, a.btn[href="#previous"]:not(:disabled):not(.disabled):focus, .btn.btn-primary:not(:disabled):not(.disabled):active, a.btn[href="#next"]:not(:disabled):not(.disabled):active, a.btn[href="#previous"]:not(:disabled):not(.disabled):active, .btn.btn-primary:not(:disabled):not(.disabled).active, a.btn[href="#next"]:not(:disabled):not(.disabled).active, a.btn[href="#previous"]:not(:disabled):not(.disabled).active {
            cursor: pointer;
            background: #092e56;
            border-color: #7a2327;
        }
        .btn.btn-primary, a.btn[href="#next"], a.btn[href="#previous"] {
            background: #7a2327;
            border-color: #680005;
            cursor: pointer;
        }
    </style>
</head>
<body class="form-membership">

<!-- begin::preloader-->
<div class="preloader">
    <div class="preloader-icon"></div>
</div>
<!-- end::preloader -->

<div class="form-wrapper">
    <!-- logo -->
    <div id="logo" style="margin-top:-30px;">
        {{--        <img class="logo" src="../../assets/media/image/logo.png" alt="image">--}}
        {{--        <img class="logo-dark" src="../../assets/media/image/logo-dark.png" alt="image">--}}
        <img class="logo" src="{{ asset('assets/media/logo/transparent.png') }}" alt="logo" style="width:310px;margin-bottom:-30px;">

    </div>
    <!-- ./ logo -->

    <h5>Sign in</h5>
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissable margin5">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong>Whoops!</strong> Invalid credentials
        </div>
    @endif
<!-- form -->
    <form class="needs-validation" action="{{ url('login') }}" method="post" novalidate>
        @csrf
        <div class="form-group">
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" required value="{{ old('email') }}" placeholder="Email" autofocus>
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group">
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">

            @error('password')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
        </div>
        <div class="form-group d-flex justify-content-between">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" checked="" id="customCheck1">
                <label class="custom-control-label" for="customCheck1">Remember me</label>
            </div>
            <a href="#">Reset password</a>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Sign in</button>
    </form>
    <!-- ./ form -->


</div>

<!-- Plugin scripts -->
<script src="../../vendors/bundle.js"></script>

<!-- App scripts -->
<script src="../../assets/js/app.min.js"></script>
<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>
</body>

</html>
