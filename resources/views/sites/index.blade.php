@extends('include.app')
@section('content')
    @if(isset($hide_menu) && $hide_menu)
    <style>
        .sub-right-nav {
            display: none;
        }
    </style>
    @endif
    <div class="col-12 container d-flex " style="height: 100vh">

		<h1 class="cairo text-center row justify-content-center align-self-center">برجاء إختيار الموقع</h1>

</div>
@endsection
