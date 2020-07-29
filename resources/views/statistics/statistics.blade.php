@extends('include.app')
@section('styles')
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.css">
@endsection
@section('content')
<style type="text/css">
    .graph-alexa img{
        display: inline-block;
        opacity: .8;
        max-width: 100%; 
    }
    .graph-alexa{
        text-align: center!important;
    }
</style>
<div class="col-12 container">
    <div class="col-12   pt-5">
       
        @if($alert!="")
          <div class="col-12 mt-3 mb-5">
              <div class="col-12 alert alert-info">
                  {!!$alert!!}
              </div>
          </div>
          @endif
        <div class="col-12 row px-0">
            <div class="col-12 col-md-6 col-lg-3 mt-2">
                <div class="col-12 p-lg-3 p-2 row" style="border-radius: 5px; background: #fff;">
                    <div style="width: calc(100% - 60px)">
                        عدد زوار اليوم
                        <br>
                        <span class="d-inline-block pt-2 font-3" style="color: #2381c6">{{number_format($t_today)}}</span>
                    </div>
                    <div style="width:60px" class="text-center">
                        <span class="text-center" style="width: 50px;height: 50px;background: #85dfda;border-radius: 50%;display: inline-block;">
                            <span class="fa fa-info" style="color: #fff;padding-top: 16px;"></span>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3 mt-2">
                <div class="col-12 p-lg-3 p-2 row" style="border-radius: 5px; background: #fff;">
                    <div style="width: calc(100% - 60px)">
                        عدد زوار الشهر
                        <br>
                        <span class="d-inline-block pt-2 font-3" style="color: #2381c6">{{number_format($t_1month)}}</span>
                    </div>
                    <div style="width:60px" class="text-center">
                        <span class="text-center" style="width: 50px;height: 50px;background: #85dfda;border-radius: 50%;display: inline-block;">
                            <span class="fa fa-info" style="color: #fff;padding-top: 16px;"></span>
                        </span>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-3 mt-2">
                <div class="col-12 p-lg-3 p-2 row" style="border-radius: 5px; background: #fff;">
                    <div style="width: calc(100% - 60px)">
                        عدد زوار 3 اشهر
                        <br>
                        <span class="d-inline-block pt-2 font-3" style="color: #2381c6">{{number_format($t_3month)}}</span>
                    </div>
                    <div style="width:60px" class="text-center">
                        <span class="text-center" style="width: 50px;height: 50px;background: #85dfda;border-radius: 50%;display: inline-block;">
                            <span class="fa fa-info" style="color: #fff;padding-top: 16px;"></span>
                        </span>
                    </div>
                </div>
            </div>


            <div class="col-12 col-md-6 col-lg-3 mt-2">
                <div class="col-12 p-lg-3 p-2 row" style="border-radius: 5px; background: #fff;">
                    <div style="width: calc(100% - 60px)">
                        عدد الروابط الخلفية
                        <br>
                        <span class="d-inline-block pt-2 font-3" style="color: #2381c6">{{number_format($externalLinks)}}</span>
                    </div>
                    <div style="width:60px" class="text-center">
                        <span class="text-center" style="width: 50px;height: 50px;background: #85dfda;border-radius: 50%;display: inline-block;">
                            <span class="fa fa-info" style="color: #fff;padding-top: 16px;"></span>
                        </span>
                    </div>
                </div>
            </div>



            
        </div>
        <div class="col-12 mt-5 ">
            <div class="col-12 row  " style="background: #fff;">
                <div class="col-12 col-lg-3 py-4">
                    <div class="col-12 row py-4">
                        <div style="width: calc(100% - 60px)">
                            ترتيب أليكسا
                            <br>
                            <span class="d-inline-block pt-2 font-3" style="color: #ffc040"> {{($alexaRank)}} </span>
                        </div>
                        <div style="width:60px" class="text-center">
                            <span class="text-center" style="width: 50px;height: 50px;border-radius: 50%;display: inline-block;">
                                <span class="fal fa-info-circle" style="color: #ffc025;padding-top: 16px;font-size: 22px"></span>
                            </span>
                        </div>
                    </div>
                    <div class="col-12 row py-4">
                        <div style="width: calc(100% - 60px)">
                            الدومين أثورتي
                            <br>
                            <span class="d-inline-block pt-2 font-3" style="color: #333"> {{number_format($domainAuthority)}} </span>
                        </div>
                        <div style="width:60px" class="text-center">
                            <span class="text-center" style="width: 50px;height: 50px;border-radius: 50%;display: inline-block;">
                                <span class="fal fa-info-circle" style="color: #ffc025;padding-top: 16px;font-size: 22px"></span>
                            </span>
                        </div>
                    </div>
                    <div class="col-12 row py-4">
                        <div style="width: calc(100% - 60px)">
                           البيج أثورتي
                            <br>
                            <span class="d-inline-block pt-2 font-3" style="color: #333"> {{number_format($pageAuthority)}} </span>
                        </div>
                        <div style="width:60px" class="text-center">
                            <span class="text-center" style="width: 50px;height: 50px;border-radius: 50%;display: inline-block;">
                                <span class="fal fa-info-circle" style="color: #ffc025;padding-top: 16px;font-size: 22px"></span>
                            </span>
                        </div>
                    </div>
                    <div class="col-12 row py-4">
                        <div style="width: calc(100% - 60px)">
                           MOZ أثورتي
                            <br>
                            <span class="d-inline-block pt-2 font-3" style="color: #333"> {{ sprintf('%0.2f', number_format($moz_moz_rank))}}  </span>
                        </div>
                        <div style="width:60px" class="text-center">
                            <span class="text-center" style="width: 50px;height: 50px;border-radius: 50%;display: inline-block;">
                                <span class="fal fa-info-circle" style="color: #ffc025;padding-top: 16px;font-size: 22px"></span>
                            </span>
                        </div>
                    </div>


                    

                </div>
                <div class="col-12 col-lg-9 py-5 graph-alexa mt-4 ">
                    {!!$alexa_traffic!!}

                	{{-- <canvas id="myChart"    style="width: 100%!important;max-width: 100%!important;min-width: 100%!important;height: 320px" class="col-12"></canvas> --}}
                </div>
            </div>
        </div>
    </div>
</div>
 
@endsection
@section('scripts')
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>
<script>

	(function () {
    
            	var ctx = document.getElementById('myChart').getContext('2d');
                        var myChart = new Chart(ctx, {
                            type: 'line', 
                            data: {
					        labels: ['يناير', 'فبراير', 'مارس', 'ابريل', 'مايو', 'يونيو'],
					        datasets: [{
					            label: 'احصائيات الرانك',
					            data: [2, 5, 6, 5, 8, 9],
					            backgroundColor: 'rgba(95, 241, 233, 0.73)',
					            borderColor: 'rgb(33, 197, 188)',
					            borderWidth: 1
					        }]
					    },
 
                            options: {
                                scales: {
                                    yAxes: [{
                                    	 maxBarThickness: 100,
                                        ticks: {
                                            beginAtZero: true,
                                            padding: 25,
                                        },
                                    }],
                                    xAxes: [{
                                        gridLines: {
                                            color: "rgba(0, 0, 0, 0)",
                                        }
                                    }],
                                 
     
                                },
                                hover: {
                                    // Overrides the global setting
                                    mode: 'index'
                                },
                                legend: {
                                    labels: {
                                        // This more specific font property overrides the global property

                                        fontFamily: 'Tajawal',
                                        defaultFontFamily: 'Tajawal',
                                    }
                                },
                                elements: {
                                    line: {
                                        tension: .2 // disables bezier curves
                                    }
                                }
                                 


                            }
                        });

                
 
        })();
 
</script>
@endsection
