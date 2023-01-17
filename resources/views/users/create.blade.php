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
                <h5 class="m-b-15">Create Staff <span class="float-right f-13 text-muted"><a href="{{route('user.index')}}" class="btn btn-sm btn-primary">Back</a></span></h5>
                <hr>
                <form action="{{route('user.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputname">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Staff name">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputname">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="Staff Email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputname">Mobile Number</label>
                            <input type="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" id="phone" placeholder="Staff Mobile Number">
                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="employment">Date of Birth</label>
                            <input type="date" class="form-control  @error('birthdate') is-invalid @enderror" name="birthdate" id="birthdate" placeholder="Staff Birth Date">
                            @error('birthdate')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="gender">Gender</label>
                            <select class="form-control @error('gender') is-invalid @enderror" name="gender" id="gender">
                                <option selected disabled value="0">>-SELECT GENDER-<</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                            @error('gender')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="department">Department</label>
                            <select class="form-control @error('department') is-invalid @enderror" name="department" id="department">
                                <option selected disabled value="0">>-SELECT DEPARTMENT-<</option>
                                @foreach ($department as $dept )
                                 <option value="{{ $dept->id }}">{{ $dept->name }}</option>
                                @endforeach
                            </select>
                            @error('department')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="position">Position</label>
                            <input type="text" class="form-control  @error('position') is-invalid @enderror" name="position" id="position" placeholder="Staff Position">
                            @error('position')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="address">Street Name</label>
                            <input type="text" class="form-control  @error('address') is-invalid @enderror" name="address" id="address" placeholder="Staff Address">
                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="state">State</label>
                            <select id="state"  class="form-control @error('state') is-invalid @enderror" name="state">
                                <option selected disabled value="0">>-SELECT STATE-<</option>
                                @foreach ($state as $ste )
                                 <option value="{{ $ste->id }}">{{ $ste->name }}</option>
                                @endforeach
                            </select>
                            @error('state')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div> <div class="form-group col-md-6">
                            <label for="lga">Local Government</label>
                            <select id="lga"  class="form-control @error('lga') is-invalid @enderror" name="lga">
                                <option selected disabled value="0">>-SELECT LOCAL GOVERNMENT-<</option>
                                @foreach ($localgvt as $lga )
                                 <option value="{{ $lga->id }}">{{ $lga->lga_name }}</option>
                                @endforeach
                            </select>
                            @error('lga')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="salary">Salary</label>
                            <input type="text" class="form-control  @error('salary') is-invalid @enderror" name="salary" id="salary" placeholder="Staff Salary">
                            @error('salary')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>  
                        <div class="form-group col-md-6">
                            <label for="leave">Leave Days</label>
                            <input type="number" class="form-control  @error('staff_leave') is-invalid @enderror" name="staff_leave" id="staff_leave" placeholder="Leave Days">
                            @error('staff_leave')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div> 
                        <div class="form-group col-md-6">
                            <label for="image">Image</label>
                            <input type="file" class="form-control  @error('image') is-invalid @enderror" name="image" id="image" placeholder="Staff image">
                            @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="employment">Employment Date</label>
                            <input type="date" class="form-control  @error('employment') is-invalid @enderror" name="employment_date" id="employment_date" placeholder="Staff Employment Date">
                            @error('employment')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="employment">Password</label>
                            <input type="password" class="form-control  @error('password') is-invalid @enderror" name="password" id="password" placeholder="Staff Password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="employment">Confirm Password</label>
                            <input type="password" class="form-control" name="password_confirmation" id="password-confirm" placeholder="Confirm Password" required autocomplete="new-password">
                        </div>
                    </div>
                    <button type="submit" class="btn  btn-primary">Create</button>
                </form>
            </div>
            <!-- [ Hover-table ] end -->         
           <!-- [ Main Content ] end -->
        </div>
    </div>
@endsection
