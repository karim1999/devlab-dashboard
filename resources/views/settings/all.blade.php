@extends('include.app')
@section('content')
<div class="col-12 container">
    <div class="col-12 py-3">

        <form class="col-12" style="" method="POST" action="{{route('settings.all_post')}}" id="adv_store">
            {{ method_field('PATCH') }}
            <input type="hidden" name="site_id" value="">
{{--            <div class="col-12 py-3 mt-3" style="">--}}
{{--                <div class="col-12 row">--}}
{{--                    <div class="col-6">--}}
{{--                        الرسالة المنبثقة--}}
{{--                    </div>--}}

{{--                   --}}
{{--                    <div class="col-6 text-left">--}}
{{--                        <input type="hidden" name="popup_status" value="false">--}}
{{--                        <input type="checkbox" name="popup_status" class="ml-2" value="true" style="opacity: 0"  >--}}
{{--                        <span class="px-2">الظهور</span>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-12 mt-2 py-3" style="background: #fff;border-radius: 7px!important;box-shadow: 0px 0px 13px #e6e6e6;">--}}
{{--                    <textarea class="form-control" placeholder="الكود" name="popup_ar" style="border:none;text-align: left;min-height: 150px;direction: ltr"></textarea>--}}
{{--                    <hr>--}}
{{--                    <textarea class="form-control" placeholder="code" name="popup_en" style="border:none;text-align: left;min-height: 150px;direction: ltr"></textarea>--}}
{{--                </div>--}}
{{--                <div class="col-12 text-right mt-3">--}}
{{--                    <input type="hidden" name="popup" value="false">--}}
{{--                    <input type="checkbox" name="popup" class="ml-2" value="true" style="opacity: 0"  >--}}
{{--                    <span class="px-2">تطبيق علي الكل</span>--}}
{{--                    <hr>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-12 py-3 mt-3">--}}
{{--                <div class="col-12 row">--}}
{{--                    <div class="col-6">--}}
{{--                        الرسالة الإفتتاحية--}}
{{--                    </div>--}}
{{--                    <div class="col-6 text-left">--}}
{{--                        <input type="hidden" name="intro_status" value="false">--}}
{{--                        <input type="checkbox" name="intro_status" class="ml-2" value="true" style="opacity: 0"  >--}}
{{--                        <span class="px-2">الظهور</span>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-12 mt-2 py-3" style="background: #fff;border-radius: 7px!important;box-shadow: 0px 0px 13px #e6e6e6;">--}}
{{--                    <textarea class="form-control" name="intro_ar" placeholder="الكود" style="border:none;text-align: left;min-height: 150px;direction: ltr"> </textarea>--}}
{{--                    <hr>--}}
{{--                    <textarea class="form-control" name="intro_en" placeholder="code" style="border:none;text-align: left;min-height: 150px;direction: ltr"> </textarea>--}}
{{--                </div>--}}
{{--                <div class="col-12 text-right mt-3">--}}
{{--                    <input type="hidden" name="intro" value="false">--}}
{{--                    <input type="checkbox" name="intro" class="ml-2" value="true" style="opacity: 0"  >--}}
{{--                    <span class="px-2">تطبيق علي الكل</span>--}}
{{--                    <hr>--}}
{{--                </div>--}}

{{--            </div>--}}
            <div class="col-12 py-3 mt-3">
                <div class="col-12 row">
                    <div class="col-6">
                        رسالة الهيدر
                    </div>
                    <div class="col-6 text-left">
                        <input type="hidden" name="header_status" value="false">
                        <input type="checkbox" name="header_status" class="ml-2" value="true" style="opacity: 0"   >
                        <span class="px-2">الظهور</span>
                    </div>
                </div>
                <div class="col-12 mt-2 py-3" style="background: #fff;border-radius: 7px!important;box-shadow: 0px 0px 13px #e6e6e6;">
                    <textarea class="form-control" name="header_ar" placeholder="الكود" style="border:none;text-align: left;min-height: 150px;direction: ltr"> </textarea>
                    <hr>
                    <textarea class="form-control" name="header_en" placeholder="code" style="border:none;text-align: left;min-height: 150px;direction: ltr"> </textarea>
                </div>

                <div class="col-12 text-right mt-3">
                    <input type="hidden" name="header" value="false">
                    <input type="checkbox" name="header" class="ml-2" value="true" style="opacity: 0"  >
                    <span class="px-2">تطبيق علي الكل</span>
                    <hr>
                </div>


            </div>
{{--            <div class="col-12 py-3 mt-3">--}}
{{--                <div class="col-12 row">--}}
{{--                    <div class="col-6">--}}
{{--                        التمرير إلى الأسفل--}}
{{--                    </div>--}}
{{--                    <div class="col-6 text-left">--}}
{{--                        <input type="hidden" name="scroll_status" value="false">--}}
{{--                        <input type="checkbox" name="scroll_status" class="ml-2" value="true" style="opacity: 0"  >--}}
{{--                        <span class="px-2">الظهور</span>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-12 mt-2 py-3" style="background: #fff;border-radius: 7px!important;box-shadow: 0px 0px 13px #e6e6e6;">--}}
{{--                    <textarea class="form-control" name="scroll_ar" placeholder="الكود" style="border:none;text-align: left;min-height: 150px;direction: ltr"></textarea>--}}
{{--                    <hr>--}}
{{--                    <textarea class="form-control" name="scroll_en" placeholder="code" style="border:none;text-align: left;min-height: 150px;direction: ltr"></textarea>--}}
{{--                </div>--}}
{{--                <div class="col-12 text-right mt-3">--}}
{{--                    <input type="hidden" name="scroll" value="false">--}}
{{--                    <input type="checkbox" name="scroll" class="ml-2" value="true" style="opacity: 0"  >--}}
{{--                    <span class="px-2">تطبيق علي الكل</span>--}}
{{--                    <hr>--}}
{{--                </div>--}}
{{--            </div>--}}
            <div class="col-12 py-3 mt-3">
                <div class="col-12 row">
                    <div class="col-6">
                        الإعلانات
                    </div>
                    <div class="col-6 text-left">
                        <input type="hidden" name="adv_status" value="false">
                        <input type="checkbox" name="adv_status" class="ml-2" value="true" style="opacity: 0"  >
                        <span class="px-2">الظهور</span>
                    </div>
                </div>
                <div class="col-12 mt-2 py-3" style="background: #fff;border-radius: 7px!important;box-shadow: 0px 0px 13px #e6e6e6;">
                    <textarea class="form-control" name="adv_ar" placeholder="الكود" style="border:none;text-align: left;min-height: 150px;direction: ltr"> </textarea>
                    <hr>
                    <textarea class="form-control" name="adv_en" placeholder="code" style="border:none;text-align: left;min-height: 150px;direction: ltr"> </textarea>
                </div>
                <div class="col-12 text-right mt-3">
                    <input type="hidden" name="adv" value="false">
                    <input type="checkbox" name="adv" class="ml-2" value="true" style="opacity: 0"  >
                    <span class="px-2">تطبيق علي الكل</span>
                    <hr>
                </div>
            </div>
            <div class="col-12 " style="position: fixed;top: 5px;height: 40px;width: 100%;right: 0px;text-align: left;direction: ltr">
                <button class="btn btn-success rounded-0 cairo text-center" style="width: 180px;" onclick="$('#adv_store').submit();">حفظ</button>
            </div>
            <form>
        }
    </div>
</div>
@endsection
