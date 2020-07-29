<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sites=\App\Site::get();
        return view('sites.sites_view',compact('sites'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $request->validate([
            'name'=>'required|min:1|max:225|string',
            'link'=>'required|min:1|max:225|url',
        ]);
        $site=\App\Site::create(['user_id'=>\Auth::user()->id,'name'=>$request->name,'link'=>$request->link]);
        $settings=\App\Adv::create([
            'user_id'=>\Auth::user()->id,'site_id'=>$site->id,
            'popup_status'=> false,
            'popup_ar'=> '',
            'popup_en'=> '',
            'intro_status'=> false,
            'intro_ar'=> '',
            'intro_en'=> '',
            'header_status'=> false,
            'header_ar'=> '',
            'header_en'=> '',
            'scroll_status'=> false,
            'scroll_ar'=> '',
            'scroll_en'=> '',
            'adv_status'=> false,
            'adv_ar'=> '',
            'adv_en'=> '' 
        ]);
        $site_profile=\App\Site_profile::create(['user_id'=>\Auth::user()->id,'site_id'=>$site->id]);
        $footer=\App\Footer::create(['user_id'=>\Auth::user()->id,'site_id'=>$site->id]);
        $page=\App\Site_page::create(['user_id'=>\Auth::user()->id,'site_id'=>$site->id,'page_name'=>'الصفحة الرئيسية']);
        $Page_text=\App\Page_text::create(['user_id'=>\Auth::user()->id,'site_id'=>$site->id,'page_id'=>$page->id,'content_ar'=>'عنوان تجريبي','content_en'=>'Testing Title']);

        return redirect()->back()->with('data',['alert'=>'تمت الاضافة بنجاح','alert-type'=>'success']);

    }

 
    public function show($id)
    {
        
    }
 
    public function edit($id)
    {
        $site=\App\Site::where('id',$id)->get()->first();
        return view('sites.edit',compact('site'));
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
        $request->validate([
            'name'=>'required|min:1|max:225|string',
            'link'=>'required|min:1|max:225|url'
        ]);
        $site=\App\Site::where('id',$id)->update([
            'name'=>$request->name,
            'link'=>$request->link
        ]);
        return redirect()->route('sites.index')->with('data',['alert'=>'تمت التعديل بنجاح','alert-type'=>'success']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $site=\App\Site::where('id',$id)->delete();
         return back()->with('data',['alert'=>'تم الحذف بنجاح','alert-type'=>'success']);
    }
}
