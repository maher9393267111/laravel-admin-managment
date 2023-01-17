@extends('layouts.app')
@section('content')
    {{-- <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <div class="loader-bg">
		<div class="loader-track">
			<div class="loader-fill"></div>
		</div>
	</div>
  @include('partials.preloader')
	<!-- [ Pre-loader ] End -->
	@include('partials.nav')
	<!-- [ Header ] start -->
	@include('partials.header')
	<!-- [ Header ] end -->
	
	

    <!-- [ Main Content ] start -->
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <!-- [ breadcrumb ] start -->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h5 class="m-b-10">Dashboard</h5>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href=""><i class="feather icon-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="{{route('user.index')}}">Leave Management</a></li>
                            </ul>
                        </div>
                        @include('partials.flash-message')
                    </div>
                </div>
            </div>
            <!-- [ breadcrumb ] end -->
            <!-- [ Main Content ] start -->
            <!-- [ Hover-table ] start -->
            <div class="col-md-12">
                <h5>MANAGE LEAVE</h5>
                <div class="card">
                    <div class="card-header">
                        <span class="d-block m-t-4">

                            @can('manage-staff')
                                {{-- <button type="button" class="btn  btn-primary btn-sm" data-toggle="modal" data-target="#createModal" data-whatever="@mdo">Add Staff</button> --}}
                                <a href="{{route('leaves.create')}}" class="btn btn-primary btn-sm">New Leave</a>
                            @endcan
                        </span>
                    </div>
                    <div class="card-body table-border-style">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Department</th>
                                        <th> Leave Days Number </th>
                                        <th>Leave Type </th>
                                        <th>Leave Start Date</th>
                                        <th>Leave End Date</th>
                                        <th>Leave Reason</th>
                                        <th>H.O.D Report</th>
                                        <th>Admin Report</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($mleaves as $leave)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{$leave->name}}</td>
                                        <td>{{$leave->email}}</td>
                                        <td>{{$leave->departments->name}}</td>
                                        <td>{{$leave->leavedays}}</td>
                                        <td>{{$leave->leavetypes->leavename}}</td>
                                        <td>{{$leave->start_date}}</td>
                                        <td>{{$leave->end_date}}</td>
                                        <td>{{$leave->reason}}</td>
                                        <td style="color: #1abc9c"><strong>{{$leave->hod_status}}</strong></td>
                                        <td style="color: #1abc9c"><strong>{{$leave->admin_status}}</strong></td>


                                        <td>
                                            <a href="{{ url('hodapprove', $leave->id) }}" class="btn btn-sm btn-primary">Approve</a>
                                            <a href="{{ url('hoddeclined', $leave->id) }}" class="btn btn-sm btn-danger">Decline</a>

                                            {{-- @can('manage-staff')
                                                <a href="{{route('leaves.show', $leave->id)}}" class="btn btn-warning btn-sm">View</a>
                                                <button type="button" class="btn  btn-warning btn-sm" data-toggle="modal" data-target="#exampleModalCenter">View</button>
                                            @endcan
                                            <button type="button" class="btn  btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal" data-whatever="@fat">Edit</button>
                                            <a href="{{route('leaves.edit', $leave->id)}}" class="btn btn-primary btn-sm">Edit</a>

                                            <a onclick="handleDelete({{ $user->id }})" class="btn btn-danger btn-sm" style="color:white;">Delete</a>
                                            <a onclick="handleDelete({{ $leave->id }})" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModalLive" style="color: white">Delete</a> --}}
                                           
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{-- delete modal --}}
                            <form action="" method="POST" id="deleteUserForm">
                                @csrf
                                @method('DELETE')
                                <div class="card-body">
                                    <div id="exampleModalLive" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLiveLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLiveLabel">Delete User</h5>
                                                    <a href="{{route('user.index')}}" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></a>
                                                </div>
                                                <div class="modal-body">
                                                    <p class="mb-0">Are you sure u want to delete user?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    {{-- <button type="button" class="btn  btn-secondary" data-dismiss="modal">Close</button> --}}
                                                    <a href="{{route('user.index')}}" class="btn btn-secondary">Close</a>
                                                    <button type="submit" class="btn btn-danger">Yes, Delete</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            {{-- end delete modal --}}
                    
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
    </div>
@endsection
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
@section('scripts')
    <script>
        function handleDelete(id)
        {
            var form = document.getElementById('deleteUserForm')
            form.action = '/user/' + id
            $('#exampleModalLive').modal('show')
        }
    </script>
@endsection