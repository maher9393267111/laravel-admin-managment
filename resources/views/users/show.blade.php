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
                                <li class="breadcrumb-item"><a href="{{route('user.index')}}">Staff Management</a></li>
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
                <h5>MANAGE STAFF</h5>
                <div class="card">
                    <div class="card-header">
                         <span class="d-block m-t-4"><a href="{{route('user.index')}}" class="btn btn-primary btn-sm">Back Home</a></span>
                    </div>
                    <div class="card-body table-border-style">
                        <div class="table-responsive">
                        
                            <table class="table table-hover">
                                <tr>
                                    <th>Name:</th>
                                    <td>{{$user->name}}</td> 
                                </tr>
                                <tr>
                                    <th>Email:</th>
                                    <td>{{$user->email}}</td> 
                                </tr>
                                <tr>
                                    <th>Mobile Number:</th>
                                    <td>{{$user->phone}}</td> 
                                </tr>
                                <tr>
                                    <th>Mobile Number:</th>
                                    <td>{{$user->salary}}</td> 
                                </tr>
                                <tr>
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
                                </tr>   
                                <tr>
                                    <th>Gender:</th>
                                    <td> {{$user->gender}}</td> 
                                </tr>  
                                <tr>
                                    <th>Leave Days:</th>
                                    <td> {{$user->staff_leave}}</td> 
                                </tr> 
                            </table> 
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ Hover-table ] end -->         
           <!-- [ Main Content ] end -->
        </div>
    </div>
@endsection
