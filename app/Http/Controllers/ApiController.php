<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
   public function index(Request $request,$site_link){
    
    	 
    	$site=\App\Site::where('link',$site_link)->orWhere('link','https://'.$site_link)->orWhere('link','http://'.$site_link)->get()->first();

    	//return $site;
    	if(isset($site['id'])&&$site['id']!=null){
    		$advs=\App\Adv::where('site_id',$site['id'])->get()->first();
	        $site_profile=\App\Site_profile::where('site_id',$site['id'])->get()->first();
	        $footer=\App\Footer::where('site_id',$site['id'])->get()->first();
	        $pages=\App\Site_page::where('site_id',$site['id'])->get();
	        $total_pages=array();
	        foreach($pages as $page){
	        	/*$total_pages[]
	        	array_push($total_pages, $page->id);*/

	        	$page_texts=\App\Page_text::where('site_id',$page['id'])->get();
	        	$total_pages[$page->id]=$page_texts;
	        	//return $total_pages;
	        	//array_push($total_pages[$page->id], $page_texts);
	        	//$total_pages[$page->id]=

	        }
	        $site_id=$site['id'];
	        $public_path=env('PUBLIC_PATH').'/uploads';
	        $app_url=env('APP_URL');
	        //return 
	        return compact('site_id','public_path','app_url','advs','site_profile','footer','total_pages');
    	}
        else{
        	return response()->json(['message'=>'لم يتم العثور علي الموقع']);
        }

    	return 0;
    
   }
   public function sites(){
   	$sites=\App\Site::get();
   	return response()->json(['sites'=>$sites]);
   	//return 
   }


}
