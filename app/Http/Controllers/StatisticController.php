<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Config;
use Analytics;
use Spatie\Analytics\Period;
use Nticaric\Awis\Awis;
use \SEOstats\Services as SEOstats;
use App\Http\Controllers\Alexa\UrlInfo;
class StatisticController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('statistics.index');
    }

    public function all(Request $request){


        $sites=\App\Site::orderBy('id','ASC')->get();


        $total_response=array();
        for($ii=0;$ii<count($sites);$ii++)
        { 
            $site_id=$sites[$ii]->id;
            $site=\App\Site::where('id',$site_id)->get()->first();
            
            //return $site->link;
            

               
            //return $site->site_profile->first()->view_id;
            $site=\App\Site::where('id',$site_id)->get()->first();
            $seostats = new \SEOstats\SEOstats;
            $seostats->setUrl($site->link);
            //sleep(1);

            //$view_id=$site_profile['view_id'];
            //$credentials_statistics=$site_profile['credentials_statistics'];


            //return Config::get('analytics.view_id');


           // return dd($this->get_google_visites($site_id));
            /*$google_visitors=$this->get_google_visites($site_id);
            $t_today=  $google_visitors['t_today'];
            $t_1month= $google_visitors['t_1month'];
            $t_3month=$google_visitors['t_3month'];
            $t_6month=$google_visitors['t_6month'];
            $alert=$google_visitors['alert'];*/
            
            // return $google_visitors;

            $alexa_traffic=SEOstats\Alexa::getTrafficGraph(1);

            $pageAuthority="0";
            $domainAuthority="0";
            $externalLinks="0";

            if(session('moz_'.$site->id)!="true")
            {
                $accessID = env('MOZ_ACCESS_ID'); 
                $secretKey =  env('MOZ_SECRET_KEY');
                $expires = time()+5;
                $stringToSign = $accessID."\n".$expires;
                $binarySignature = hash_hmac('sha1', $stringToSign, $secretKey, true);
                $urlSafeSignature = urlencode(base64_encode($binarySignature));
                $objectURL = $site->link;
                $cols = "103079215140";
                $requestUrl = "http://lsapi.seomoz.com/linkscape/url-metrics/".urlencode($objectURL)."?Cols=".$cols."&AccessID=".$accessID."&Expires=".$expires."&Signature=".$urlSafeSignature;
                $options = array(
                CURLOPT_RETURNTRANSFER => true
                );
                $ch = curl_init($requestUrl);
                curl_setopt_array($ch, $options);
                $content = curl_exec($ch);
                curl_close($ch);
                $json_a = json_decode($content);
                $pageAuthority = round($json_a->upa,0);  
                $domainAuthority = round($json_a->pda,0);
                $externalLinks = $json_a->ueid;
                $moz_moz_rank=SEOstats\Mozscape::getMozRank();


                session(['moz_'.$site->id=>"true"]);
                session(['moz_pageAuthority'.$site->id=>$pageAuthority]);
                session(['moz_domainAuthority'.$site->id=>$domainAuthority]);
                session(['moz_externalLinks'.$site->id=>$externalLinks]);
                session(['moz_moz_rank'.$site->id=>$moz_moz_rank]);
                
            }
            else{

                $pageAuthority = session('moz_pageAuthority'.$site->id);  
                $domainAuthority = session('moz_domainAuthority'.$site->id);  
                $externalLinks = session('moz_externalLinks'.$site->id);  
                $moz_moz_rank = session('moz_moz_rank'.$site->id);  
            }



            if(session('alexa_rank_'.$site->id)!="true")
            {
                //return  SEOstats\Alexa::getGlobalRank();
              $alexaRank= $this->AlexaRank($site->link,'Iran',"global");
               session(['alexa_rank_'.$site->id=>"true"]);
               session(['alexa_rank_val_'.$site->id=>$alexaRank]);
            }
            else{
                $alexaRank=  session('alexa_rank_val_'.$site->id); 
             }
 
             $tempo=array('site_id'=>$site_id,'site_statistics'=>
               array(
                  
                    'alexa_traffic'=>$alexa_traffic,
                    'pageAuthority'=>$pageAuthority,
                    'domainAuthority'=>$domainAuthority,
                    'externalLinks'=>$externalLinks,
                    'alexaRank'=>$alexaRank,
                   

                )
            );
            // return $tempo;
             array_push($total_response, $tempo);


    }


    return view('statistics.all', compact('total_response'));


    }

    public function index_site($site_id)
    {
 


        $alert="";

        $site=\App\Site::where('id',$site_id)->get()->first();
        $seostats = new \SEOstats\SEOstats;
        $seostats->setUrl($site->link);

        $t_today=0;
        $t_1month=0;
        $t_3month=0;
        $t_6month=0;

        try{
            Config::set('analytics.view_id', $site->site_profile->first()->view_id );
            Config::set('analytics.service_account_credentials_json', json_decode($site->site_profile->first()->credentials_statistics,true) );

            $analyticsDataa = Analytics::fetchVisitorsAndPageViews(Period::days(1));
           
            foreach($analyticsDataa as $analyticsData1){
                $t_today+=$analyticsData1['visitors'];
            }

            $analyticsDatab = Analytics::fetchVisitorsAndPageViews(Period::months(1));
            
            foreach($analyticsDatab as $analyticsData2){
                $t_1month+=$analyticsData2['visitors'];
            }

            $analyticsDatac = Analytics::fetchVisitorsAndPageViews(Period::months(3));
            
            foreach($analyticsDatac as $analyticsData3){
                $t_3month+=$analyticsData3['visitors'];
            }

            $analyticsDatad = Analytics::fetchVisitorsAndPageViews(Period::months(6));
            
            foreach($analyticsDatad as $analyticsData4){
                $t_6month+=$analyticsData4['visitors'];
            }

        }catch(\Exception $e){
            $alert="
            برجاء التأكد من الخطوات التالية <br>
            1- إدخال رابط الموقع بالشكل الصحيح
             <br>
            2- الدخول إلي صفحة اعدادات الموقع و إدخال view_id , credentials شرح طريقة الحصول عليهم من هنا <a href='https://github.com/spatie/laravel-analytics' target='_blank'>هنا </a>
             <br>
            3- إضافة Client Email إلي مجموعة الصلاحيات عن طريق الدخول إلي صفحة الاحصائيات <a href='https://analytics.google.com/analytics/web/' target='_blank'>هنا <br></a> وإختيار الموقع المراد اضافتة <br> ومن ثم .. Admin > Account > Account User Menagement > + > Add Users > Email addresses . بعدها ستظهر الاحصائيات تلقائيا هنا 
            ";
        }



        $alexa_traffic=SEOstats\Alexa::getTrafficGraph(1);

        $pageAuthority="0";
        $domainAuthority="0";
        $externalLinks="0";

        if(session('moz_'.$site->id)!="true")
        {
            $accessID = env('MOZ_ACCESS_ID'); 
            $secretKey =  env('MOZ_SECRET_KEY');
            $expires = time()+5;
            $stringToSign = $accessID."\n".$expires;
            $binarySignature = hash_hmac('sha1', $stringToSign, $secretKey, true);
            $urlSafeSignature = urlencode(base64_encode($binarySignature));
            $objectURL = $site->link;
            $cols = "103079215140";
            $requestUrl = "http://lsapi.seomoz.com/linkscape/url-metrics/".urlencode($objectURL)."?Cols=".$cols."&AccessID=".$accessID."&Expires=".$expires."&Signature=".$urlSafeSignature;
            $options = array(
            CURLOPT_RETURNTRANSFER => true
            );
            $ch = curl_init($requestUrl);
            curl_setopt_array($ch, $options);
            $content = curl_exec($ch);
            curl_close($ch);
            $json_a = json_decode($content);
            $pageAuthority = round($json_a->upa,0);  
            $domainAuthority = round($json_a->pda,0);
            $externalLinks = $json_a->ueid;
            $moz_moz_rank=SEOstats\Mozscape::getMozRank();


            session(['moz_'.$site->id=>"true"]);
            session(['moz_pageAuthority'.$site->id=>$pageAuthority]);
            session(['moz_domainAuthority'.$site->id=>$domainAuthority]);
            session(['moz_externalLinks'.$site->id=>$externalLinks]);
            session(['moz_moz_rank'.$site->id=>$moz_moz_rank]);
            
        }
        else{

            $pageAuthority = session('moz_pageAuthority'.$site->id);  
            $domainAuthority = session('moz_domainAuthority'.$site->id);  
            $externalLinks = session('moz_externalLinks'.$site->id);  
            $moz_moz_rank = session('moz_moz_rank'.$site->id);  
        }






        //alexa traffic
        /*if(session('alexa_'.$site->id)!="true"){ 
            session(['alexa_'.$site->id=>"true"]);
            $client = new \GuzzleHttp\Client();
            $res_alexa = $client->request('GET', 'https://awis.api.alexa.com/api?Action=urlInfo&ResponseGroup=Rank&Url='.$site->link, [
                'headers' => [
                    'Authorization' => 'AWS4-HMAC-SHA256',
                    'Credential'     => env('AWIS_SECRET_ACCESS_KEY').'/20190129/us-east-1/execute-api/aws4_request, SignedHeaders=host;x-amz-date, Signature=<GENERATED_AUTH_V4_SIGNATURE>Content-Type: application/xml',
                    'X-Amz-Date'      =>'20190129T043159Z',
                    'x-api-key'=>'6j6Hh50g5koSNHURGLjl6J1JEcmbXwd1dwsoZ525',
                    'x-amz-security-token'=>'<COGNITO_STS_SECURITY_TOKEN>'
                ]
            ]);
            
        }*/
        
        //UrlInfo

       
        //return  ;
       
        /*$awiss= new  UrlInfo(env('AWIS_ACCESS_KEY_ID'), env('AWIS_SECRET_ACCESS_KEY'),$site->link);
        return $awiss->getUrlInfo();*/
        if(session('alexa_rank_'.$site->id)!="true")
        {
            //return  SEOstats\Alexa::getGlobalRank();
          $alexaRank= $this->AlexaRank($site->link,'Iran',"global");
           session(['alexa_rank_'.$site->id=>"true"]);
           session(['alexa_rank_val_'.$site->id=>$alexaRank]);
        }
        else{
            $alexaRank=  session('alexa_rank_val_'.$site->id); 
         }

        //return env('AWIS_SECRET_ACCESS_KEY');
        //$awis = new Awis(env('AWIS_ACCESS_KEY_ID'), env('AWIS_SECRET_ACCESS_KEY'));
        //return dd($awis);
        //$response = $awis->getSitesLinkingIn("example.com");
        //$response = $awis->getTrafficHistory("deblab.ae");
        //return dd($response->getBody());




    //return dd($json_a);


        return view('statistics.statistics',compact('site','t_today','t_1month','t_3month','t_6month','pageAuthority','domainAuthority','externalLinks','alert','alexaRank','moz_moz_rank','alexa_traffic'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public static function get_google_visites($site_id){
        //return $site_id;
            $alert="";
            
            $t_today=0;
            $t_1month=0;
            $t_3month=0;
            $t_6month=0;

            $site_profile=\App\Site_profile::where('site_id',$site_id)->get()->first(); 
           /*
            \Artisan::call('cache:clear');*/
            Config::set('analytics.view_id', $site_profile['view_id'] );
            Config::set('analytics.service_account_credentials_json', json_decode($site_profile['credentials_statistics'],true) );


            try{
                

                ${'analyticsDataa'.$site_id.'a'} = Analytics::fetchVisitorsAndPageViews(Period::days(1));
               
                foreach(${'analyticsDataa'.$site_id.'a'} as ${'analyticsData'.$site_id.'1'}){
                    $t_today+=${'analyticsData'.$site_id.'1'}['visitors'];
                }
                //return $t_today;

                ${'analyticsDataa'.$site_id.'b'} = Analytics::fetchVisitorsAndPageViews(Period::months(1));
                
                foreach(${'analyticsDataa'.$site_id.'b'} as ${'analyticsData'.$site_id.'2'} ){
                    $t_1month+=${'analyticsData'.$site_id.'2'}['visitors'];
                }

                ${'analyticsDataa'.$site_id.'c'} = Analytics::fetchVisitorsAndPageViews(Period::months(3));
                
                foreach(${'analyticsDataa'.$site_id.'c'} as ${'analyticsData'.$site_id.'3'}){
                    $t_3month+=${'analyticsData'.$site_id.'3'}['visitors'];
                }

                ${'analyticsDataa'.$site_id.'d'} = Analytics::fetchVisitorsAndPageViews(Period::months(6));
                
                foreach(${'analyticsDataa'.$site_id.'d'} as ${'analyticsData'.$site_id.'4'}){
                    $t_6month+=${'analyticsData'.$site_id.'4'}['visitors'];
                }

            }catch(\Exception $e){

            
           


                $alert="
                برجاء التأكد من الخطوات التالية <br>
                1- إدخال رابط الموقع بالشكل الصحيح
                 <br>
                2- الدخول إلي صفحة اعدادات الموقع و إدخال view_id , credentials شرح طريقة الحصول عليهم من هنا <a href='https://github.com/spatie/laravel-analytics' target='_blank'>هنا </a>
                 <br>
                3- إضافة Client Email إلي مجموعة الصلاحيات عن طريق الدخول إلي صفحة الاحصائيات <a href='https://analytics.google.com/analytics/web/' target='_blank'>هنا <br></a> وإختيار الموقع المراد اضافتة <br> ومن ثم .. Admin > Account > Account User Menagement > + > Add Users > Email addresses . بعدها ستظهر الاحصائيات تلقائيا هنا 
                ";
           }
           $array['t_today']=$t_today;
           $array['t_1month']=$t_1month;
           $array['t_3month']=$t_3month;
           $array['t_6month']=$t_6month;
           $array['alert']=$alert;

             \Artisan::call('config:clear');
            return $array;
    }
 
     public function AlexaRank($domain, $country, $mode) {
        $url = "https://www.alexa.com/minisiteinfo/".$domain;
        $string = file_get_contents($url);
        if ($mode == "country") {
            $temp_s = substr($string, strpos($string, $country." Flag") + 9 + strlen($country));
            return(substr($temp_s, 0, strpos($temp_s, "</a></div>")));
        }
        else if ($mode == "global") {
            $temp_s = substr($string, strpos($string, "Global") + 38);
            return(substr($temp_s, 0, strpos($temp_s, "</a></div>")));
        }
        else {
            return('something wrong.');
        }
    }

    public function getMultipleRanks($sites)
    {
        $cnt = 1;
        foreach($sites as $sitename => $site){
            $RankDataArr[$cnt][$site] = $this->getRank($site);
            $cnt++;
        }
        return $RankDataArr;
    }
   



}
