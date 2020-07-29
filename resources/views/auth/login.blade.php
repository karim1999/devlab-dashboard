@extends('layouts.app', ['page_title' => 'تسجيل الدخول'])
@section('content')
<div class="container d-flex"  style="min-height: 100vh">
    <div class="row my-auto  justify-content-center ">
        <div class="col-md-10 col-lg-8">
            <div class="card main-nafez-box-styles"  >
                
                <div class="card-body  px-2 px-md-5 text-center" style="padding: 0px ">
            
                    <div class="col-12 mb-3 mt-5 text-center pt-4">
                        
                        <div style="display: inline-block;background: #fff;position: relative;top: -30px;padding: 0px 10px ;font-size: 22px">
                            تسجيل الدخول
                        </div>
                    </div>
                    <form method="POST" action="{{ route('login') }}" class="row">
                        @csrf
                        <div class="form-group row mb-4 col-12 col-md-6 px-0">
                            <label for="email" class="col-md-12 col-form-label text-md-right tajawal mb-1">البريد الالكتروني</label>
                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="off" autofocus style=";height: 42px;">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-4  col-12 col-md-6 px-0" style="margin-bottom: 30px;">
                            <label for="password" class="col-md-12 col-form-label text-md-right tajawal mb-1">كلمة المرور</label>
                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" style="height: 42px;">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-2 pb-5 row col-12 px-0">
                            <div class="col-12">
                                <div class="text-right d-inline-block px-0 " style="min-width: 120px;direction: ltr;">

                                    <label class="control control-checkbox">
                                        <label class="cairo" for="remember"  style="cursor: pointer;">تذكرني </label>
                                        <input name="remember"  type="checkbox"  id="remember" checked="" {{ old('remember') ? 'checked' : '' }}  />
                                        <div class="control_indicator"></div>
                                    </label>
 
                                </div>
                                <br>
                                <div class="col-12 text-center mt-4 px-0">
                                    <div class="text-center mt-2 " style="margin: 0px auto;">
                                        <button type="submit" class="btn btn-primary p-2 col-12 tajawal text-center" style="border-radius: 0px">
                                            تسجيل دخول
                                        </button>
                                    </div>
                                </div>
                             {{--    <div class="text-center mt-5" style="font-size: 14px;">
                                    <hr>
                                    <div class="col-12 row px-0">
                                        <div class="col-12 col-md-6 mt-3  text-center text-md-right   px-0">
                                            ليس لديك حساب ؟
                                            <a class="btn btn-link tajawal" href="{{ route('register') }}" style="font-size: 16px">
                                                تسجيل
                                            </a>
                                        </div>
                                        @if (Route::has('password.request'))
                                        <div class="col-12 col-md-6 mt-3 text-center text-md-left px-0">
                                            <a class="btn btn-link tajawal" href="{{ route('password.request') }}" style="font-size: 12px">
                                                نسيت كلمة المرور ؟
                                            </a>
                                        </div>
                                        @endif
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<style type="text/css">
.tt {
    display: inline-block;

}

</style>
@endsection
