<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel = "icon" href ="{{ asset('images/kak.png') }}" type="image/x-icon" />
        <title>E-Payroll</title>
        {{-- CSS --}}
        <link rel="stylesheet" href="{{ asset('css/custom.css')}}" />
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet" />
        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" crossorigin="anonymous" />
        <!-- Fontawesome -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <nav class="navbar fixed-top navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/home') }}" style="color:black;font-size:20px;" class="ml-5 navbar-brand" id="dashboard">Dashboard</a>
                        <ul class="navbar-nav mr-auto"></ul>
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    {{-- <a class="dropdown-item" href="{{ route('users.profile') }}">
                                        Profile
                                    </a> --}}
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        </ul>
                        @else
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar" aria-controls="collapsibleNavbar" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                                <ul class="navbar-nav ml-auto">
                                    <li class="nav-item mr-3">
                                        <a href="{{ route('login') }}" style="color:black;font-size:20px;">Login</a>
                                    </li>
                            {{-- @if (Route::has('register'))
                                    <li class="nav-item mr-3">
                                        <a href="{{ route('register') }}" style="color:black;font-size:20px;">Register</a>
                                    </li>
                                </ul>
                            </div>
                            @endif --}}
                    @endauth
                @endif
            </div>
        </nav>
        <div class="container mt-5 first-container">
            <div class="row">
                <div class="col homepage-col py-5">
                    <h4>What is Payroll System?</h4>
                    <p>
                        payroll System is an online digital payroll management system, its purpose is to automate and lessen the time to manage payroll on each client. It also has a strong security feature to prevent hackers from collecting and disrupting sensitive information.
                    </p>
                </div>
                <div class="col py-5">
                    <div class="d-flex justify-content-center">
                        <img src="{{asset('images/kak.png')}}" width="150px" height="200px" alt="E-Payroll logo" />
                    </div>
                </div>
            </div>
        </div>
        <section style="background-color: rgb(228, 228, 228);" class="mt-5">
            <div class="container" style="padding:25px;">
                <div class="row">
                    <div class="col">
                        <h2>
                            <center><a href="https://github.com/charles3399/payroll-system" target="__blank" rel="noopener"><i class="fa fa-facebook" aria-hidden="true" style="color: black"></i></a></center>
                        </h2>
                    </div>
                    <div class="col">
                        <h2>
                        <center><a href="https://ph.linkedin.com/in/charles-edison-bernaldez-3549791b2" target="__blank" rel="noopener"><i class="fa fa-linkedin-square" aria-hidden="true" style="color: blue"></i></a></center>
                        </h2>
                    </div>
                    <div class="col">
                        <h2>
                        <center><a href="https://www.instagram.com/say_bernaldez/" target="__blank" rel="noopener"><i class="fa fa-instagram" aria-hidden="true" style="color: rgb(235, 63, 91)"></i></a></center>
                        </h2>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="container mt-5 py-5">
                <div class="row">
                    <div class="col">
                        <div class="d-flex justify-content-center">
                            <img src="{{asset('users/images/hrbbb.jpeg')}}" style="border-radius: 50%;margin-right:30%" alt="Developer profile pic" >
                        </div>
                    </div>
                    <div class="col homepage-col py-4">
                        <h2>Leave Management System</h2>
                        <p>
                            A leave management system is a system that employers use to allow employees to request leave and managers to approve requests made by employees. In the past, this was done manually by using sheets of paper to keep track of how much leave time employees had available.</p>
                        {{-- <p>
                            I've been passionate about Web Development, and I've been developing various web apps for almost a year now. If you want to contact me, feel free to message me on my social media links or send me an email through here: bernaldez.corporate@gmail.com
                        </p> --}}
                    </div>
                </div>
            </div>
        </section>
        <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm" style="flex-shrink: none;">
            <div class="container">
                <small>&copy; <?php echo date("Y");?> HR System</small>
            </div>
        </nav>
        {{-- <script src="{{asset('js/app.js')}}"></script> --}}
    </body>
</html>
