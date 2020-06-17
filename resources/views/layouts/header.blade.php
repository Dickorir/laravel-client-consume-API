
<div class="header d-print-none" style="">
    <div class="header-container">
        <div class="header-left">
            <div class="navigation-toggler">
                <a href="#" data-action="navigation-toggler">
                    <i data-feather="menu"></i>
                </a>
            </div>

            <div class="header-logo">
                <a href={{ url('dashboard') }}>
                    <img class="logo" src="{{ asset('assets/media/logo/transparent.png') }}" alt="logo" style="width: 280px">
                </a>
            </div>
        </div>

        <div class="header-body">
            <div class="header-body-left">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <div class="header-search-form">
                            <form>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <button class="btn">
                                            <i data-feather="search"></i>
                                        </button>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Search" style="">
                                    <div class="input-group-append">
                                        <button class="btn header-search-close-btn">
                                            <i data-feather="x"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </li>
                </ul>
            </div>

            <div class="header-body-right">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="#" class="nav-link mobile-header-search-btn" title="Search">
                            <i data-feather="search"></i>
                        </a>
                    </li>

                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link" title="Fullscreen" data-toggle="fullscreen">
                            <i class="maximize" data-feather="maximize"></i>
                            <i class="minimize" data-feather="minimize"></i>
                        </a>
                    </li>



                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" title="User menu" data-toggle="dropdown">
                            <figure class="avatar avatar-sm">
                                <img src="{{ asset('assets/media/image/user/avatar.png') }}" class="rounded-circle"
                                     alt="avatar">
                            </figure>
{{--                            <span class="ml-2 d-sm-inline d-none">lele</span>--}}
                            <span class="ml-2 d-sm-inline d-none">{{ session()->get('user')->name }}</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-big">
                            <div class="text-center py-4" data-background-image="{{ asset('assets/media/image/image1.jpg') }}">
                                <figure class="avatar avatar-lg mb-3 border-0">
                                    <img src="{{ asset('assets/media/image/user/avatar.png') }}" class="rounded-circle" alt="image">
                                </figure>
{{--                                <h5 class="mb-0">lolo</h5>--}}
                                <h5 class="mb-0">{{ session()->get('user')->name }}</h5>
                            </div>
                            <div class="list-group list-group-flush">
                                <a href="{{ url('profile') }}" class="list-group-item"><i class="fa fa-user"></i> Profile</a>
                                <a href="{{ url('/signout') }}" class="list-group-item"><i class="fa fa-sign-out"></i> Sign Out!</a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <ul class="navbar-nav ml-auto">
            <li class="nav-item header-toggler">
                <a href="#" class="nav-link">
                    <i data-feather="arrow-down"></i>
                </a>
            </li>
        </ul>
    </div>
</div>
