@extends('include.app')
@section('content')
<div class="col-12 container mt-5 border rounded" style="background: #fff;">
    <div class="col-12 py-5 ">
        <table id="myTable" class="table table-striped table-bordered col-12 " style="padding: 0px;">
            <thead>
                <tr>
                    <th>الكود</th>
                    <th>الأسم</th>
                    <th>الرابط</th>
                    <th>عملية</th>
                </tr>
            </thead>
            <tbody>
                @foreach($sites as $site )
                <tr>
                    <td>{{$site->id}}</td>
                    <td>{{$site->name}}</td>
                    <td>{{$site->link}}</td>
                    <td>
                        <form action="{{ route('sites.destroy', [$site->id]) }}" method="POST" id="remove-{{$site->id}}">
                            <input type="hidden" name="_method" value="DELETE">
                            @csrf
                        </form>
                        
                        
                        <a href="{{route('sites.edit',['site'=>$site->id])}}" class=" bg-info" style=";font-size: 16px;padding: 7px 8px 0px;display: inline-block;color: #fff;"  data-container="body" data-toggle="popover" data-placement="bottom" data-content="تعديل" >
                            <span class="far fa-edit" style="color: #fff"></span>
                        </a>

                        <a href="{{route('statistics.site',['site_id'=>$site->id])}}" class=" bg-warning" style=";font-size: 16px;padding: 7px 8px 0px;display: inline-block;color: #fff;"  data-container="body" data-toggle="popover" data-placement="bottom" data-content="الاحصائيات" >
                            <span class="fal fa-chart-bar"></span>
                        </a>

                        <a href="{{route('footer.site',['site_id'=>$site->id])}}" class=" bg-primary" style=";font-size: 16px;padding: 7px 8px 0px;display: inline-block;color: #fff;"  data-container="body" data-toggle="popover" data-placement="bottom" data-content="الفوتر" >
                            <span class="fal fa-indent" style="color: #fff"></span>
                        </a>


                        <a href="{{route('site-profile.site',['site_id'=>$site->id])}}" class=" bg-light border" style=";font-size: 16px;padding: 7px 8px 0px;display: inline-block;color: #fff;"  data-container="body" data-toggle="popover" data-placement="bottom" data-content="اعدادات الموقع" >
                            <span class="fal fa-wrench" style="color: #333"></span>
                        </a>


                        <a href="{{route('settings.site',['site_id'=>$site->id])}}" class=" bg-secondary border" style=";font-size: 16px;padding: 7px 8px 0px;display: inline-block;color: #fff;"  data-container="body" data-toggle="popover" data-placement="bottom" data-content="الاعلانات" >
                            <span class="fal fa-browser" style="color: #fff"></span>
                        </a>

                        <a href="{{route('pages.index',['site_id'=>$site->id])}}" class=" bg-success" style=";font-size: 16px;padding: 7px 8px 0px;display: inline-block;color: #fff;"  data-container="body" data-toggle="popover" data-placement="bottom" data-content="الصفحات" >
                            <span class="far fa-book-open" style="color: #fff"></span>
                        </a>
                        <a href="{{route('pages.create_site_page',['site_id'=>$site->id])}}" class="border" style=";font-size: 16px;padding: 7px 8px 0px;display: inline-block;color: #fff;background: #e400d6"  data-container="body" data-toggle="popover" data-placement="bottom" data-content="إضافة صفحات" >
                            <span class="fal fa-plus" style="color: #fff"></span>
                        </a>
                        <a href="#" onclick="remove_me('{{$site->id}}');"  class=" bg-danger " style="font-size: 16px;padding: 7px 8px 0px;display: inline-block;color: #fff;"  data-container="body" data-toggle="popover" data-placement="bottom" data-content="حذف" >
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
<style type="text/css">
	.sub-right-nav{
		display: none;
	}
</style>
@endsection
