<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Analytics;
use Spatie\Analytics\Period;

class TestingController extends Controller
{
    public function index()
    {




/*    	 
$accessID = env('MOZ_ACCESS_ID'); 
$secretKey =  env('MOZ_SECRET_KEY');
$expires = time() + 300;
$stringToSign = $accessID."\n".$expires;
$binarySignature = hash_hmac('sha1', $stringToSign, $secretKey, true);
$urlSafeSignature = urlencode(base64_encode($binarySignature));
$objectURL = 'https://nafezly.com';
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
$pageAuthority = round($json_a->upa,0); // * Use the round() function to return integer
$domainAuthority = round($json_a->pda,0);
$externalLinks = $json_a->ueid;
$theUrl = $json_a->uu;

return $theUrl;	*/





/*Config::set('analytics.view_id', '203712196' );
Config::set('analytics.service_account_credentials_json', json_decode('{
  "type": "service_account",
  "project_id": "nafezly-1570492095344",
  "private_key_id": "b01d4cc2b9ebe671d7065a92787f2ed9c216e59b",
  "private_key": "-----BEGIN PRIVATE KEY-----\nMIIEvAIBADANBgkqhkiG9w0BAQEFAASCBKYwggSiAgEAAoIBAQCxnyldFJJ5vX7W\nt1EfH8UADNHwRiFOeLvI2KfvZbsaFjxcD2WNUgRnuRI87qpMeE/shfyHt4kZ5624\nD8zOMfwr7pZpELZv+IdkTTGcHiuY4fJTekBI6c/Vp0L8vGIM0pW2+kNRPYPhBcqR\nE2Smf3l4Fck2+s9vUMZ1lnQqdsCWMU8rNvhlZzjhDQOR/hsrPXbDRyWpjMGXh/ee\n1rc11HdyTssECNRBfXN51AeSOPCxtsbC3VAy1jERYr01T/0yFocVcEVacz8wQgxn\n+sCk6f8DFTT+tAqhrP2HGG7SPotaoEnbjqramFwpKXI4+aNGfuqA/nLqNVZ8lz2g\nUcXx9EA1AgMBAAECggEAB05+D9q+X3IqCHtK2ROAPIKKf05kj9sRFHpvHBQMqI56\nG1UJzyYCJuHQLCqq3ZGZw2fL7dRLuEGqyIEj4maK0k7Sp/icnJ9gsxb8Kl57r3gP\nSnD4udceaiei2TfcS7KSSeWNGoeD3YrqBzeWQsVzJyYJnIX1kwVuXdzGI2S2WDyW\nRLK+B5ReUywjpa5l9D6nk/ylZf/d93kby/c19/KsxDac2RoX1Hga7UJnJ7GrDypx\nZ0wqmKlj8uV1gnmg/io1eVVkFNONHIf7PPyuYT5r1K333if43PZ1Kk9hwxueWFwQ\ntEQ7iu3+kAeyDwrm3atgX8PZHvFQG+cqvcGaETKG2QKBgQDnDb0bC89higrS2WE2\nRrN1pvndo0zrvF7yFlQ6JiL1gDEnVvuw/B3eDhJrKiP7GusySGpdqwHUTr6CcTFZ\nzIwkLtjVBviDHzsoji7eleF1MkD2YC1g/iq5525QdGIX3SyJVU2p3dehyFxRaFDo\nX5+nv8lR4n5VVEoFRrBuKek+6QKBgQDEzJQPOFXw8XAnSjIVrgveb/JmtLXTDd5q\nAAeujyNBXmtfcZzpSv92xy2IC2tS3quu5sIfAt2B5sIaWBNTT5YFeTRRc652Ewcu\nVTPZ9nVAMIzpFuap7gVPednL9aPH/0jfTIyHnXNchG8EFVduPWlfp/eRNjQLRhOZ\nKuLTWWxfbQKBgG/R2VROieXVrdlPNNnUq6Nj1Qcrsd1gg767ibW+oSqZCLDWSubj\njPzbaJSOh21OIMdr/nYofbEnDtIIP+8KrEQSnAO05O5oXfQJo6s7dCqI0KGr+Co5\nt6nS1DOBr7uG4bfxHa343BPC6NLJHmbnaFgB3EeRyrw3F7+n71jRVb2JAoGAejU0\nKDNqouG7LJrVeUMIWcwYshC77GDrYdW873gxg3FXqgBKWVDaTO8o5hd5QQ/HeygP\nGeTUmssqc+OHtK9yUNnQVFhK2UW9qtb8CPkUHJVJm6E+Af4tzAm15wMV/qcXoJrP\nlZN/xM70hYufLHT0T5NlmAYZ0XplxzKrgmVAeA0CgYAuNn99rL+VjpJitTlAA41c\neadjrWmWC8pNnTiWo9a+QADJeYdfzxOvvx5lAVghejm7Mn/8LO31buLeim26tThS\nREdzLClRBShNmhRMQyLjVRMW61iMsvky/yRffvtP74+a2ls++KRrcV+Tjh5EUfQz\n2LFcriQOyCHAEhD2SpO5KQ==\n-----END PRIVATE KEY-----\n",
  "client_email": "google-api@nafezly-1570492095344.iam.gserviceaccount.com",
  "client_id": "100318564536982760027",
  "auth_uri": "https://accounts.google.com/o/oauth2/auth",
  "token_uri": "https://oauth2.googleapis.com/token",
  "auth_provider_x509_cert_url": "https://www.googleapis.com/oauth2/v1/certs",
  "client_x509_cert_url": "https://www.googleapis.com/robot/v1/metadata/x509/google-api%40nafezly-1570492095344.iam.gserviceaccount.com"
}',true) );
	*/


 	//retrieve visitors and pageview data for the current day and the last seven days
//$analyticsData = Analytics::fetchVisitorsAndPageViews(Period::days(7));

//retrieve visitors and pageviews since the 6 months ago
/*$analyticsData = Analytics::fetchTopReferrers(Period::months(1));
return $analyticsData;
$t=0;
foreach($analyticsData as $analyticsData1){
	$t+=$analyticsData1['visitors'];
}
return dd($t);
//retrieve sessions and pageviews with yearMonth dimension since 1 year ago 
$analyticsData = Analytics::performQuery(
    Period::years(1),
    'ga:sessions',
    [
        'metrics' => 'ga:sessions, ga:pageviews',
        'dimensions' => 'ga:yearMonth'
    ]
);*/



/*$data=file_get_contents("http://example.com/bbb.php?user=tester&token=".$tokenid);
*/
	//$peter =file_get_contents('https://www.alexa.com/minisiteinfo/nafezly.com?offset=5&version=alxg_20100607');
	//return $peter;
	/*$data = App::make('DomainAuthority')
    ->urlMetrics('www.nafezly.com', UrlMetrics::DomainAuthority | UrlMetrics::Title);
    return var_dump($data);*/
    /*
$curl = curl_init();

curl_setopt_array($curl, array(
	CURLOPT_URL => "https://seo.p.rapidapi.com/api?meta_desciption=The%20article%20will%20show%20you%20the%20best%20smartphones%20and%20compares%20the%20different%20features%20to%20give%20you%20an%20advice%20which%20smartphone%20to%20buy&html=%253Carticle%253E%253Cp%253E...%253C%252Fp%253E%253Cp%253E....%253C%252Fp%253E%253C%252Farticle%253E&title=Best%20smarthphone%202014%20comparison&url=http%253A%252F%252Fmy-page.com%252Fmy-article-url&keyword=best%20smartphone",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
	CURLOPT_HTTPHEADER => array(
		"x-rapidapi-host: seo.p.rapidapi.com",
		"x-rapidapi-key: 1c0c254327msh43d0663e8dadba2p1d1660jsn13541a3d52d9"
	),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
	echo "cURL Error #:" . $err;
} else {
	echo $response;
}
*/
    }
}
