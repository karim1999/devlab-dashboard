@extends('include.app')
@section('content')
<div class="col-12 container mt-4">
    <form method="POST" action="{{route('pages.update',['page'=>$page->id])}}">
    <div class="col-12 py-5">
    @csrf
    <input type="hidden" name="page_id" value="{{$page->id}}">
    <input type="hidden" name="site_id" value="{{$page->site->id}}">
    {{method_field('PATCH')}}
       <div class="col-12 pb-3">
           <label class="col-12 cairo" for="12">
               إسم الصفحة
           </label>
           <div class="col-12 pt-2">
               <input type="" name="page_name" class="form-control" id="12" value="{{$page->page_name}}">
           </div>
       </div>
       <div class="col-12 pb-3">
           <label class="col-12 cairo" for="12">
        حالة الصفحة ( متاحة - غير متاحة  )
           </label>
           <div class="col-12 pt-2">
          

            <input type="hidden" name="status" value="false">
            <input type="checkbox" name="status" class="ml-2" value="true" style="opacity: 0" {{($page->status==1)?"checked":""}}>

 
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
