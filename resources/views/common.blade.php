<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <?php $assets_version="?v=20"; ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{$title}}</title>


    <link rel="stylesheet" href="{{env('PUBLIC_PATH')}}/css/cust-fonts.css">
    @if(env('APP_URL')=="http://127.0.0.1:8000")
        <link rel="stylesheet" href="{{env('PUBLIC_PATH')}}/css/main.css{{$assets_version}}">
    @else
        <link rel="stylesheet" href="{{env('PUBLIC_PATH')}}/css/main.min.css{{$assets_version}}">
    @endif
    <script src="{{env('PUBLIC_PATH')}}/js/jquery-3.3.1.min.js"></script>






    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}

<!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            {{--                <a class="navbar-brand" href="{{ url('/') }}">--}}
            {{--                    {{ config('app.name', 'Laravel') }}--}}
            {{--                </a>--}}
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                {{$title}}
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
{{--                <ul class="navbar-nav ml-auto">--}}
{{--                    <!-- Authentication Links -->--}}
{{--                    @guest--}}
{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>--}}
{{--                        </li>--}}
{{--                        @if (Route::has('register'))--}}
{{--                            <li class="nav-item">--}}
{{--                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>--}}
{{--                            </li>--}}
{{--                        @endif--}}
{{--                    @else--}}
{{--                        <li class="nav-item dropdown">--}}
{{--                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>--}}
{{--                                {{ Auth::user()->name }} <span class="caret"></span>--}}
{{--                            </a>--}}

{{--                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">--}}
{{--                                <a class="dropdown-item" href="{{ route('logout') }}"--}}
{{--                                   onclick="event.preventDefault();--}}
{{--                                                     document.getElementById('logout-form').submit();">--}}
{{--                                    {{ __('Logout') }}--}}
{{--                                </a>--}}

{{--                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">--}}
{{--                                    @csrf--}}
{{--                                </form>--}}
{{--                            </div>--}}
{{--                        </li>--}}
{{--                    @endguest--}}
{{--                </ul>--}}
            </div>
        </div>
    </nav>

    <main class="container">
        <div>{!! $data !!}</div>
    </main>
</div>



<script src="{{env('PUBLIC_PATH')}}/js/jquery.lazy.min.js"></script>
<script src="{{env('PUBLIC_PATH')}}/js/placejs.min.js"></script>
<script src="{{env('PUBLIC_PATH')}}/js/sweetalert.min.js"></script>
<script src="{{env('PUBLIC_PATH')}}/js/popper.min.js"></script>
<script src="{{env('PUBLIC_PATH')}}/js/bootstrap.min.js"></script>

<script src="{{env('PUBLIC_PATH')}}/js/select2.full.min.js"></script>
<link rel="stylesheet" href="{{env('PUBLIC_PATH')}}/css/fontawsome.min.css">
@if(env('APP_URL')=="http://127.0.0.1:8000")
    <script src="{{env('PUBLIC_PATH')}}/js/main.js{{$assets_version}}"></script>
@else
    <script src="{{env('PUBLIC_PATH')}}/js/main.min.js{{$assets_version}}"></script>
@endif


</body>
</html>
