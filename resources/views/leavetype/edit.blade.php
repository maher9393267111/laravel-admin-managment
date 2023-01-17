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
                                <li class="breadcrumb-item"><a href="{{route('leavetypes.index')}}">LeaveType Management</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ breadcrumb ] end -->
            <!-- [ Main Content ] start -->
            <!-- [ Hover-table ] start -->
            <div class="col-md-4">
                <h5 class="m-b-15">EDIT LEAVETYPE <span class="float-right f-13 text-muted"><a href="{{route('leavetype.index')}}" class="btn btn-sm btn-primary">Back</a></span></h5>
                {{-- <h5 class="mt-5">EDIT DEPARTMENT</h5> --}}
                {{-- <a href="{{route('departments.index')}}" class="btn btn-primary btn-small" style="margin-left: 600px">Back</a> --}}
                <hr>
                <form class="needs-validation" novalidate method="post" action="{{route('leavetypes.update',$leavetype->id)}}">
                    @csrf
                    @method('PUT')
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="validationTooltip01">Department name</label>
                            <input type="text" class="form-control  @error('leavename') is-invalid @enderror" name="leavename" id="leavename" placeholder="Leave Name" value="{{$leavetype->leavename}}">
                            @error('leavename')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                       
                    </div>
                    <div class="py-4">
                        <button class="btn  btn-primary" type="submit">Update</button>
                    </div>
                </form>
            </div>
            <!-- [ Hover-table ] end -->         
           <!-- [ Main Content ] end -->
        </div>
    </div>
@endsection
