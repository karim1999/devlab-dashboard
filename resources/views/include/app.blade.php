<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <?php $assets_version="?v=20"; ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->

    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="stylesheet" href="{{env('PUBLIC_PATH')}}/css/iosCheckbox.css">
    <link rel="stylesheet" href="{{env('PUBLIC_PATH')}}/css/cust-fonts.css">

    <link rel="stylesheet" href="{{env('PUBLIC_PATH')}}/css/main.css{{$assets_version}}">

    <script src="{{env('PUBLIC_PATH')}}/js/jquery-3.3.1.min.js"></script>
    @yield('styles')
    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
        <script src="https://cdn.ckeditor.com/ckeditor5/20.0.0/classic/ckeditor.js"></script>

        <!-- Styles -->
    {{--
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
</head>

<body style="background: #f4f7fc">

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>



    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">   تغيير كلمة المرور</h5>

      </div>
      <form method="POST" action="{{route('user.update-password')}}" class="col-12 px-0" id="change-password-form">
        @csrf
      <div class="modal-body">

            <div class="form-group row mb-4">
                <label for="email" class="col-md-12 col-form-label text-md-right">البريد الالكتروني</label>

                <div class="col-md-12">
                    <input id="email" type="email" class="form-control" name="email" value="{{\Auth::user()->email}}" required autocomplete="email"  >
                </div>
            </div>



            <div class="form-group row mb-4">
                <label for="email" class="col-md-12 col-form-label text-md-right">كلمة المرور الجديدة</label>

                <div class="col-md-12">
                    <input id="new_password" type="password" class="form-control" name="new_password"  required   >
                </div>
            </div>
            <div class="form-group row mb-4">
                <label for="email" class="col-md-12 col-form-label text-md-right">تاكيد المرور الجديدة</label>

                <div class="col-md-12">
                    <input id="password_confirmation" type="password" class="form-control" name="password_confirmation"  required   >
                </div>
            </div>


      </div>
      <div class="modal-footer">
        <span type="button" class="btn btn-secondary mx-2" data-dismiss="modal" >إغلاق</span>
        <button type="button" class="btn btn-primary mx-2" onclick="$('#change-password-form').submit()"> تغيير كلمة المرور</button>
      </div>
      </form>
    </div>
  </div>
</div>



    <style type="text/css">
    .right-nav {}
    .ios-ui-select{
        border-radius: 28px;
    height: 21px;
    width: 45px;
    bottom: -7px;
    position: relative;
    }
    .ios{
        display: inline-block!important;
        opacity: 0;
    }
    .ios-ui-select .inner{
    height: 14px;
    width: 14px;

    }
    a.active .nav-title {
        background: #fff!important;
        color: #7b7b7b!important;
        border-bottom-right-radius: 30px;border-top-right-radius: 30px;
    }



    .main-content{
        width: 100%!important;
    }
     .right-nav{
        display: none;
        transition: all .5s ease-in-out;
        position: fixed!important;
        z-index: 112;

    }
    .sub-right-nav{
        display: none;
        transition: all .5s ease-in-out;
        width: 118px!important;
        right: 200px;
        position: fixed!important;
        z-index: 112;
        top: 0;
        bottom: 0;
        overflow-y: auto;
    }

    @media (min-width: 768px) {

        .main-content{
            width: calc(100% - 410px)!important;
            right: 410px;
            position: relative;
        }
        .right-nav{
            display: block;
            position: fixed;
            z-index: 112;

        }
        .sub-right-nav{
            display: block;
            position: fixed;
            z-index: 112;
            right: 216px;
            width: 180px!important;

        }
    }

    @media (min-width: 992px) {


    }

    @media (min-width: 1200px) {


    }
    .sub-right-nav .active{
        color: #2381c6!important;
    }


    </style>






    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <style type="text/css">
        .swal2-container.swal2-backdrop-show{
            background: rgba(0,0,0,.2);
        }
        .swal2-success-ring{
          border-radius: 50%!important;
        }
        .swal2-container{
            z-index: 4545454554;
        }
    </style>
    @if(session()->has('data'))
    <script type="text/javascript">
        Swal.fire({
          position: 'top-end',
          icon: "{{  session('data')['alert-type'] }}",
          title: "{{  session('data')['alert'] }} ",
          showConfirmButton: false,
          timer: 8000
        })
    </script>
    @endif
    @if(count($errors->all()))
    <script type="text/javascript">
        Swal.fire({
          position: 'top-end',
          icon: 'error',
          title: '@foreach ($errors->all() as $message) {{ $message }}<br>@endforeach',
          showConfirmButton: false,
          timer: 8000
        })
    </script>
    @endif







    <span style="width: 60px;height: 60px;position: fixed;left: 5px;top: 5px;z-index: 1212121254545;background: #2381c6;cursor: pointer;" class="d-inline-block d-md-none text-center" onclick="$('.right-nav,.sub-right-nav').fadeToggle(0);">
            <span class="fal fa-sliders-h " style="color: #fff;font-size: 32px;padding-top: 14px"></span>
    </span>
    <div id="app" class="col-12 px-0 row">
        <div style="background: #3ea6dd;min-height: 100vh;overflow: scroll;" class="right-nav">
            <div class="col-12   pt-5 px-0" style="min-height: 100vh;" >

                <div class="col-12 px-0  pb-2 pb-md-2" style="color: #fff" data-toggle="modal" data-target=".bd-example-modal-xl">
                    <a href="#" class="col-12 row px-0">
                    <div class="col-3 bg-success" style="padding: 9px 20px">
                        <img src="{{env('PUBLIC_PATH')}}/site_icons/path7513.svg">
                    </div>
                    <div class="col-9 nav-title bg-success " style="color: #fff;padding: 10px 20px 0px;position: relative;">
                        <span style="position: relative;z-index: 1" class="cairo">إضافة موقع</span>


                    </div>
                    </a>

                </div>

                <div class="col-12 px-0  pb-2 pb-md-2" style="color: #fff">
                    <a href="{{route('sites.index')}}" class="col-12 row px-0">
                    <div class="col-3" style="padding: 9px 20px">
                        <span class="far fa-desktop" style="color: #fff"></span>
                        {{-- <img src="{{env('PUBLIC_PATH')}}/site_icons/path7513.svg"> --}}
                    </div>
                    <div class="col-9 nav-title " style="color: #fff;border-bottom-right-radius: 30px;border-top-right-radius: 30px;padding: 10px 20px 0px;position: relative;">
                        <span style="position: relative;z-index: 1">المواقع</span>


                    </div>
                    </a>

                </div>




                <div class="col-12 px-0  pb-2 pb-md-2" style="color: #fff">
                    <a href="{{route('settings.index')}}" class="col-12 row px-0 ">
                        <div class="col-3" style="padding: 9px 20px">
                            <img src="{{env('PUBLIC_PATH')}}/site_icons/g7424.svg">
                        </div>
                        <div class="col-9 nav-title  " style="padding: 10px 20px 0px;position: relative;color: #fff;">
                            <span style="position: relative;z-index: 1;">إعدادات الإعلانات</span>

                            {{-- <img src="{{env('PUBLIC_PATH')}}/site_icons/curve.png" style="position: absolute;    height: 77px; top: -16px; right: 85px; z-index: 0;"> --}}
                        </div>
                    </a>
                    {{-- إعدادات الإعلانات --}}
                </div>

{{--                <div class="col-12 px-0  pb-2 pb-md-2" style="color: #fff">--}}
{{--                    <a href="{{route('pages.site_index')}}" class="col-12 row px-0">--}}
{{--                    <div class="col-3" style="padding: 9px 20px">--}}
{{--                        <img src="{{env('PUBLIC_PATH')}}/site_icons/g7304.svg">--}}
{{--                    </div>--}}
{{--                    <div class="col-9 nav-title " style="color: #fff;border-bottom-right-radius: 30px;border-top-right-radius: 30px;padding: 10px 20px 0px;position: relative;">--}}
{{--                        <span style="position: relative;z-index: 1">صفحات ونصوص</span>--}}
{{--                        --}}
{{--                        --}}
{{--                    </div>--}}
{{--                    </a>--}}
{{--                   --}}
{{--                </div>--}}


                <div class="col-12 px-0  pb-2 pb-md-2" style="color: #fff">
                    <a href="{{route('site-profile.index')}}" class="col-12 row px-0">
                    <div class="col-3" style="padding: 9px 20px">
                        <img src="{{env('PUBLIC_PATH')}}/site_icons/g7360.svg">
                    </div>
                    <div class="col-9 nav-title " style="color: #fff;border-bottom-right-radius: 30px;border-top-right-radius: 30px;padding: 10px 20px 0px;position: relative;">
                        <span style="position: relative;z-index: 1">إعدادات الموقع</span>


                    </div>
                    </a>

                </div>


                {{-- <div class="col-12 px-0  pb-2 pb-md-2" style="color: #fff">
                    <a href="#" class="col-12 row px-0">
                    <div class="col-3" style="padding: 9px 20px">
                        <img src="{{env('PUBLIC_PATH')}}/site_icons/g7304.svg">
                    </div>
                    <div class="col-9 nav-title " style="color: #fff;border-bottom-right-radius: 30px;border-top-right-radius: 30px;padding: 10px 20px 0px;position: relative;">
                        <span style="position: relative;z-index: 1">إعدادات النصوص</span>


                    </div>
                    </a>

                </div> --}}

                <div class="col-12 px-0  pb-2 pb-md-2" style="color: #fff">
                    <a href="{{route('statistics.index')}}" class="col-12 row px-0">
                    <div class="col-3" style="padding: 9px 20px">
                        <img src="{{env('PUBLIC_PATH')}}/site_icons/g7374.svg">
                    </div>
                    <div class="col-9 nav-title " style="color: #fff;border-bottom-right-radius: 30px;border-top-right-radius: 30px;padding: 10px 20px 0px;position: relative;">
                        <span style="position: relative;z-index: 1">الإحصائيات</span>


                    </div>
                    </a>

                </div>
                <div class="col-12 px-0  pb-2 pb-md-2" style="color: #fff">
                    <a href="{{route('footer.index')}}" class="col-12 row px-0">
                    <div class="col-3" style="padding: 9px 20px">
                        <img src="{{env('PUBLIC_PATH')}}/site_icons/g7436.svg">
                    </div>
                    <div class="col-9 nav-title " style="color: #fff;border-bottom-right-radius: 30px;border-top-right-radius: 30px;padding: 10px 20px 0px;position: relative;">
                        <span style="position: relative;z-index: 1">الفوتر</span>


                    </div>
                    </a>

                </div>





                <div class="col-12 px-0  pb-2 pb-md-2" style="color: #fff">
                    <a href="https://devpass.devlab.ae/" class="col-12 row px-0">
                    <div class="col-3" style="padding: 9px 20px">
                        <img src="{{env('PUBLIC_PATH')}}/site_icons/g7515.svg">
                    </div>
                    <div class="col-9 nav-title " style="color: #fff;border-bottom-right-radius: 30px;border-top-right-radius: 30px;padding: 10px 20px 0px;position: relative;">
                        <span style="position: relative;z-index: 1">كلمات المرور</span>


                    </div>
                    </a>

                </div>
                <div class="col-12 px-0  pb-2 pb-md-2" style="color: #fff" disabled>
                    <a href="https://status.devlab.ae" class="col-12 row px-0">
                    <div class="col-3" style="padding: 9px 20px">
                        <img src="{{env('PUBLIC_PATH')}}/site_icons/path7498.svg">
                    </div>
                    <div class="col-9 nav-title " style="color: #fff;border-bottom-right-radius: 30px;border-top-right-radius: 30px;padding: 10px 20px 0px;position: relative;">
                        <span style="position: relative;z-index: 1">مراقب المواقع</span>


                    </div>
                    </a>

                </div>
                <div class="col-12 px-0  pb-2 pb-md-2" style="color: #fff">
                    <a href="#" class="col-12 row px-0">
                    <div class="col-3" style="padding: 9px 20px">
                        <img src="{{env('PUBLIC_PATH')}}/site_icons/g7501.svg">
                    </div>
                    <div class="col-9 nav-title " style="color: #fff;border-bottom-right-radius: 30px;border-top-right-radius: 30px;padding: 10px 20px 0px;position: relative;">
                        <span style="position: relative;z-index: 1">مكتبة الاكواد</span>


                    </div>
                    </a>

                </div>



                <div class="col-12 px-0  pb-2 pb-md-2" style="color: #fff;">
                    <a href="#" class="col-12 row px-0" data-toggle="modal" data-target="#exampleModalCenter">
                    <div class="col-3" style="padding: 9px 20px">
                        <span class="far fa-key" style="color: #fff"></span>
                        {{-- <img src="{{env('PUBLIC_PATH')}}/site_icons/path7513.svg"> --}}
                    </div>
                    <div class="col-9 nav-title " style="color: #fff;border-bottom-right-radius: 30px;border-top-right-radius: 30px;padding: 10px 20px 0px;position: relative;" >تغيير كلمة المرور</span>


                    </div>
                    </a>

                </div>


                <div class="col-12 px-0  pb-2 pb-md-2" style="color: #fff;">
                    <a href="{{ route('logout') }}" class="col-12 row px-0" onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();" >
                    <div class="col-3" style="padding: 9px 20px">
                        <img src="{{env('PUBLIC_PATH')}}/site_icons/power.svg">
                    </div>
                    <div class="col-9 nav-title " style="color: #fff;border-bottom-right-radius: 30px;border-top-right-radius: 30px;padding: 10px 20px 0px;position: relative;"
                     >
                        <span style="position: relative;z-index: 1">تسجيل خروج</span>


                    </div>
                    </a>

                </div>



            </div>
        </div>
        <div style="width: 180px;background: #fff;min-height: 100vh;box-shadow: -4px 0px 3px #eaeaea;" class="sub-right-nav py-4 pr-3 px-md-4">
            <ul style="list-style-type: none;" class="px-0 sub-m">
                {{-- <li class="py-2 d-block"><a href="#" class="d-block">كل المواقع</a></li> --}}
                @php
                $section_name=Request::segment(1);
                $sites_nav=\App\Site::get();
                @endphp
                @if($section_name=="statistics")
                <li class="py-2 d-block"><a href="/statistics/all/all" class="d-block" style="color: #777">كل المواقع</a></li>
                @endif

                @if($section_name=="settings")
                <li class="py-2 d-block"><a href="/settings/all/all" class="d-block" style="color: #777">كل المواقع</a></li>
                @endif

                @foreach($sites_nav as $site_nav)

                <li class="py-2 d-block"><a href="/{{$section_name}}/{{$site_nav->id}}" class="d-block" style="color: #777">{{$site_nav->name}}</a></li>
                @endforeach

            </ul>
        </div>


        <div class="main-content" style="width: calc(100% - 410px)">
            @yield('content')

            <div class="modal fade bd-example-modal-xl"   role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="z-index: 1121212144;border-radius: 5px">
              <div class="modal-dialog modal-xl" role="document"  style="z-index: 1121212144;border-radius:5px">
                <div class="modal-content px-0" >
                   <div class="col-12 px-0">
                       <div class="col-12 row" style="height: 60px;background: #eee;border-bottom: 1px solid #ddd">
                           <div class="col-9 px-0 cairo font-2 justify-content-center py-3 " >
                               إضافة موقع
                           </div>
                            <div class="col-3 text-left px-0">

                           </div>
                       </div>
                       <form method="POST" action="{{route('sites.store')}}">
                       <div class="col-12 py-5">
                        @csrf
                           <div class="col-12 pb-3">
                               <label class="col-12 cairo" for="12">
                                   إسم الموقع
                               </label>
                               <div class="col-12 pt-2">
                                   <input type="" name="name" class="form-control" id="12">
                               </div>
                           </div>
                           <div class="col-12 pb-3">
                               <label class="col-12 cairo" for="12">
                                  رابط الموقع
                               </label>
                               <div class="col-12 pt-2">
                                   <input type="" name="link" class="form-control" id="12">
                               </div>
                           </div>
                           <div class="col-12 pb-3">

                               <div class="col-12 pt-2 text-left">
                                   <button class="btn btn-success cairo">إضافة</button>
                               </div>
                           </div>
                       </div>
                       </form>
                   </div>
                </div>
              </div>
            </div>
        </div>
    </div>

{{--     <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
 --}}

    <script src="{{env('PUBLIC_PATH')}}/js/jquery.lazy.min.js"></script>
    <script src="{{env('PUBLIC_PATH')}}/js/placejs.min.js"></script>
    <script src="{{env('PUBLIC_PATH')}}/js/iosCheckbox.min.js"></script>

    <script src="{{env('PUBLIC_PATH')}}/js/sweetalert.min.js"></script>
    <script src="{{env('PUBLIC_PATH')}}/js/popper.min.js"></script>
    <script src="{{env('PUBLIC_PATH')}}/js/bootstrap.min.js"></script>
    <script src="{{env('PUBLIC_PATH')}}/js/select2.full.min.js"></script>
    @yield('scripts')
    <link rel="stylesheet" href="{{env('PUBLIC_PATH')}}/css/fontawsome.min.css">
    <script src="{{env('PUBLIC_PATH')}}/js/main.js{{$assets_version}}"></script>



    <script type="text/javascript">

        $('a[href="{{env('APP_URL')}}' + window.location.pathname + '"]').addClass('active');
        console.log('{{env('APP_URL')}}'+window.location.pathname);
    </script>




    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="{{env('PUBLIC_PATH')}}/js/datatable.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript">
         (function() {



        $('#myTable').DataTable({
            dom: 'Bfrtip',
            lengthMenu: [
                [50, 100, 150, -1],
                ['50 صف', '100 صف', '150 صف', 'عرض الكل']
            ],

            buttons: [
                {
                    extend: 'print',
                    text: 'طباعة وتصدير PDF',
                    exportOptions: {
                        modifier: {
                            search: 'none'
                        }
                    }
                },
                {
                    extend: 'excel',
                    text: 'Excel',
                    exportOptions: {
                        modifier: {
                            search: 'none'
                        }
                    }
                },
            ],


            "language": {

                "sProcessing": "جارٍ التحميل...",
                "sLengthMenu": "أظهر _MENU_ مدخلات",
                "sZeroRecords": "لم يعثر على أية سجلات",
                "sInfo": "إظهار _START_ إلى _END_ من أصل _TOTAL_ مدخل",
                "sInfoEmpty": "يعرض 0 إلى 0 من أصل 0 سجل",
                "sInfoFiltered": "(منتقاة من مجموع _MAX_ مُدخل)",
                "sInfoPostFix": "",
                "sSearch": "ابحث:",
                "sUrl": "",
                "oPaginate": {
                    "sFirst": "الأول",
                    "sPrevious": "السابق",
                    "sNext": "التالي",
                    "sLast": "الأخير"
                },
                buttons: {
                    pageLength: {
                        _: "عرض %d عناصر",
                        '-1': "Tout afficher"
                    }
                }
            },
            responsive: true,
            scrollY: 700,
            paging: false
        });

    })();

 /*$('[data-toggle="popover"]').popover({ trigger: "hover" });*/
/* $('a').on('click',function(){
    window.location.href = $(this).attr('href');
 });*/
    </script>
</body>







</html>
