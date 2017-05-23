<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- favicon -->
    <link rel="shortcut icon" href="{{{ asset('custom/images/icon.ico') }}}">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Custom fonts -->
    <link href="{{ asset('custom/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- Custom css -->
    <link href="{{ asset('css/custom/main.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom/responsive.css') }}" rel="stylesheet">

    <!-- Extras css -->
    <link href="{{ asset('css/custom/extras/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom/extras/lightbox.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">

    <!-- jQuery Load -->
    <script src="{{ asset('js/custom/jquery-min.js') }}" ></script>

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
    <div id="app">
        <section id="back-to-top">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        <li><a href="/home">Home</a></li>
                        <li><a href="/vacancy">Vacancies</a></li>
                        <?php
                            if (Auth::guest() != true){
                                ?>
                                    <?php
                                        if (Auth::user()->user_type_id == 1){
                                            ?>
                                                <li><a href="/application">Applications</a></li>
                                            <?php
                                        }

                                        else if (Auth::user()->user_type_id == 3){
                                            ?>
                                                <li><a href="/interview">Interviews</a></li>
                                            <?php
                                        }

                                        else if (Auth::user()->user_type_id == 4){
                                            ?>
                                                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Candidates<span class="caret"></span></a>
                                                    <ul class="dropdown-menu">
                                                        <li><a href="/candidate">New Candidates</a></li>
                                                        <li><a href="/recruited-candidate">Recruited Candidates</a></li>
                                                    </ul>
                                                </li>

                                                <li><a href="/application">Applications</a></li>
                                                <li><a href="/interview">Interviews</a></li>
                                                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Management<span class="caret"></span></a>
                                                    <ul class="dropdown-menu">
                                                        <li><a href="/recruiter">Recruiters</a></li>
                                                        <li><a href="/position">Positions</a></li>
                                                        <li><a href="/interview-type">Interview Types</a></li>
                                                    </ul>
                                                </li>
                                            <?php
                                        }
                                     ?>
                                <?php
                            }
                         ?>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}  <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                    <?php
                                        if (Auth::guest() != true){
                                            if (Auth::user()->user_type_id == 1 || Auth::user()->user_type_id == 2){
                                                ?>
                                                    <li><a href="{{ route('candidate.show', Auth::user()->id) }}">View Profile</a></li>
                                                    <li><a href="{{ route('candidate.edit', Auth::user()->id) }}">Edit Profile</a></li>
                                                <?php
                                            }
                                        }
                                     ?>

                                    <?php
                                        if (Auth::guest() != true){
                                            if (Auth::user()->user_type_id == 3 || Auth::user()->user_type_id == 4){
                                                ?>
                                                    <li><a href="{{ route('recruiter.show', Auth::user()->id) }}">View Profile</a></li>
                                                    <li><a href="{{ route('recruiter.edit', Auth::user()->id) }}">Edit Profile Profile</a></li>
                                                <?php
                                            }
                                        }
                                     ?>

                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
    </section>

        @if (session('info')) <div class="alert alert-info"> {{ session('info') }} </div> @endif
        @if (session('success')) <div class="alert alert-success"> {{ session('success') }} </div> @endif
        @if (session('error')) <div class="alert alert-danger"> {{ session('error') }} </div> @endif

        @yield('content')
    </div>
    <!-- Conatct Section End-->


    <div id="copyright">
    <div class="container">
    <!-- <div class="col-md-10"><p>© Recruitment Hut 2017 All right reserved. Design & Developed by The Team</p></div> -->
    <div class="col-md-2-offset-10">
        <span class="to-top pull-right"><a href="#back-to-top"><i class="fa fa-angle-up fa-2x"></i></a></span>
        </div>
    </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>


    <script src="{{ asset('js/custom/moment.min.js') }}" ></script>
    <script src="{{ asset('js/custom/bootstrap-datetimepicker.min.js') }}" ></script>

    <!-- Smooth Scroll -->
    <script src="{{ asset('js/custom/smooth-scroll.js') }}"></script>
    <!-- <script src="{{ asset('js/custom/lightbox.min.js') }}"></script> -->

    <!-- All JS plugin Triggers -->
    <script src="{{ asset('js/custom/main.js') }}"></script>
</body>
</html>
