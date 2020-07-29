@extends('include.app')
@section('content')
<div class="col-12 container">

	<form method="POST" action="{{route('footer.update',['footer'=>$site_id])}}" id="adv_store"  enctype="multipart/form-data">
	 		{{ method_field('PATCH') }}
	@csrf
	<input type="hidden" name="site_id" value="{{$site_id}}">


	<div class="col-12 py-3">
		<div class="col-12 py-3 mt-3" style="">
			<div class="col-12 row">
				<div class="col-6">
					الفوتر - عربي
				</div>
				<div class="col-6 text-left">
					 

					 <input type="hidden" name="footer_ar_enabled" value="false">
                     <input type="checkbox" name="footer_ar_enabled" class="ml-2" value="true" style="opacity: 0" {{($footer->footer_ar_enabled==1)?"checked":""}}>

					<span class="px-2">الظهور</span>
					 
				</div>
			</div>
			<div class="col-12 mt-2 py-3" style="background: #fff;border-radius: 7px!important;box-shadow: 0px 0px 13px #e6e6e6;">
				<textarea class="form-control" placeholder="الكود" style="border:none;text-align: left;min-height: 150px;direction: ltr" name="footer_ar">{{$footer->footer_ar}}</textarea>  
			</div>
		</div> 
	</div> 
	<div class="col-12 py-3">
		<div class="col-12 py-3 mt-3" style="">
			<div class="col-12 row">
				<div class="col-6">
					الفوتر - انجليزي
				</div>
				<div class="col-6 text-left">
					 
					<input type="hidden" name="footer_en_enabled" value="false">
                     <input type="checkbox" name="footer_en_enabled" class="ml-2" value="true" style="opacity: 0" {{($footer->footer_en_enabled==1)?"checked":""}}>
					<span class="px-2">الظهور</span>
					 
				</div>
			</div>
			<div class="col-12 mt-2 py-3" style="background: #fff;border-radius: 7px!important;box-shadow: 0px 0px 13px #e6e6e6;">
				 
				<textarea class="form-control" placeholder="code" style="border:none;text-align: left;min-height: 150px;direction: ltr" name="footer_en">{{$footer->footer_en}}</textarea>
			</div>
		</div> 


		<div class="col-12 " style="position: fixed;top: 5px;height: 40px;width: 100%;right: 0px;text-align: left;direction: ltr">
                <button class="btn btn-success rounded-0 cairo text-center" style="width: 180px;" onclick="$('#adv_store').submit();">حفظ</button>
            </div> 

            
	</div> 
	</form>



</div>
@endsection