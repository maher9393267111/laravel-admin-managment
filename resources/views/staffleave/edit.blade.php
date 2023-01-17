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
                                <li class="breadcrumb-item"><a href="{{route('staffleave.index')}}">Leave Management</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ breadcrumb ] end -->
            <!-- [ Main Content ] start -->
            <!-- [ Hover-table ] start -->
            <div class="col-md-4">
                <h5 class="m-b-15">EDIT LEAVE <span class="float-right f-13 text-muted"><a href="{{route('staffleave.index')}}" class="btn btn-sm btn-primary">Back</a></span></h5>
                {{-- <h5 class="mt-5">EDIT DEPARTMENT</h5> --}}
                {{-- <a href="{{route('departments.index')}}" class="btn btn-primary btn-small" style="margin-left: 600px">Back</a> --}}
                <hr>
                <form class="needs-validation" novalidate method="post" action="{{route('staffleave.update',$staffleave->id)}}">
                    @csrf
                    @method('PUT')
                    <div class="form-row">
                        {{-- <div class="form-group col-md-6">
                            <label for="inputname">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Staff name" value="{{ Auth::user()->name}}">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputname">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="Staff Email" value="{{ Auth::user()->email}}">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="leavetype">LeaveType</label>
                            <select class="form-control @error('v') is-invalid @enderror" name="department" id="department">
                                <option selected disabled value="0">>-SELECT Department-<</option>
                                @foreach ($department as $dept )
                                 <option value="{{ $dept->id }}">{{ $dept->name }}</option>
                                @endforeach
                            </select>
                            @error('leavetype')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="position">Position</label>
                            <input type="text" class="form-control @error('position') is-invalid @enderror" name="position" id="position" placeholder="Enter Position">
                            @error('position')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div> --}}
                        <div class="form-group col-md-6">
                            <label for="leavedays">Leave Days Number</label>
                            <input type="number" class="form-control @error('leavedays') is-invalid @enderror" name="leavedays" id="leavedays" placeholder="Number Of Leave Days" value="{{ Auth::user()->staff_leave}}">
                            @error('leavedays')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        {{-- <div class="form-group col-md-6">
                            <label for="leavetype">LeaveType</label>
                            <select class="form-control @error('v') is-invalid @enderror" name="leavetype" id="leavetype">
                                <option selected disabled value="0">>-SELECT LEAVETYPE-<</option>
                                @foreach ($leavetype as $type )
                                 <option value="{{ $type->id }}">{{ $type->leavename }}</option>
                                @endforeach
                            </select>
                            @error('leavetype')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div> --}}
                        <div class="form-group col-md-6">
                            <label for="start_date">Leave Start Date</label>
                            <input type="date" class="form-control  @error('start_date') is-invalid @enderror" name="start_date" id="start_date" placeholder="Leave Start Date" value="{{$staffleave->start_date}}">
                            @error('start_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-12">
                            <label for="end_date">Leave End Date</label>
                            <input type="date" class="form-control  @error('end_date') is-invalid @enderror" name="end_date" id="end_date" placeholder="Leave End Date" value="{{$staffleave->end_date}}">
                            @error('end_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-12">
                            <label for="reason">Reason For Leave</label>
                            <textarea class="form-control  @error('end_date') is-invalid @enderror" id="reason" rows="10" cols="30" name="reason">
                                {{$staffleave->reason}}
                            </textarea>
                            @error('reason')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="py-4">
                        <button class="btn btn-primary" type="submit">Update</button>
                    </div>
                </form>
            </div>
            <!-- [ Hover-table ] end -->         
           <!-- [ Main Content ] end -->
        </div>
    </div>
@endsection
