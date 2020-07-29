@extends('include.app')
@section('content')




<div class="col-12 container mt-4 border rounded py-3 alert alert-light cairo" >
   <span class="fa fa-desktop" style="color: #2381c6"></span> 
   <a href="{{route('pages.index',['site_id'=>$site->id])}}"><span class="bold cairo" style="color: #2381c6;font-size: 18px;">{{$site->name}}</span></a>  
   <span class="fa fa-arrow-left" style="color: #000"></span> 
   <span class="bold cairo" style="color: #000;font-size: 18px;">الصفحات</span>
</div>
<div class="modal fade bd-example-modal-xl-add-text-to-page"   role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="z-index: 1121212144;border-radius: 5px">
  <div class="modal-dialog modal-xl" role="document"  style="z-index: 1121212144;border-radius:5px">
    <div class="modal-content px-0" >
       <div class="col-12 px-0">
           <div class="col-12 row" style="height: 60px;background: #eee;border-bottom: 1px solid #ddd">
               <div class="col-9 px-0 cairo font-2 justify-content-center py-3 " >
                   إضافة نص إلي صفحة  
               </div>
                <div class="col-3 text-left px-0">
                   
               </div>
           </div>
           <form method="POST" action="{{route('texts.store')}}">
           <div class="col-12 py-5">
            @csrf
            <input type="hidden" name="page_id" id="target_page_id" >  
               <div class="col-12 pb-3">
                   <label class="col-12 cairo" for="12">
                       النص بالعربية
                   </label>
                   <div class="col-12 pt-2">
                       <input type="" name="content_ar" class="form-control" id="12">
                   </div>
               </div>
               <div class="col-12 pb-3">
                   <label class="col-12 cairo" for="12">
                      النص بالانجليزية
                   </label>
                   <div class="col-12 pt-2">
                       <input type="" name="content_en" class="form-control" id="12">
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




<div class="col-12 container mt-2 border rounded" style="background: #fff;">
    <div class="col-12 py-5">
        <table id="myTable" class="table table-striped table-bordered col-12 " style="padding: 0px;">
            <thead>
                <tr>
                    <th>الكود</th>
                    <th>الموقع</th>
                    <th>اسم الصفحة</th>
                    <th>الحالة</th>
                    <th>عملية</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pages as $page )
                <tr>
                    <td>{{$page->id}}</td>
                    <td>{{$page->site->name}}</td>
                    <td>{{$page->page_name}}</td>
                    <td>{!! ($page->status==null||$page->status==1)?'<span class="fa fa-check"></span>':'<span class="fa fa-times"></span>'!!}</td>
                    <td>
                        <form action="{{ route('pages.destroy', [$page->id]) }}" method="POST" id="remove-{{$page->id}}">
                            <input type="hidden" name="_method" value="DELETE">
                            @csrf
                        </form>
                        &nbsp;

                        <a href="{{route('texts.index',['page_id'=>$page->id])}}" class="bg-success" style="font-size: 16px;padding: 7px 8px 0px;display: inline-block;color: #fff;" data-container="body" data-toggle="popover" data-placement="bottom" data-content="نصوص" >
                            <span class="fa fa-list" style="color: #fff"></span>
                        </a>



                        <a href="#" class="bg-info" data-toggle="modal" data-target=".bd-example-modal-xl-add-text-to-page" style="font-size: 16px;padding: 7px 8px 0px;display: inline-block;color: #fff;" onclick="$('#target_page_id').val('{{$page->id}}')" >
                            <span class="fa fa-plus" style="color: #fff" data-container="body" data-toggle="popover" data-placement="bottom" data-content="إضافة نصوص"></span>
                        </a>

                        <a href="{{route('pages.edit',['page'=>$page->id])}}" class="bg-primary" style="font-size: 16px;padding: 7px 8px 0px;display: inline-block;color: #fff;" data-container="body" data-toggle="popover" data-placement="bottom" data-content="تعديل">
                            <span class="fa fa-edit" style="color: #fff"></span>
                        </a>
                        <a href="#" onclick="remove_me('{{$page->id}}');" class="bg-danger"  style="font-size: 16px;padding: 7px 8px 0px;display: inline-block;color: #fff;" data-container="body" data-toggle="popover" data-placement="bottom" data-content="حذف" >
                            <span class="fa fa-trash" style="color: #fff"></span>
                        </a>


                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<script type="text/javascript">
function remove_me(id) {
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success mx-1',
            cancelButton: 'btn btn-danger mx-1'
        },
        buttonsStyling: false
    })
    swalWithBootstrapButtons.fire({
        title: 'تنبية حذف ؟',
        text: "هل انت متأكد من حذف الموقع المحدد ؟",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'قم بالحذف!',
        cancelButtonText: 'إلغاء العملية!',
        reverseButtons: true
    }).then((result) => {
        if (result.value) {
            $('#remove-' + id).submit();

        }
    });
}
</script>
{{-- <style type="text/css">
	.sub-right-nav{
		display: none;
	}
</style> --}}
@endsection
