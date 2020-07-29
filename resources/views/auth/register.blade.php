@extends('layouts.app', ['page_title' => 'التسجيل'])
@section('content')
<style type="text/css">
    .user-type .active *
    {
        color: #fff!important
    }
    .user-type .active{
        background: var(--bg-color-3)!important;
    }
</style>


<div class="container d-flex"  style="min-height: 100vh">
    <div class="row my-auto  justify-content-center ">
        <div class="col-md-10 col-lg-8">
            <div class="card main-nafez-box-styles" >
                
                <div class="card-body  px-2 px-md-5 text-center" style="padding: 0px ">
{{-- 

                    <div class="col-12 row text-center px-0" style="display:inline-block;">
                        <div class="d-inline-block  mt-2  px-2" style="cursor: pointer;">
                            <a href="/login/facebook">
                                <div class="d-inline-block   text-center hover-darker" style="background: #005cb8;border-radius: 5px!important;color: #fff;font-size: 17px;padding: 10px 15px 5px">
                                    <span class="fab fa-facebook-f" style="color: #fff; "></span>
                                </div>
                            </a>
                        </div>
                        <div class="d-inline-block  mt-2 px-2" style="cursor: pointer;">
                            <a href="/login/twitter">
                                <div class="d-inline-block   text-center hover-darker" style="background: #00acee;border-radius: 5px!important;color: #fff;font-size: 17px;padding: 10px 13px 5px">
                                    <span class="fab fa-twitter" style="color: #fff; "></span>
                                </div>
                            </a>
                        </div>
                        <div class="d-inline-block  mt-2 px-2" style="cursor: pointer;">
                            <a href="/login/google">
                                <div class="d-inline-block   text-center hover-darker" style="background: #c33011;border-radius: 5px!important;color: #fff;font-size: 17px;padding: 10px 13px 5px">
                                    <span class="fab fa-google" style="color: #fff; "></span>
                                </div>
                            </a>
                        </div>
                    </div> --}}



                    <div class="col-12 mb-3 mt-5 text-center pt-5">
                        
                       <div style="display: inline-block;background: #fff;position: relative;top: -30px;padding: 0px 10px ;font-size: 22px">
                           تسجيل  
                       </div>
                    </div>

                    <form method="POST" action="{{ route('register') }}" class="row">
                        @csrf
                        
                       
                    
<!-- 
                        <div class="col-12 text-center mb-4">
                            <div class="col-12 px-0 text-center user-type" >
                                <div class="d-inline-block text-center m-2 user-account active" style="  border:1px solid var(--bg-color-3);padding: 10px;border-radius: 0px!important;width: 160px;cursor: pointer;">
                                    <span class="fad fa-user-tie mt-2" style="font-size: 90px;color: var(--bg-color-3)"></span>
                                    <br>
                                    <div style="color: var(--bg-color-3)"  class="text-center"> صاحب مشاريع</div>
                                   
                                </div>
                                <div class="d-inline-block text-center m-2 user-account" style="  border:1px solid var(--bg-color-3);padding: 10px;border-radius: 0px!important;width: 160px;cursor: pointer;">
                                    <span class="fad fa-user mt-2" style="font-size: 90px;color: var(--bg-color-3)"></span>
                                    <br>
                                    <div style="color: var(--bg-color-3)" class="text-center"> عامل حر  </div>
                                   
                                </div>
                            </div>
                        </div> -->


                        <div class="form-group row mb-4  col-12 col-md-6 px-0"  >
                            

                        <label for="name" class="col-md-4 col-form-label text-md-right  mb-2">الاسم</label>

                            <div class="col-md-12">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus style=";height:42px;">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>




                        <div class="form-group row mb-4  col-12 col-md-6 px-0"  >
                            <label for="email" class="col-md-12 col-form-label text-md-right tajawal mb-2"  >البريد الالكتروني</label>

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="off" autofocus style=";height:42px;">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row mb-4  col-12 col-md-6 px-0" >
                            <label for="password" class="col-md-12 col-form-label text-md-right tajawal mb-2">كلمة المرور</label>

                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" style="height:42px;">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        <div class="form-group row mb-4  col-12 col-md-6 px-0" >
                            <label for="password-confirm" class="col-md-12 col-form-label text-md-right tajawal mb-2">تأكيد كلمة المرور</label>

                            <div class="col-md-12">
                                <input id="password-confirm" type="password" class="form-control @error('password') is-invalid @enderror" name="password_confirmation" required autocomplete="current-password" style="height:42px;">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

 

                        <div class="form-group row mb-2 pb-5 col-12 px-0">
                            <div class="col-md-12 mt-4  ">
                                
                                <div class="text-center mt-2 " >
                                    <button type="submit" class="btn btn-primary text-center p-2 tajawal" style="border-radius: 0px;background: #428bca;width: 100%">
                                       تسجيل 
                                    </button>
                                </div>
                              {{--   <div class="text-center mt-2" >

                                    لديك حساب ؟ 
                                     
                                        <a class="btn btn-link tajawal" href="/login" style="font-size: 12px">
                                          تسجيل الدخول
                                        </a> 
                                  
                                    
                                </div>
                               --}}
                            </div>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
 --}}





<script type="text/javascript">
    $('.user-account').on('click',function(){
        $('.user-account').removeClass('active');
        $(this).addClass('active');
    });
</script>
 @endsection
