@extends('include.app')
@section('content')
    <style>
        .sub-right-nav {
            display: none;
        }
    </style>
<div class="col-12 container mt-4">
    <form method="POST" action="{{route('sites.update',['site'=>$site->id])}}">
    <div class="col-12 py-5">
    @csrf
    <input type="hidden" name="site_id" value="{{$site->id}}">
    {{method_field('PATCH')}}
       <div class="col-12 pb-3">
           <label class="col-12 cairo" for="12">
               إسم الموقع
           </label>
           <div class="col-12 pt-2">
               <input type="" name="name" class="form-control" id="12" value="{{$site->name}}">
           </div>
       </div>
       <div class="col-12 pb-3">
           <label class="col-12 cairo" for="12">
              رابط الموقع
           </label>
           <div class="col-12 pt-2">
               <input type="" name="link" class="form-control" id="12" value="{{$site->link}}">
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
