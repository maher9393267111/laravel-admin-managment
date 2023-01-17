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
                                <li class="breadcrumb-item"><a href="{{route('departments.index')}}">Department Management</a></li>
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
                <h5>MANAGE DEPARTMENT</h5>
                <div class="card">
                    <div class="card-header">
                         <span class="d-block m-t-4"> 
                            <a href="{{route('departments.create')}}" class="btn  btn-primary btn-sm"> Add Department</a>
                        </span>
                    </div>
                    <div class="card-body table-border-style">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Department Name</th>
                                        <th>Department Code</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($departments as $department)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{$department->name}}</td>
                                            <td>{{$department->code}}</td>

                                            <td>
                                                @can('edit-users')
                                                    <a href="{{route('departments.edit',$department->id)}}" class="btn btn-primary btn-sm">Edit</a>
                                                    {{-- <a class="btn btn-primary btn-sm editDept" data-toggle="modal" data-target="#editDept{{$department->id}}">Edit</a> --}}

                                                @endcan
                                                {{-- <a onclick="handleDelete({{ $department->id }})" class="btn btn-danger btn-sm" style="color: white">Delete</a> --}}
                                                @can('delete-users')
                                                    <a onclick="handleDelete({{ $department->id }})" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModalLive" style="color: white">Delete</a>
                                                @endcan

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{-- delete modal --}}
                            <form action="" method="POST" id="deleteDepartmentForm">
                                @csrf
                                @method('DELETE')
                                <div class="card-body">
                                    <div id="exampleModalLive" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLiveLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLiveLabel">Delete User</h5>
                                                    <a href="{{route('departments.index')}}" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></a>
                                                </div>
                                                <div class="modal-body">
                                                    <p class="mb-0">Are you sure u want to delete user?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <a href="{{route('departments.index')}}" class="btn btn-primary">Close</a>
                                                    <button type="submit" class="btn btn-danger">Yes, Delete</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                              
                            </form>
                            {{-- end delete modal --}}

                            {{-- create modal --}}
                            {{-- <div class="card-body btn-page"> --}}
                                {{-- <button type="button" class="btn  btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Open modal for @mdo</button> --}}
                                {{-- <button type="button" class="btn  btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@fat">Open modal for @fat</button> --}}
                                {{-- <div class="modal fade" id="createDeptModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Create User</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            </div>
                                            <div class="modal-body">
                                                <form id="postForm">
                                                    <div class="form-row">
                                                        <div class="col-md-12 mb-3">
                                                            <label for="validationTooltip01">Department name</label>
                                                            <input type="text" class="form-control  @error('name') is-invalid @enderror" name="dept_name" id="dept_name" placeholder="Department name">
                                                            @error('name')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                            <div class="py-4">
                                                              <button class="btn  btn-primary" type="submit">Create</button>
                                                            </div>
                                
                                                        </div>
                                                    </div>
                                                    
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn  btn-primary save_dept">Create</button>
                                                <button type="button" class="btn  btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn  btn-primary">Create</button>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                            {{-- </div> --}}
                            {{-- end create modal --}}

                            {{-- edit modal --}}
                            {{-- <div class="card-body btn-page">
                                <button type="button" class="btn  btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Open modal for @mdo</button>
                                <button type="button" class="btn  btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@fat">Open modal for @fat</button>
                                <div class="modal fade" id="editDept{{$department->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            </div>
                                            <div class="modal-body">
                                                <form class="needs-validation" action="" method="POST">
                                                    <div class="form-row">
                                                        <div class="col-md-12 mb-3">
                                                            <label for="validationTooltip01">Department name</label>
                                                            <input type="text" class="form-control  @error('name') is-invalid @enderror" name="name" id="password" id="name" placeholder="Department name" >
                                                            @error('name')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                            <div class="py-4">
                                                              <button class="btn  btn-primary" type="submit">Update</button>
                                                            </div>
                                
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
                            {{-- end edit modal --}}
                        </div>
                    </div>
                </div>
                {{-- <form action="" method="POST" id="deleteDepartmentForm">
                    @csrf
                    @method('DELETE')
                    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="deleteModalLabel">Delete Customer</h5>
                              <a  href="{{ route('departments.index') }}">
                                <span aria-hidden="true">&times;</span>
                              </a>
                            </div>
                            <div class="modal-body">
                                <p class="text-center text-bols">
                                    <strong>Are you sure you want to delete this customer?</strong>
                                </p>
                            </div>
                            <div class="modal-footer">
                              <a type="button" href="{{ route('departments.index') }}" class="btn btn-info" data-dismiss="modal">Go Back</a>
                              <button type="submit" class="btn btn-danger">Yes, Delete</button>
                            </div>
                          </div>
                        </div>
                    </div>
            
                </form> --}}
            </div>
            <!-- [ Hover-table ] end -->         
           <!-- [ Main Content ] end -->
        </div>
   
    </div>
@endsection
@section('scripts')
    {{-- <script src="{{ asset('backend/assets/vendor/jquery/jquery-3.3.1.min.js') }}"></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> --}}

    {{-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script> --}}
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="crossorigin="anonymous"></script>
    <script>
        function handleDelete(id)
        {
            var form = document.getElementById('deleteDepartmentForm')
            form.action = '/departments/' + id
            $('#exampleModalLive').modal('show')
            // window.location.reload(100);
        }

        // $(document).ready(function(){
        //     // document.write('hello');
        //     $('.save_dept').on('click', function (e) { 
        //         e.preventDefault();
        //         // console.log('okay');
        //         var data = {
        //             'dept_name': $('#dept_name').val(),
        //         }
        //         // console.log(data);
        //         $.ajaxSetup({
        //             headers: {
        //                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //             }
        //         });

        //         $.ajax({
        //             data: data,
        //             url: "{{ route('departments.store') }}",
        //             type: "POST",
        //             dataType: 'json',
        //             success: function (response) {
        //                 console.log(data);
        //                 window.location.reload(100);
        //                 alert(response.status);
        //                 table.draw();
                    
        //             },
        //             error: function (response) {
        //                 console.log('Error:', response);
        //                 $('.save_dept').html('Save Changes');
        //             }
        //         });    
           
        //     });

        //     $('#editDept').on('click', function (e) { 
        //         e.preventDefault();
        //         // var dept_id = $(this).data('id');
        //         // console.log('clicking');
        //         // $.get("{{ route('departments.edit',$department->id) }}"+dept_id+'/department', function (data) {

        //         //     // $('#modelHeading').html("Edit Post");
        //         //     // $('#savedata').val("edit-user");
        //         //     // $('#ajaxModelexa').modal('show');
        //         //     $('#dept_name').val(dept_id.dept_name);
        //         // });
        //     });


        //     // $('body').on('click', '#editDept', function () {
        //     //     var dept_id = $(this).data('id');
        //     //     console.log('clicking');
        //     //     // $.get('ajax-posts/'+post_id+'/edit', function (data) {
        //     //     //     $('#postCrudModal').html("Edit post");
        //     //     //     $('#btn-save').val("edit-post");
        //     //     //     $('#ajax-crud-modal').modal('show');
        //     //     //     $('#post_id').val(data.id);
        //     //     //     $('#title').val(data.title);
        //     //     //     $('#body').val(data.body);  
        //     // })
         

        // });
    </script>
@endsection
