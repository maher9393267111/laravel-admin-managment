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
                                <li class="breadcrumb-item"><a href="{{route('leavetypes.index')}}">LeaveTpes Management</a></li>
                            </ul>
                        </div>
                        @include('partials.flash-message')
                    </div>
                </div>
            </div>
            <!-- [ breadcrumb ] end -->
            <!-- [ Main Content ] start -->
            <!-- [ Hover-table ] start -->
            <div class="col-md-6">
                <h5>MANAGE LEAVETYPE</h5>
                <div class="card">
                    <div class="card-header">
                         <span class="d-block m-t-4"> 
                            <a href="{{route('leavetypes.create')}}" class="btn  btn-primary btn-sm"> Add Leave Type</a>
                        </span>
                    </div>
                    <div class="card-body table-border-style">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Leave Name</th>
                                        {{-- <th>Department Code</th> --}}
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($leavetypes as $leavetype)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{$leavetype->leavename}}</td>
                                            {{-- <td>{{$leavetype->code}}</td> --}}

                                            <td>
                                                @can('edit-users')
                                                    <a href="{{route('leavetypes.edit',$leavetype->id)}}" class="btn btn-primary btn-sm">Edit</a>
                                                    {{-- <a class="btn btn-primary btn-sm editDept" data-toggle="modal" data-target="#editDept{{$department->id}}">Edit</a> --}}

                                                @endcan
                                                {{-- <a onclick="handleDelete({{ $department->id }})" class="btn btn-danger btn-sm" style="color: white">Delete</a> --}}
                                                @can('delete-users')
                                                    <a onclick="handleDelete({{ $leavetype->id }})" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModalLive" style="color: white">Delete</a>
                                                @endcan

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{-- delete modal --}}
                            <form action="" method="POST" id="deleteLeavetypeForm">
                                @csrf
                                @method('DELETE')
                                <div class="card-body">
                                    <div id="exampleModalLive" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLiveLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLiveLabel">Delete LeaveType</h5>
                                                    <a href="{{route('leavetypes.index')}}" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></a>
                                                </div>
                                                <div class="modal-body">
                                                    <p class="mb-0">Are you sure u want to delete LeaveType?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <a href="{{route('leavetypes.index')}}" class="btn btn-primary">Close</a>
                                                    <button type="submit" class="btn btn-danger">Yes, Delete</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>                            
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ Hover-table ] end -->         
           <!-- [ Main Content ] end -->
        </div>
   
    </div>
@endsection
@section('scripts') 
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="crossorigin="anonymous"></script>
    <script>
        function handleDelete(id)
        {
            var form = document.getElementById('deleteLeavetypeForm')
            form.action = '/leavetypes/' + id
            $('#exampleModalLive').modal('show')
        } 
    </script>
@endsection
