<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title class="text-capitalize">{{ $title }}</title>
    {{--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">--}}
    {{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">--}}
    <link href="assets/css/bootstrap.css" rel="stylesheet" type="text/css"/>
    <link href="assets/css/print.css" rel="stylesheet" type="text/css"/>
    <style>
        .mb-1, .my-1 {
            margin-bottom: -3px!important;
        }
    </style>

</head>
<body>
<section class="content">
    <div class="row">
        <div class="col-12" id="invoice-stmt" style="">
            <div class="card">
                <div class="card-body p-0">
                    <div class="row py-2 px-5 mt-20">

                        <div class="col-md-12 text-center">
                            {{--                            <h4 class="font-weight-bold mb-1">Supa Chama</h4>--}}
                            <img src="assets/media/image/logosu.png" alt="Logo" width="250" class="logo"/>
                            {{--                                <img src="{{ asset('assets/media/image/logosu.png') }}" alt="Logo" width="250" class="logo"/>--}}
                        </div>
                    </div>
                    <div class="row px-5 clearfix">
                        <div class="col-md-12 text-center">
                            {{--<img src="img/nandi_logo.png" alt="Logo" width="100" class="logo" style="margin-top: 17px"/>--}}
                        </div>
                    </div>
                    <div class="row py-2 px-5 mt-2 clearfix">
                        <div class="col-md-12 text-center">
                            <p class="font-weight-bold mb-1 text-uppercase"> {{ $title }} </p>
                        </div>
                    </div>
                    <div class="row text-right">
                        <div class="col">

                        </div>
                        <div class="col">
                            <h6 class="font-weight-normal mb-1"> Date: {{ date('D d-m-Y') }}</h6>
                        </div>
                    </div>

                    <hr class="my-1">

                    <div class="row px-4">
                        <div class="col-md-12 text-left">
                            <p class="font-weight-bold mb-1"> </p>
                        </div>
                        <div class="col-md-12" id="table_repo">
                            <!--  -->
                            @yield('content')

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
</body>
</html>
