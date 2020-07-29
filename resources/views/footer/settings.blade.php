@extends('include.app')
@section('content')
    <style>
        .sub-right-nav {
            display: none;
        }
        .ck-editor__editable_inline {
            min-height: 300px;
        }
    </style>

    <div class="col-12 container">

        <form method="POST" action="{{route('footer.settings')}}" id="adv_store"  enctype="multipart/form-data">
            {{ method_field('POST') }}
            @csrf

            <div class="col-12 py-3">
                <div class="col-12 py-3 mt-3" style="">
                    <div class="col-12 row">
                        <div class="col-6">
                            الشروط والاحكام
                        </div>
                    </div>
                    <div class="col-12 mt-2 py-3" style="background: #fff;border-radius: 7px!important;box-shadow: 0px 0px 13px #e6e6e6;">
                        <textarea class="editor" placeholder="الشروط والاحكام" style="border:none;text-align: left;min-height: 150px;direction: ltr" name="terms">{{$terms}}</textarea>
                    </div>
                </div>
            </div>
            <div class="col-12 py-3">
                <div class="col-12 py-3 mt-3" style="">
                    <div class="col-12 row">
                        <div class="col-6">
                            سياسة الخصوصية
                        </div>
                    </div>
                    <div class="col-12 mt-2 py-3" style="background: #fff;border-radius: 7px!important;box-shadow: 0px 0px 13px #e6e6e6;">

                        <textarea class="editor2" placeholder="سياسة الخصوصية" style="border:none;text-align: left;min-height: 150px;direction: ltr" name="privacy">{{$privacy}}</textarea>
                    </div>
                </div>


                <div class="col-12 " style="position: fixed;top: 5px;height: 40px;width: 100%;right: 0px;text-align: left;direction: ltr">
                    <button type="submit" class="btn btn-success rounded-0 cairo text-center" style="width: 180px;">حفظ</button>
                </div>


            </div>
        </form>



    </div>
    <script>
        ClassicEditor
            .create( document.querySelector( '.editor' ), {
                toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote', 'alignment' ],
            }  )
            .then( editor => {
                console.log( editor );
            } )
            .catch( error => {
                console.error( error );
            } );
        ClassicEditor
            .create( document.querySelector( '.editor2' ), {
                toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote', 'alignment' ],
            }  )
            .then( editor => {
                console.log( editor );
            } )
            .catch( error => {
                console.error( error );
            } );
    </script>
@endsection
