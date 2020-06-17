

<div class="card">
    <div class="card-body">
        <div class="text-center">
            <p class="font-weight-bold">Member Info</p>
            <div class="mem-info float-left text-left" style="margin-top: -15px;">
                <p><i class="fa fa-user"></i>&nbsp; {{ $member->firstName.' '.$member->lastName }}</p>
                <p><i class="fa fa-phone"></i>&nbsp;  {{ $member->phone ?? "" }}</p>
                <p><i class="fa fa-id-badge"></i>&nbsp; {{ $member->nationalID ?? "" }}</p>
            </div>
        </div>
    </div>

    <div class="app-sidebar-menu">
        <div class="list-group list-group-flush">
            <a href="{{ url('member', $member->id) }}" class="list-group-item d-flex align-items-center {{ Request::segment(2) == $member->id ? 'active' : null }}">
                <i data-feather="info" class="width-15 height-15 mr-2"></i>
                Personal Details
                <!-- <span class="small ml-auto">45</span> -->
            </a>
            <a href="{{ url('member/education', $member->id) }}" class="list-group-item {{ Request::segment(2) == 'education' ? 'active' : null }}">
                <i class="width-15 height-15 mr-2 fa fa-graduation-cap"></i>
                Education
            </a>
            <a href="{{ url('member/employment', $member->id) }}" class="list-group-item {{ Request::segment(2) == 'employment' ? 'active' : null }}">
                <i class="width-15 height-15 mr-2 fa fa-credit-card"></i>
                Employment History
            </a>
        </div>
    </div>
</div>
