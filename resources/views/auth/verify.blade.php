@extends('layouts.app', ['page_title' => 'توثيق البريد'])
@section('content')
<div class="container d-flex"  style="min-height: 100vh">
    <div class="row my-auto  justify-content-center ">
        <div class="col-md-10 col-lg-8">
            <div class="card main-nafez-box-styles">
                <div class="card-header">توثيق البريد الخاص بك </div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                           رابط تفعيل بريدك قد تم إرسالة إلي عنوان البريد الالكتروني الذي قمت بإدخالة
                        </div>
                    @endif

                    من فضلك قم بفحص البريد الاكتروني قبل إعادة ارسال طلب آخر
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
		                <button type="submit" class="btn btn-link p-0 m-0 align-baseline">إعادة ارسال رابط التفعيل</button>.
	                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
