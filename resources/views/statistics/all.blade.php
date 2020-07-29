@extends('include.app')
@section('content')



<div class="col-12 container d-flex " style="height: 100vh">
	  
	  <div class="container mt-4 py-5 "  >
	  	@foreach($total_response as $total_response_x)
	  	@php 
		/* dd($total_response_x);*/
		$site=\App\Site::where('id',$total_response_x['site_id'])->get()->first();
		@endphp

	  	<div class="col-12 py-4 mb-5" style="background: #fff;    box-shadow: 0px 0px 10px #e2e2e2;border-radius: 10px">
	  		<div class="col-12 row ">
	  			<div class="col-12   col-lg-2 text-center font-3 cairo my-auto">
	  				{{$site['name']}}
	  			</div>
	  			<div class="col-12   col-lg-10 px-0">
	  				<div class="col-12 px-0  mb-2"> 
		  				<div class="col-12 px-0 cairo mb-2 ">
		  					ترتيب أليكسا
		  				</div>
		  				<div class="col-12 px-0">
			  				<div class="progress" style="height: 15px; text-align: center;border-radius: 20px">
							  <div class="progress-bar text-center cairo" role="progressbar" style="width: {{((abs($total_response_x['site_statistics']['alexaRank'])/1000000)*100000  )}}%;border-radius: 20px"   aria-valuemin="1000000" aria-valuemax="1">{{$total_response_x['site_statistics']['alexaRank']}}</div>
							</div>
						</div>
					</div>
					
					<div class="col-12 px-0  mb-2"> 
		  				<div class="col-12 px-0 cairo mb-2">
		  					الدومين اوثوروتي
		  				</div>
		  				<div class="col-12 px-0">
			  				<div class="progress cairo" style="height: 15px; text-align: center;border-radius: 20px">
							  <div class="progress-bar text-center cairo" role="progressbar" style="width: {{(abs($total_response_x['site_statistics']['domainAuthority']))}}%;border-radius: 20px;background: #f57c00"   aria-valuemin="1000000" aria-valuemax="1">{{(abs($total_response_x['site_statistics']['domainAuthority']))}}</div>
							</div>
						</div>
					</div>
					<div class="col-12 px-0  mb-2"> 
		  				<div class="col-12 px-0 cairo mb-2">
		  					البيج اوثوروتي
		  				</div>
		  				<div class="col-12 px-0">
			  				<div class="progress cairo" style="height: 15px; text-align: center;border-radius: 20px">
							  <div class="progress-bar text-center cairo" role="progressbar" style="width: {{(abs($total_response_x['site_statistics']['pageAuthority']))}}%;border-radius: 20px;background: #00796b"  aria-valuemin="1000000" aria-valuemax="1">{{(abs($total_response_x['site_statistics']['pageAuthority']))}}</div>
							</div>
						</div>
					</div>

					<div class="col-12 px-0  mb-2"> 
		  				<div class="col-12 px-0 cairo mb-2">
		  					الروابط الخلفية
		  				</div>
		  				<div class="col-12 px-0">
			  				<div class="progress cairo" style="height: 15px; text-align: center;border-radius: 20px">
							  <div class="progress-bar text-center cairo" role="progressbar" style="width: {{(abs($total_response_x['site_statistics']['externalLinks'])/100 )}}%;border-radius: 20px;background: #424242"  aria-valuemin="1000000" aria-valuemax="1">{{(abs($total_response_x['site_statistics']['externalLinks']))}}</div>
							</div>
						</div>
					</div>


					
					<div class="col-12 row px-0 mt-4">

						<div class="col-12 col-md-6 col-lg-4 mt-2 px-1">
				                <div class="col-12 p-lg-3 p-2 row" style="border-radius: 5px; background: #fff;    box-shadow: 0px 0px 10px #ddd;">
				                    <div style="width: calc(100% - 60px)">
				                        عدد زوار اليوم
				                        <br>
				                        <span class="d-inline-block pt-2 font-3 visitors{{$total_response_x['site_id']}}t_today " style="color: #2381c6">
				                        	<div class="spinner-grow text-primary" role="status" style="border-radius: 50%">
											  <span class="sr-only">Loading...</span>
											</div>
				                        </span>
				                    </div>
				                    <div style="width:60px" class="text-center">
				                        <span class="text-center" style="width: 50px;height: 50px;background: #85dfda;border-radius: 50%;display: inline-block;">
				                            <span class="fa fa-info" style="color: #fff;padding-top: 16px;"></span>
				                        </span>
				                    </div>
				                </div>
				            </div>
				            <div class="col-12 col-md-6 col-lg-4 mt-2 px-1">
				                <div class="col-12 p-lg-3 p-2 row" style="border-radius: 5px; background: #fff;    box-shadow: 0px 0px 10px #ddd;">
				                    <div style="width: calc(100% - 60px)">
				                        عدد زوار الشهر
				                        <br>
				                        <span class="d-inline-block pt-2 font-3 visitors{{$total_response_x['site_id']}}t_1month" style="color: #2381c6">
				                        	<div class="spinner-grow text-primary" role="status" style="border-radius: 50%">
											  <span class="sr-only">Loading...</span>
											</div>

				                        </span>
				                    </div>
				                    <div style="width:60px" class="text-center">
				                        <span class="text-center" style="width: 50px;height: 50px;background: #85dfda;border-radius: 50%;display: inline-block;">
				                            <span class="fa fa-info" style="color: #fff;padding-top: 16px;"></span>
				                        </span>
				                    </div>
				                </div>
				            </div>

				            <div class="col-12 col-md-6 col-lg-4 mt-2 px-1">
				                <div class="col-12 p-lg-3 p-2 row" style="border-radius: 5px; background: #fff;    box-shadow: 0px 0px 10px #ddd;">
				                    <div style="width: calc(100% - 60px)">
				                        عدد زوار 3 اشهر
				                        <br>
				                        <span class="d-inline-block pt-2 font-3 visitors{{$total_response_x['site_id']}}t_3month" style="color: #2381c6">
				                        	<div class="spinner-grow text-primary" role="status" style="border-radius: 50%">
											  <span class="sr-only">Loading...</span>
											</div>

				                        </span>
				                    </div>
				                    <div style="width:60px" class="text-center">
				                        <span class="text-center" style="width: 50px;height: 50px;background: #85dfda;border-radius: 50%;display: inline-block;">
				                            <span class="fa fa-info" style="color: #fff;padding-top: 16px;"></span>
				                        </span>
				                    </div>
				                </div>
				            </div>


				          


			  		 
			  		</div>




	  			</div>
	  			


	  		</div>
	  		
	  		 
	  		
	  		 
	  	</div>
	  	@endforeach
	  </div>
	 	 
</div>
<script type="text/javascript">
	
	var sites=[
		@foreach($total_response as $total_response_x)
		"{{$total_response_x['site_id']}}",
		@endforeach
		""
		];
		

		function ajaxx(argument) { 
			$.ajaxSetup({
			    headers: {
			        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			    }
			});
			$.ajax({
			  method: "POST",
			  url: "/statistics/all/all/site_ajax/"+argument,
			  data: {}
			})
			  .done(function( msg ) {
			  //	console.log(msg);
			  	//console.log('done');
			   $('.visitors'+argument+'t_today').html(msg['t_today']);
			   $('.visitors'+argument+'t_1month').html(msg['t_1month']);
			   $('.visitors'+argument+'t_3month').html(msg['t_3month']);
			   $('.visitors'+argument+'t_6month').html(msg['t_6month']);
			   $('.visitors'+argument+'alert').html(msg['alert']);
			  });
		} 


	setTimeout(function(){

		
		for(var i = 0 ; i < sites.length-1;i++){
			//alert(sites[i]);
			ajaxx(sites[i]);
		}
	},2000);
</script>
@endsection