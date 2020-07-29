<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('sites.index');
    }


    public function index_site(Request $request){
        $site=\App\Site::where('id',$request->site_id)->get()->first();
        $site_profile=\App\Site_profile::where('site_id',$site->id)->get()->first();
        return view('sites.site-profile',compact('site','site_profile'));
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


        $request->validate([
          "site_id"=>'required|integer',
          "logo_ar_path"=> 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
          "logo_en_path"=> 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
          "logo_ar_path_dark"=> 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
          "logo_en_path_dark"=> 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
          "icon_ar"=> 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
          "icon_en"=> 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
          "site_name_ar"=> 'nullable|string|min:1|max:2000',
          "site_sub_name_ar"=> 'nullable|string|min:1|max:2000',
          "site_description_ar"=> 'nullable|string|min:1|max:2000',
          "site_name_en"=> 'nullable|string|min:1|max:2000',
          "site_sub_name_en"=> 'nullable|string|min:1|max:2000',
          "site_description_en"=> 'nullable|string|min:1|max:2000',
          "google_analytics"=> 'nullable|string|min:1|max:2000',
          "view_id"=>'nullable|integer|min:000000000|max:999999999',
          "credentials_statistics"=>'nullable|string',
          "en_keywords"=>'nullable|string',
          "ar_keywords"=>'nullable|string',
          
        ]);


        $update=\App\Site_profile::where('site_id',$request->site_id)->update([ 
              "site_name_ar"=> $request->site_name_ar,
              "site_sub_name_ar"=> $request->site_sub_name_ar,
              "site_description_ar"=> $request->site_description_ar,
              "site_name_en"=> $request->site_name_en,
              "site_sub_name_en"=> $request->site_sub_name_en,
              "site_description_en"=> $request->site_description_en,
              "google_analytics"=> $request->google_analytics,
              "view_id"=>$request->view_id,
              "credentials_statistics"=>$request->credentials_statistics,
              "en_keywords"=>$request->en_keywords,
              "ar_keywords"=>$request->ar_keywords
        ]);


        if($request->hasFile('logo_ar_path'))
        {
            $file = $request->file('logo_ar_path');
            $filename =\Auth::user()->id.'_'.uniqid().'_'.time().'_'.$file->getClientOriginalName();
            $path = public_path().'/uploads/site_'.$request->site_id.'/';
            $this->make_dir_if_not_exists($path); 
            $file->move($path, $filename);
            $update_logo_ar_path=\App\Site_profile::where('site_id',$request->site_id)->update([ 
                  "logo_ar_path"=> env('APP_URL').env('PUBLIC_PATH').'/uploads/site_'.$request->site_id.'/'.$filename 
              ]);
        }

        if($request->hasFile('logo_en_path'))
        {
            $file = $request->file('logo_en_path');
            $filename =\Auth::user()->id.'_'.uniqid().'_'.time().'_'.$file->getClientOriginalName();
            $path = public_path().'/uploads/site_'.$request->site_id.'/';
            $this->make_dir_if_not_exists($path); 
            $file->move($path, $filename);
            $update_logo_en_path=\App\Site_profile::where('site_id',$request->site_id)->update([ 
                  "logo_en_path"=> env('APP_URL').env('PUBLIC_PATH').'/uploads/site_'.$request->site_id.'/'.$filename
              ]);
        }
        if($request->hasFile('logo_ar_path_dark'))
        {
            $file = $request->file('logo_ar_path_dark');
            $filename =\Auth::user()->id.'_'.uniqid().'_'.time().'_'.$file->getClientOriginalName();
            $path = public_path().'/uploads/site_'.$request->site_id.'/';
            $this->make_dir_if_not_exists($path); 
            $file->move($path, $filename);
            $update_logo_ar_path_dark=\App\Site_profile::where('site_id',$request->site_id)->update([ 
                  "logo_ar_path_dark"=> env('APP_URL').env('PUBLIC_PATH').'/uploads/site_'.$request->site_id.'/'.$filename
              ]);
        }
        if($request->hasFile('logo_en_path_dark'))
        {
            $file = $request->file('logo_en_path_dark');
            $filename =\Auth::user()->id.'_'.uniqid().'_'.time().'_'.$file->getClientOriginalName();
            $path = public_path().'/uploads/site_'.$request->site_id.'/';
            $this->make_dir_if_not_exists($path); 
            $file->move($path, $filename);
            $update_logo_en_path_dark=\App\Site_profile::where('site_id',$request->site_id)->update([ 
                  "logo_en_path_dark"=> env('APP_URL').env('PUBLIC_PATH').'/uploads/site_'.$request->site_id.'/'.$filename
              ]);
        }
        if($request->hasFile('icon_ar'))
        {
            $file = $request->file('icon_ar');
            $filename =\Auth::user()->id.'_'.uniqid().'_'.time().'_'.$file->getClientOriginalName();
            $path = public_path().'/uploads/site_'.$request->site_id.'/';
            $this->make_dir_if_not_exists($path); 
            $file->move($path, $filename);
            $update_icon_ar=\App\Site_profile::where('site_id',$request->site_id)->update([ 
                  "icon_ar"=> env('APP_URL').env('PUBLIC_PATH').'/uploads/site_'.$request->site_id.'/'.$filename
              ]);
        }
        if($request->hasFile('icon_en'))
        {
            $file = $request->file('icon_en');
            $filename =\Auth::user()->id.'_'.uniqid().'_'.time().'_'.$file->getClientOriginalName();
            $path = public_path().'/uploads/site_'.$request->site_id.'/';
            $this->make_dir_if_not_exists($path); 
            $file->move($path, $filename);
            $update_icon_en=\App\Site_profile::where('site_id',$request->site_id)->update([ 
                  "icon_en"=> env('APP_URL').env('PUBLIC_PATH').'/uploads/site_'.$request->site_id.'/'.$filename
              ]);
        }

        return redirect()->back()->with('data',['alert'=>'تم التحديث بنجاح','alert-type'=>'success']);

             // "logo_ar_path"=> 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
             // "logo_en_path"=> 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
             // "logo_ar_path_dark"=> 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
             // "logo_en_path_dark"=> 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
              //"icon_ar"=> 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
              //"icon_en"=> 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',


        //return $request;
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
}
