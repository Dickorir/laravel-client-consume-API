

<div class="card">
    <div class="card-body">
        <div class="text-center">
            <p class="font-weight-bold">Settings</p>
        </div>
    </div>
    <div class="app-sidebar-menu">
        <div class="list-group list-group-flush">
            <a href="{{ url('settings/about_us') }}" class="list-group-item d-flex align-items-center {{ Request::segment(2) == 'about_us' ? 'active' : null }}">
                <i data-feather="info" class="width-15 height-15 mr-2"></i>
                About Us
            </a>
            <a href="{{ url('settings/countries') }}" class="list-group-item d-flex align-items-center {{ Request::segment(2) == 'countries' ? 'active' : null }}">
                <i class="fa fa-flag width-15 height-15 mr-2"></i>
                Countries
            </a>
            <a href="{{ url('settings/programs') }}" class="list-group-item d-flex align-items-center {{ Request::segment(2) == 'programs' ? 'active' : null }}">
                <i class="fa fa-tasks width-15 height-15 mr-2"></i>
                Programs
            </a>
            <a href="{{ url('settings/education_levels') }}" class="list-group-item d-flex align-items-center {{ Request::segment(2) == 'education_levels' ? 'active' : null }}">
                <i class="fa fa-graduation-cap width-15 height-15 mr-2"></i>
                Education Levels
            </a>
            <a href="{{ url('settings/payment_statuses') }}" class="list-group-item d-flex align-items-center {{ Request::segment(2) == 'payment_statuses' ? 'active' : null }}">
                <i class="fa fa-money width-15 height-15 mr-2"></i>
                Payment Status
            </a>
            <a href="{{ url('settings/configs') }}" class="list-group-item d-flex align-items-center {{ Request::segment(2) == 'configs' ? 'active' : null }}">
                <i class="fa fa-cog width-15 height-15 mr-2"></i>
                Configs
            </a>
        </div>
    </div>
</div>
