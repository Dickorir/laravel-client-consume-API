

<div class="card">
    <div class="card-body">
        <div class="text-center">
            <p class="font-weight-bold">Start Up Info</p>
            <div class="mem-info float-left text-left" style="margin-top: -15px;">
                <p><i class="fa fa-hourglass-start"></i>&nbsp; {{ $start_up->startUp ?? "" }}</p>
                <hr style="margin-bottom: 2px;margin-top: 10px;">
                <p><i class="fa fa-user"></i>&nbsp; {{ $start_up->member->firstName.' '.$start_up->member->lastName }}</p>
                <p><i class="fa fa-phone"></i>&nbsp;  {{ $start_up->member->phone ?? "" }}</p>
                <p><i class="fa fa-id-badge"></i>&nbsp; {{ $start_up->member->email ?? "" }}</p>
            </div>
        </div>
    </div>

    <div class="app-sidebar-menu">
        <div class="list-group list-group-flush">
            <a href="{{ url('start-up', $start_up->id) }}" class="list-group-item d-flex align-items-center {{ Request::segment(2) == $start_up->id ? 'active' : null }}">
                <i data-feather="info" class="width-15 height-15 mr-2"></i>
                Details
            </a>
            <a href="{{ url('start-up/customers', $start_up->id) }}" class="list-group-item d-flex align-items-center {{ Request::segment(2) == 'customers' ? 'active' : null }}">
                <i class="fa fa-support mr-2"></i>
                Customers
            </a>
            <a href="{{ url('start-up/teams', $start_up->id) }}" class="list-group-item d-flex align-items-center {{ Request::segment(2) == 'teams' ? 'active' : null }}">
                <i class="fa fa-object-group mr-2"></i>
                Teams
            </a>
            <a href="{{ url('start-up/finances', $start_up->id) }}" class="list-group-item d-flex align-items-center {{ Request::segment(2) == 'finances' ? 'active' : null }}">
                <i class="fa fa-money mr-2"></i>
                Finances
            </a>
            <a href="{{ url('start-up/tractions', $start_up->id) }}" class="list-group-item d-flex align-items-center {{ Request::segment(2) == 'tractions' ? 'active' : null }}">
                <i class="fa fa-universal-access mr-2"></i>
                Tractions
            </a>
        </div>
    </div>
</div>
