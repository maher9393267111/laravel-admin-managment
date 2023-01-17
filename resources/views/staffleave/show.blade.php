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
                                <tr>
                                    <th>Name:</th>
                                    <td>{{$leave->email}}</td> 
                                </tr>
                                <tr>
                                    <th>Email:</th>
                                    {{-- <td>{{$leave->email}}</td>  --}}
                                </tr>
                                {{-- <tr>
                                    <th>Mobile Number:</th>
                                    <td>{{$leave->departments->name}}</td> 
                                </tr> --}}
                                {{-- <tr>
                                    <th>Image:</th>
                                    <td> 
                                        <img src="{{ asset('staffimage/'.$user->image) }}" style="width: 100px;height:100px" alt="image">
                                    </td> 
                                </tr>
                                <tr>
                                    <th>Position:</th>
                                    <td> {{$user->position}}</td> 
                                </tr>
                                <tr>
                                    <th>Mobile Department:</th>
                                    <td> {{$user->department}}</td> 
                                </tr>
                                <tr>
                                    <th>Addess:</th>
                                    <td> {{$user->address}}</td> 
                                </tr>    --}}
                                <tr>
                                    <th>H.O.D Status:</th>
                                    <td> {{$leave->hod_status}}</td> 
                                </tr>  
                                <tr>
                                    <th>ADMIN Status:</th>
                                    <td> {{$leave->admin_status}}</td> 
                                </tr> 
                            </table> 
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