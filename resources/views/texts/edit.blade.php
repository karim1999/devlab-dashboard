@extends('include.app')
@section('content')
<div class="col-12 container mt-4">

 
    <form method="POST" action="{{route('texts.update',['text'=>$text->id])}}">
    <div class="col-12 py-5">
    @csrf
    <input type="hidden" name="text_id" value="{{$text->id}}">
    <input type="hidden" name="site_id" value="{{$page->site_id}}">
    <input type="hidden" name="page_id" value="{{$page->id}}">
    
    {{method_field('PATCH')}}
       <div class="col-12 pb-3">
           <label class="col-12 cairo" for="12">
               النص بالعربي
           </label>
           <div class="col-12 pt-2">
               <input type="" name="content_ar" class="form-control" id="12" value="{{$text->content_ar}}">
           </div>
       </div>
       <div class="col-12 pb-3">
           <label class="col-12 cairo" for="12">
               النص بالانجليزي
           </label>
           <div class="col-12 pt-2">
               <input type="" name="content_en" class="form-control" id="12" value="{{$text->content_en}}">
           </div>
       </div>
       <div class="col-12 pb-3">
           <label class="col-12 cairo" for="12">
        حالة النص ( يعمل - لا يعمل  )
           </label>
           <div class="col-12 pt-2">
          

            <input type="hidden" name="enabled" value="false">
            <input type="checkbox" name="enabled" class="ml-2" value="true" style="opacity: 0" {{($text->enabled==1)?"checked":""}}>

 
           </div>
       </div> 


       <div class="col-12 pb-3">
           <label class="col-12 cairo" for="12">
        ملاحظة لك 
           </label>
           <div class="col-12 pt-2">
          
              <textarea class="form-control" name="note" style="min-height: 200px;">{{$text->note}}</textarea>

 
           </div>
       </div> 
 
       <div class="col-12 pb-3"> 
           <div class="col-12 pt-2 text-left">
               <button class="btn btn-success cairo">تعديل</button>
           </div>
       </div> 
    </div>
</form>


</div>

@endsection
