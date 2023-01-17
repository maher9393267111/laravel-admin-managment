	<!-- [ navigation menu ] start -->
	<nav class="pcoded-navbar  ">
		<div class="navbar-wrapper  ">
			<div class="navbar-content scroll-div " >
				
				<div class="">
					
					<div class="collapse" id="nav-user-link">
						<ul class="list-unstyled">
							<li class="list-group-item"><a href="user-profile.html"><i class="feather icon-user m-r-5"></i>View Profile</a></li>
							<li class="list-group-item"><a href="#!"><i class="feather icon-settings m-r-5"></i>Settings</a></li>
							<li class="list-group-item">
								<a href="{{ route('logout') }}" onclick="event.preventDefault(); 
								 document.getElementById('logout-form').submit(); ">
							<i class="feather icon-log-out m-r-5"></i>Logout</a></li>
							<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
								@csrf
							</form>
						</ul>
					</div>
				</div>
				
				<ul class="nav pcoded-inner-navbar ">
					<li class="nav-item pcoded-menu-caption">
						<label><strong>Navigation</strong></label>
					</li>
					<li class="nav-item">
					    <a href="{{ route('home') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Dashboard</span></a>
					</li>
                    @can('manage-users')
					<li class="nav-item">
					    <a href="{{ route('user.index') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-user"></i></span><span class="pcoded-mtext">Staff Management</span></a>
					</li>
					<li class="nav-item">
					    <a href="{{ route('departments.index') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-map"></i></span><span class="pcoded-mtext">Department</span></a>
					</li>
					<li class="nav-item">
					    <a href="{{route('leavetypes.index')}}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-file-text"></i></span><span class="pcoded-mtext">Leave Types</span></a>
					</li>
					@endcan
					<li class="nav-item">
					    <a href="{{ route('leaves.index') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-align-justify"></i></span><span class="pcoded-mtext">Leave Management</span></a>
					</li>
					
                    {{-- <li class="nav-item">
					    <a href="{{ route('payrolls.index')}}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-file-text"></i></span><span class="pcoded-mtext">Payroll Management</span></a>
					</li> --}}
					{{-- <li class="nav-item">
					    <a href="" class="nav-link "><span class="pcoded-micon"><i class="feather icon-file-text"></i></span><span class="pcoded-mtext">Payment</span></a>
					</li> --}}

				</ul>	
			</div>
		</div>
	</nav>
	<!-- [ navigation menu ] end -->