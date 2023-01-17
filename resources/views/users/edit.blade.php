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
                    </div>
                </div>
            </div>
            <!-- [ breadcrumb ] end -->
            <!-- [ Main Content ] start -->
            <!-- [ Hover-table ] start -->
            <div class="col-md-6">
                {{-- <h5 class="mt-5">Create Staff</h5> --}}
                <h5 class="m-b-15">Edit {{$user->name}} <span class="float-right f-13 text-muted"><a href="{{route('user.index')}}" class="btn btn-sm btn-primary">Back</a></span></h5>
                <hr>
                <form action="{{route('user.update',$user->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputname">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Staff name" value="{{$user->name}}">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                   
                        <div class="form-group col-md-6">
                            <label for="inputname">Mobile Number</label>
                            <input type="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" id="phone" placeholder="Staff Mobile Number" value="{{$user->phone}}">
                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputname">Salary</label>
                            <input type="text" class="form-control @error('salary') is-invalid @enderror" name="salary" id="salary" placeholder="Staff Salary" value="{{$user->salary}}">
                            @error('salary')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="position">Position</label>
                            <input type="text" class="form-control  @error('position') is-invalid @enderror" name="position" id="position" placeholder="Staff Position" value="{{$user->position}}">
                            @error('position')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-check col-md-1">
                            <label for="role">User Roles:</label>
                            @foreach ($roles as $role )
                                <label for="role">{{$role->name}}</label>
                                <input type="checkbox"  name="roles[]" id="roles" value="{{$role->id}}">
                            @endforeach
                            <button type="submit" class="btn  btn-primary">Update</button>
                        </div>
                       
                </form>
            </div>
            <!-- [ Hover-table ] end -->         
           <!-- [ Main Content ] end -->
        </div>
    </div>
@endsection
