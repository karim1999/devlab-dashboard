@extends('include.app')
@section('content')
<style type="text/css">
	.preview-image-site{
		height: 44px;
	    width: 44px;
	    z-index: 454;
	    display: inline-block;
	    top: -4px;
	    position: absolute;
	    right: 65px;
	    border-radius: 36px; 
	    overflow: hidden;
	    border:1px solid #ddd;

	}
</style>
<div class="col-12 container">
	 <div class="col-12 py-5">
	 	<div class="col-12 mt-3">
	 		 
	 		<form method="POST" action="{{route('site-profile.update',['site_profile'=>$site->id])}}" id="adv_store"  enctype="multipart/form-data">
	 			@csrf
	 		{{ method_field('PATCH') }}
	 		<input type="hidden" name="site_id" value="{{$site->id}}">
	     
 

	 		<h6 style="font-weight: bold;">شعار الموقع - الوضع الطبيعي:</h6>
	 		<p style="color: #919191;font-size: 13px">* يفضل استخدام شعار بحجم 50*50 بكسل</p>
	 		<div class="col-12 col-md-10 col-lg-9 px-0">
	 			<div class="col-12 row px-0">
	 				<div class="col-12 col-lg-6  mb-2">
	 					<div style="background: #fff;border-radius: 6px!important" class="pt-2 row">
	 						<div class="col-6 pt-1">
	 							عربي <span class="preview-image-site">
	 								<img src="{{($site_profile->logo_ar_path!=null)?$site_profile->logo_ar_path:''}}" style="width: 100%;height: 100%;" >
	 							</span>
	 						</div>
	 						<div class="col-6 text-left">
	 							<span class="d-inline-block " style="border:1px solid #2381c6;color: #2381c6;border-radius: 50px!important;font-size: 12px;cursor: pointer;overflow: hidden;cursor: pointer;"> 
	 								<input type="file" name="logo_ar_path" style="width: 54%;height:80%;position: absolute;opacity: 0">
	 								<span class="py-2 px-3 d-inline-block">إستعراض</span>
	 								
	 							</span>
	 						</div>
	 					</div>
	 				</div>
	 				<div class="col-12 col-lg-6  mb-2">
	 					<div style="background: #fff;border-radius: 6px!important" class="pt-2 row">
	 						<div class="col-6 pt-1">
	 							إنجليزي <span class="preview-image-site">
	 								<img src="{{($site_profile->logo_en_path!=null)?$site_profile->logo_en_path:''}}" style="width: 100%;height: 100%;" >
	 							</span>
	 						</div>
	 						<div class="col-6 text-left">
	 							<span class="d-inline-block " style="border:1px solid #2381c6;color: #2381c6;border-radius: 50px!important;font-size: 12px;cursor: pointer;overflow: hidden;cursor: pointer;"> 
	 								<input type="file" name="logo_en_path" style="width: 54%;height:80%;position: absolute;opacity: 0">
	 								<span class="py-2 px-3 d-inline-block">إستعراض</span>
	 								
	 							</span>
	 						</div>
	 					</div>
	 				</div>
	 			</div>
	 		</div>
	 	</div>
	 	<div class="col-12 mt-4">
	 		<h6 style="font-weight: bold;">شعار الموقع - الوضع الليلي:</h6>
	 		<p style="color: #919191;font-size: 13px">* يفضل استخدام شعار بحجم 50*50 بكسل</p>
	 		<div class="col-12 col-md-10 col-lg-9 px-0">
	 			<div class="col-12 row px-0">
	 				<div class="col-12 col-lg-6  mb-2">
	 					<div style="background: #fff;border-radius: 6px!important" class="pt-2 row">
	 						<div class="col-6 pt-1">
	 							عربي <span class="preview-image-site">
	 								<img src="{{($site_profile->logo_ar_path_dark!=null)?$site_profile->logo_ar_path_dark:''}}" style="width: 100%;height: 100%;" >
	 							</span>
	 						</div>
	 						<div class="col-6 text-left">
	 							<span class="d-inline-block " style="border:1px solid #2381c6;color: #2381c6;border-radius: 50px!important;font-size: 12px;cursor: pointer;overflow: hidden;cursor: pointer;"> 
	 								<input type="file" name="logo_ar_path_dark" style="width: 54%;height:80%;position: absolute;opacity: 0">
	 								<span class="py-2 px-3 d-inline-block">إستعراض</span>
	 								
	 							</span>
	 						</div>
	 					</div>
	 				</div>
	 				<div class="col-12 col-lg-6  mb-2">
	 					<div style="background: #fff;border-radius: 6px!important" class="pt-2 row">
	 						<div class="col-6 pt-1">
	 							إنجليزي <span class="preview-image-site">
	 								<img src="{{($site_profile->logo_en_path_dark!=null)?$site_profile->logo_en_path_dark:''}}" style="width: 100%;height: 100%;" >
	 							</span>
	 						</div>
	 						<div class="col-6 text-left">
	 							<span class="d-inline-block " style="border:1px solid #2381c6;color: #2381c6;border-radius: 50px!important;font-size: 12px;cursor: pointer;overflow: hidden;cursor: pointer;"> 
	 								<input type="file" name="logo_en_path_dark" style="width: 54%;height:80%;position: absolute;opacity: 0">
	 								<span class="py-2 px-3 d-inline-block">إستعراض</span>
	 								
	 							</span>
	 						</div>
	 					</div>
	 				</div>
	 			</div>
	 		</div>
	 	</div>
	 	<div class="col-12 mt-4">
	 		<h6 style="font-weight: bold;">أيقونة الموقع:</h6>
	 		<p style="color: #919191;font-size: 13px">* يفضل استخدام أيقونة بأبعاد متساوية</p>
	 		<div class="col-12 col-md-10 col-lg-9 px-0">
	 			<div class="col-12 row px-0">
	 				<div class="col-12 col-lg-6  mb-2">
	 					<div style="background: #fff;border-radius: 6px!important" class="pt-2 row">
	 						<div class="col-6 pt-1">
	 							عربي <span class="preview-image-site">
	 								<img src="{{($site_profile->icon_ar!=null)?$site_profile->icon_ar:''}}" style="width: 100%;height: 100%;" >
	 							</span>
	 						</div>
	 						<div class="col-6 text-left">
	 							<span class="d-inline-block " style="border:1px solid #2381c6;color: #2381c6;border-radius: 50px!important;font-size: 12px;cursor: pointer;overflow: hidden;cursor: pointer;"> 
	 								<input type="file" name="icon_ar" style="width: 54%;height:80%;position: absolute;opacity: 0">
	 								<span class="py-2 px-3 d-inline-block">إستعراض</span>
	 								
	 							</span>
	 						</div>
	 					</div>
	 				</div>
	 				<div class="col-12 col-lg-6  mb-2">
	 					<div style="background: #fff;border-radius: 6px!important" class="pt-2 row">
	 						<div class="col-6 pt-1">
	 							إنجليزي <span class="preview-image-site">
	 								<img src="{{($site_profile->icon_en!=null)?$site_profile->icon_en:''}}" style="width: 100%;height: 100%;" >
	 							</span>
	 						</div>
	 						<div class="col-6 text-left">
	 							<span class="d-inline-block " style="border:1px solid #2381c6;color: #2381c6;border-radius: 50px!important;font-size: 12px;cursor: pointer;overflow: hidden;cursor: pointer;"> 
	 								<input type="file" name="icon_en" style="width: 54%;height:80%;position: absolute;opacity: 0">
	 								<span class="py-2 px-3 d-inline-block">إستعراض</span>
	 								
	 							</span>
	 						</div>
	 					</div>
	 				</div>
	 			</div>
	 		</div>
	 	</div>
	 </div>
 

	 <div class="col-12">
		 <div class="col-12 mt-4">
	 		<h6 style="font-weight: bold;">الوصف - عربي</h6>
	 		<div class="col-12 row">
	 			<div class="col-12 col-lg-3  mb-2">
	 				<div class="col-12 px-0 py-2" style="background: #fff;border-radius: 6px!important">
	 					<input type="" name="site_name_ar" class="form-control" style="border:none" placeholder="اسم الموقع..." value="{{$site_profile->site_name_ar}}">
	 				</div>
	 			</div>
	 			<div class="col-12 col-lg-4  mb-2">
	 				<div class="col-12 px-0 py-2" style="background: #fff;border-radius: 6px!important">
	 					<input type="" name="site_sub_name_ar" class="form-control" style="border:none" placeholder="العنوان الفرعي..."  value="{{$site_profile->site_sub_name_ar}}">
	 				</div>
	 			</div>

	 			<div class="col-12 col-lg-5  mb-2">
	 				<div class="col-12 px-0 py-2" style="background: #fff;border-radius: 6px!important">
	 					<input type="" name="ar_keywords" class="form-control" style="border:none" placeholder="كلمات مفتاحية مثل : الذهب , الفضة , اسعار الذهب .."  value="{{$site_profile->ar_keywords}}">
	 				</div>
	 			</div>

	 			<div class="col-12   mb-2">
	 				<div class="col-12 px-0 py-2" style="background: #fff;border-radius: 6px!important">
	 					<input type="" name="site_description_ar" class="form-control" style="border:none" placeholder="وصف الموقع..."  value="{{$site_profile->site_description_ar}}">
	 				</div>
	 			</div>

	 		</div>
	 	</div>
	 	<div class="col-12 mt-4">
	 		<h6 style="font-weight: bold;">الوصف - إنجليزي</h6>
	 		<div class="col-12 row">
	 			<div class="col-12 col-lg-3  mb-2">
	 				<div class="col-12 px-0 py-2" style="background: #fff;border-radius: 6px!important">
	 					<input type="" name="site_name_en" class="form-control" style="border:none" placeholder="اسم الموقع..."  value="{{$site_profile->site_name_en}}">
	 				</div>
	 			</div>
	 			<div class="col-12 col-lg-4  mb-2">
	 				<div class="col-12 px-0 py-2" style="background: #fff;border-radius: 6px!important">
	 					<input type="" name="site_sub_name_en" class="form-control" style="border:none" placeholder="العنوان الفرعي..."  value="{{$site_profile->site_sub_name_en}}">
	 				</div>
	 			</div>
	 			<div class="col-12 col-lg-5  mb-2">
	 				<div class="col-12 px-0 py-2" style="background: #fff;border-radius: 6px!important">
	 					<input type="" name="en_keywords" class="form-control" style="border:none" placeholder="كلمات مفتاحية مثل : الذهب , الفضة , اسعار الذهب .."  value="{{$site_profile->en_keywords}}">
	 				</div>
	 			</div>
	 			<div class="col-12   mb-2">
	 				<div class="col-12 px-0 py-2" style="background: #fff;border-radius: 6px!important">
	 					<input type="" name="site_description_en" class="form-control" style="border:none" placeholder="وصف الموقع..."  value="{{$site_profile->site_description_en}}">
	 				</div>
	 			</div>
	 		</div>
	 	</div>


	 	
	 	<div class="col-12 mt-4">
	 		<h6 style="font-weight: bold;">إحصائيات  الموقع ( لازم لتشغيل صفحة الاحصائيات )</h6>
	 		<div class="col-12 row">
	 			<div class="col-12 col-lg-6  mb-2">
	 				<div class="col-12 px-0 py-2" style="background: #fff;border-radius: 6px!important">
	 					<input type="number" name="view_id" class="form-control" style="border:none" placeholder="view_id"  value="{{$site_profile->view_id}}">
	 				</div>
	 			</div>
	 			<div class="col-12 col-lg-6  mb-2">
	 				<div class="col-12 px-0 py-2" style="background: #fff;border-radius: 6px!important">
	 					<textarea   name="credentials_statistics" class="form-control" style="border:none" placeholder="credentials"  >{{$site_profile->credentials_statistics}}</textarea>
	 				</div>
	 			</div>
	 		 
	 		</div>
	 	</div>


	 	<div class="col-12 mt-4">
	 		<h6 style="font-weight: bold;">تحليلات قوقل</h6>
	 		<div class="col-12 row">
	 			 
	 			<div class="col-12">
	 				<div class="col-12 px-0 py-2 " style="background: #fff;border-radius: 6px!important">
	 				<textarea class="form-control  mb-2" placeholder="الكود..." style="border:none;text-align: left;min-height: 150px;direction: ltr" name="google_analytics">{{$site_profile->google_analytics}}</textarea>
					 </div>
	 			</div>
	 		</div>
	 	</div>



	 
	 	

	 	<div class="col-12 " style="position: fixed;top: 5px;height: 40px;width: 100%;right: 0px;text-align: left;direction: ltr">
                <button class="btn btn-success rounded-0 cairo text-center" style="width: 180px;" onclick="$('#adv_store').submit();">حفظ</button>
            </div> 

            </form>
	 </div>

</div>
@endsection

