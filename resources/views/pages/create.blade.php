@extends('include.app')
@section('content')
<div class="col-12 container mt-4">
    <form method="POST" action="{{route('pages.create_site_page_store',['site_id'=>$site->id])}}">
    <div class="col-12 py-5">
    @csrf
 
       <div class="col-12 pb-3">
           <label class="col-12 cairo" for="12">
               إسم الصفحة
           </label>
           <div class="col-12 pt-2">
               <input type="" name="page_name" class="form-control" id="12"  >
           </div>
       </div>
       <div class="col-12 pb-3">
           <label class="col-12 cairo" for="12">
        حالة الصفحة ( متاحة - غير متاحة  )
           </label>
           <div class="col-12 pt-2">
          

            <input type="hidden" name="status" value="false">
            <input type="checkbox" name="status" class="ml-2" value="true" checked="">

 
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
