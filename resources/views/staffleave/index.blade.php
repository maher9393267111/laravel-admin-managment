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
                                    @foreach ($sleaves as $leave)
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
                                        <td style="color: #f1c40f"><strong>{{$leave->hod_status}}</strong></td>
                                        <td style="color: #1abc9c"><strong>{{$leave->admin_status}}</strong></td>
                                        <td>
                                            @can('manage-staff')
                                                <a href="{{route('staffleave.edit',$leave->id)}}" class="btn btn-warning btn-sm">Edit</a>
                                                {{-- <button type="button" class="btn  btn-warning btn-sm" data-toggle="modal" data-target="#exampleModalCenter">View</button> --}}
                                            @endcan
                                            {{-- <button type="button" class="btn  btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal" data-whatever="@fat">Edit</button> --}}
                                            {{-- <a href="{{route('leaves.edit', $leave->id)}}" class="btn btn-primary btn-sm">Edit</a> --}}

                                            {{-- <a onclick="handleDelete({{ $leave->id }})" class="btn btn-warning btn-sm" style="color:white;">view</a> --}}
                                            {{-- <a onclick="handleDelete({{ $leave->id }})" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModalLive" style="color: white">Delete</a> --}}
                                           
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
                            
                            {{-- view modal --}}
                            {{-- <div class="card-body">
                                <div id="exampleModalCenter" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalCenterTitle">{{Auth::user()->name}}Details</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            </div>
                                            <div class="modal-body">
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
                                                        </table> 
                                                    </div>
                                                </div>                                           
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn  btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn  btn-primary">Save changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="button" class="btn  btn-primary" data-toggle="modal" data-target="#exampleModalCenter">Launch demo modal</button>
                            </div> --}}
                            {{-- end view modal --}}
                      
                            {{-- update modal --}}
                            {{-- <div class="card-body btn-page">
                                <button type="button" class="btn  btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Open modal for @mdo</button>
                                <button type="button" class="btn  btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@fat">Open modal for @fat</button>
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            </div>
                                            <div class="modal-body">
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
                                                        <div class="form-group col-md-1">
                                                            <label for="role">Roles:</label>
                                                            <div class="col-md-6">
                                                                @foreach ($roles as $role )
                                                                <div class="form-check">
                                                                    <label for="role">{{$role->name}}</label>
                                                                    <input class="form-check" type="checkbox"  name="roles[]" id="roles" value="{{$role->id}}"
                                                                    @if ($user->roles->pluck('id')->contains($role->id)) checked @endif>
                                                                </div>     
                                                            @endforeach
                                                            </div>
                                                        
                                                        </div>
                                                       
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn  btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn  btn-primary">Update</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                            {{-- end update modal --}}

                            {{-- Create Modal --}}
                            {{-- <div class="card-body btn-page">
                                <button type="button" class="btn  btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Open modal for @mdo</button>
                                <button type="button" class="btn  btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@fat">Open modal for @fat</button>
                                <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Create User</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            </div>
                                            <div class="modal-body">
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
                                                            @error('password')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputAddress2">Address 2</label>
                                                        <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label for="inputCity">City</label>
                                                            <input type="text" class="form-control" id="inputCity">
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="inputState">State</label>
                                                            <select id="inputState" class="form-control">
                                                                <option selected>select</option>
                                                                <option>Large select</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            <label for="inputZip">Zip</label>
                                                            <input type="text" class="form-control" id="inputZip">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" id="gridCheck">
                                                            <label class="form-check-label" for="gridCheck">Check me out</label>
                                                        </div>
                                                    </div>
                                                    <button type="submit" class="btn  btn-primary">Create</button>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn  btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn  btn-primary">Create</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                            {{-- end create modal --}}
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