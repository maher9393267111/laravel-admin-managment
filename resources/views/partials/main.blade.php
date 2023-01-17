<!-- [ Main Content ] start -->
<div class="row"> 
    <div class="col-md-12 col-xl-3">
        <div class="card support-bar overflow-hidden">
            <div class="card-body pb-0">
                <h2 class="m-0">{{ App\Models\User::count() }}</h2>
                <span class="text-c-blue">Users</span>
                <p class="mb-3 mt-3">Total number of registered staff in the system.</p>
            </div>
            <div id=""></div>
            <div class="card-footer bg-primary text-white">
                {{-- <div class="row text-center">
                    <div class="col">
                        <h4 class="m-0 text-white">{{App\Models\User::where("position","C.E.O")->count()}}</h4>
                        <span>Admin</span>
                    </div>
                    <div class="col">
                        <h4 class="m-0 text-white">{{App\Models\User::where("position","manager")->count()}}</h4>
                        <span>Manager</span>
                    </div>
                    <div class="col">
                        <h4 class="m-0 text-white">{{App\Models\User::where("position","user")->count()}}</h4>
                        <span>Staff</span>
                    </div>
                </div> --}}
            </div>
        </div>
    </div> 
    <div class="col-md-12 col-xl-3">
        <div class="card support-bar overflow-hidden">
            <div class="card-body pb-0">
                <h2 class="m-0">{{App\Models\Department::count()}}</h2>
                <span class="text-c-blue">Departments</span>
                <p class="mb-3 mt-3">Total number of department in the syatem.</p>
            </div>
            <div id=""></div>
            <div class="card-footer bg-primary text-white">
                {{-- <div class="row text-center">
                    <div class="col">
                        <h4 class="m-0 text-white">10</h4>
                        <span>Open</span>
                    </div>
                    <div class="col">
                        <h4 class="m-0 text-white">5</h4>
                        <span>Running</span>
                    </div>
                    <div class="col">
                        <h4 class="m-0 text-white">3</h4>
                        <span>Solved</span>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>  
        <div class="col-md-12 col-xl-3">
        <div class="card support-bar overflow-hidden">
            <div class="card-body pb-0">
                <h2 class="m-0">{{App\Models\Leavetype::count()}}</h2>
                <span class="text-c-blue">Leave Types</span>
                <p class="mb-3 mt-3">Total number of leave types in the system.</p>
            </div>
            <div id=""></div>
            <div class="card-footer bg-primary text-white">
                {{-- <div class="row text-center">
                    <div class="col">
                        <h4 class="m-0 text-white">10</h4>
                        <span>Open</span>
                    </div>
                    <div class="col">
                        <h4 class="m-0 text-white">5</h4>
                        <span>Running</span>
                    </div>
                    <div class="col">
                        <h4 class="m-0 text-white">3</h4>
                        <span>Solved</span>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
    <div class="col-md-12 col-xl-3">
        <div class="card support-bar overflow-hidden">
            <div class="card-body pb-0">
                <h2 class="m-0">{{App\Models\Leave::count()}}</h2>
                <span class="text-c-blue">Applied Leaves</span>
                <p class="mb-3 mt-3">Total number of applied leaves in the system.</p>
            </div>
            <div id=""></div>
            <div class="card-footer bg-primary text-white">
                {{-- <div class="row text-center">
                    <div class="col">
                        <h4 class="m-0 text-white">10</h4>
                        <span>Open</span>
                    </div>
                    <div class="col">
                        <h4 class="m-0 text-white">5</h4>
                        <span>Running</span>
                    </div>
                    <div class="col">
                        <h4 class="m-0 text-white">3</h4>
                        <span>Solved</span>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
    <!-- Widget primary-success card end -->



    <!-- [ Main Content ] start -->
    <div class="row">
        <!-- table card-1 start -->
        <div class="col-md-12 col-xl-4">
            
            <!-- widget primary card start -->
            <div class="card flat-card widget-primary-card">
                <div class="row-table">
                    <div class="col-sm-3 card-body">
                        <button class="btn  btn-icon btn-success"><i class="feather icon-check-circle"></i></button>
                    </div>
                    <div class="col-sm-9">
                        <h4>{{App\Models\Leave::where('admin_status','approved')->count()}}</h4>
                        <h6>Approved Leaves</h6>
                    </div>
                </div>
            </div>
            <!-- widget primary card end -->
        </div>

        <!-- table card-2 start -->
        <div class="col-md-12 col-xl-4">
        <!-- widget-success-card start -->
        <div class="card flat-card widget-purple-card">
            <div class="row-table">
                <div class="col-sm-3 card-body">
                    <button class="btn  btn-icon btn-warning"><i class="feather icon-alert-triangle"></i></button>
                </div>
                <div class="col-sm-9">
                    <h4>{{App\Models\Leave::where("admin_status","pending")->count()}}</h4>
                    <h6>Pending Leaves</h6>
                </div>
            </div>
        </div>
        <!-- widget-success-card end -->
        </div>
        <!-- [ sample-page ] end -->

        <!-- table card-3 start -->
        <div class="col-md-12 col-xl-4">
            <!-- widget primary card start -->
            <div class="card flat-card widget-primary-card">
                <div class="row-table">
                    <div class="col-sm-3 card-body">
                        <button class="btn  btn-icon btn-danger"><i class="feather icon-slash"></i></button> 
                    </div>
                    <div class="col-sm-9">
                        <h4>{{App\Models\Leave::where("admin_status","declined")->count()}}</h4>
                        <h6>Declined Leaves</h6>
                    </div>
                </div>
            </div>
            <!-- widget primary card end -->
        </div>
    </div>
    <!-- [ sample-page ] end -->
</div>
<!-- [ sample-page ] start -->
<div class="col-sm-12">
    <div class="card">

        <div class="card-header">
            <h5>Leave Management</h5>
            <div class="card-header-right">
                <div class="btn-group card-option">
                    <button type="button" class="btn dropdown-toggle btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="feather icon-more-horizontal"></i>
                    </button>
                    <ul class="list-unstyled card-option dropdown-menu dropdown-menu-right">
                        <li class="dropdown-item full-card"><a href="#!"><span><i class="feather icon-maximize"></i> maximize</span><span style="display:none"><i class="feather icon-minimize"></i> Restore</span></a></li>
                        <li class="dropdown-item minimize-card"><a href="#!"><span><i class="feather icon-minus"></i> collapse</span><span style="display:none"><i class="feather icon-plus"></i> expand</span></a></li>
                        <li class="dropdown-item reload-card"><a href="#!"><i class="feather icon-refresh-cw"></i> reload</a></li>
                        <li class="dropdown-item close-card"><a href="#!"><i class="feather icon-trash"></i> remove</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="card-body">
            <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui
                officia deserunt mollit anim id est laborum."
            </p>
            <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui
                officia deserunt mollit anim id est laborum."
            </p>
            <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui
                officia deserunt mollit anim id est laborum."
            </p>
        </div>
    </div>
</div>
<!-- [ Main Content ] end -->