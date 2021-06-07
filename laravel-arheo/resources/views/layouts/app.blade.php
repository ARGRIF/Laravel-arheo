<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- include libraries(jQuery, bootstrap) -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

    <script src="{{ asset('js/my.js') }}" defer></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">

    <!-- Styles -->

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/my.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dashmix.css') }}" rel="stylesheet">

</head>
<body>
<div id="app">



    @guest
        @if (Route::has('login')||Route::has('register'))

            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto">

                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                            @guest
                                @if (Route::has('login'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                @endif

                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>


                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>
        @endif
    @else



        <div id="page-container" class="sidebar-o sidebar-dark sidebar-mini enable-page-overlay side-scroll">
            <nav id="sidebar" aria-label="Main Navigation">
                <!-- Side Header -->
                <div class="content-header bg-black-10">
                    <!-- Logo -->
                    <a class="font-w600 text-white tracking-wide" href="{{ route('home') }}">
                        <span class="smini-visible">
                            A<span class="opacity-75">r</span>
                        </span>
                        <span class="smini-hidden">
                            A<span class="opacity-75">rheo</span>
                        </span>
                    </a>
                    <div>
                        <a class="d-lg-none text-white ml-2" data-toggle="layout" data-action="sidebar_close">
                            <i class="fa fa-times-circle"></i>
                        </a>
                    </div>
                    <!-- END Options -->
                </div>
                <!-- END Side Header -->

                <!-- Sidebar Scrolling -->
                <div class="js-sidebar-scroll">
                    <!-- Side Navigation -->
                    <div class="content-side">
                        <ul class="nav-main">

                            <li class="nav-main-item">
                                <a class="nav-main-link active" href="{{ url("/user/".Auth::user()->id) }}">
                                    <img src="{{url('/images/nav-images/User.svg')}}">
                                    <span class="nav-main-link-name ml-3" >Особистий кабінет</span>
                                </a>
                            </li>
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="{{ url("/post") }}">
                                    <img src="{{url('/images/nav-images/Post.svg')}}">
                                    <span class="nav-main-link-name ml-3">Пам'ятки</span>
                                    <form action="{{ url("/post/create") }}">
                                        <input class="btn btn-nav-secondary btn-block" type="submit" value="+"/>
                                    </form>
                                </a>
                            </li>

                            <li class="nav-main-item">
                                <a class="nav-main-link" href="{{ url("/object") }}">
                                    <img src="{{url('/images/nav-images/Object.svg')}}">
                                    <span class="nav-main-link-name ml-3">Об'єкти</span>
                                    <form action="{{ url("/object/create") }}">
                                        <input class="btn btn-nav-secondary btn-block" type="submit" value="+"/>
                                    </form>
                                </a>
                            </li>

                            <li class="nav-main-item">
                                <a class="nav-main-link" href="{{ url("/find") }}">
                                    <img src="{{url('/images/nav-images/Find.svg')}}">
                                    <span class="nav-main-link-name ml-3">Знахідки</span>
                                    <form action="{{ url("/find/create") }}">
                                        <input class="btn btn-nav-secondary btn-block" type="submit" value="+"/>
                                    </form>
                                </a>
                            </li>
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="{{ url("/passport") }}">
                                    <img src="{{url('/images/nav-images/Passport.svg')}}">
                                    <span class="nav-main-link-name ml-3">Паспорти</span>
                                </a>
                            </li>
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="{{ url("/legend") }}">
                                    <img src="{{url('/images/nav-images/Legend.svg')}}">
                                    <span class="nav-main-link-name ml-3">Умовні позначення</span>
                                </a>
                            </li>


                            <li class="nav-main-item">
                                <a class="nav-main-link" href="{{ route('logout') }}">

                                    <img src="{{url('/images/nav-images/Logout.svg')}}">
                                    <span class="nav-main-link-name ml-3">Вихід</span>
                                </a>

                            </li>

                        </ul>
                    </div>
                    <!-- END Side Navigation -->
                </div>
                <!-- END Sidebar Scrolling -->
            </nav>

            <!-- Main Container -->

            <!-- END Main Container -->
            @endguest
            <main class="">

                @yield('content')

            </main>
        </div>
</div>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAtDBYETqV1_-oYs439o3WawsWf_2BlmaM&libraries=geometry&callback=initMap"
        type="text/javascript"></script>

</body>


</html>
