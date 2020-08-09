<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdvController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function all(){
        return view('settings.all');
    }
    public function all_post(Request $request){
        //return $request;



       $request->validate([
//      "popup_status"=> "required|in:true,false",
//      "popup_ar"=> 'nullable|string|min:1|max:3000',
//      "popup_en"=> 'nullable|string|min:1|max:3000',
//      "popup"=> "required|in:true,false",
//      "intro_status"=> "required|in:true,false",
//      "intro_ar"=> 'nullable|string|min:1|max:3000',
//      "intro_en"=> 'nullable|string|min:1|max:3000',
//      "intro"=> "required|in:true,false",
      "header_status"=> "required|in:true,false",
      "header_ar"=> 'nullable|string|min:1|max:3000',
      "header_en"=> 'nullable|string|min:1|max:3000',
      "header"=> "required|in:true,false",
//      "scroll_status"=> "required|in:true,false",
//      "scroll_ar"=> 'nullable|string|min:1|max:3000',
//      "scroll_en"=> 'nullable|string|min:1|max:3000',
//      "scroll"=> "required|in:true,false",
      "adv_status"=> "required|in:true,false",
      "adv_ar"=> 'nullable|string|min:1|max:3000',
      "adv_en"=> 'nullable|string|min:1|max:3000',
      "adv"=> "required|in:true,false"
       ]);

       if($request->popup =="true" ){
            //$request->validate([]);
            $popup = \App\Adv::where('id','<>','0')->update([
                'popup_status'=>($request->popup_status=='true')?1:0,
                'popup_ar'=>$request->popup_ar,
                'popup_en'=>$request->popup_en,
            ]);
        }

        if($request->intro =="true" ){
            //$request->validate([]);
            $intro = \App\Adv::where('id','<>','0')->update([
                'intro_status'=>($request->intro_status=='true')?1:0,
                'intro_ar'=>$request->intro_ar,
                'intro_en'=>$request->intro_en,
            ]);
        }
        if($request->header =="true" ){
            //$request->validate([]);
            $header = \App\Adv::where('id','<>','0')->update([
                'header_status'=>($request->header_status=='true')?1:0,
                'header_ar'=>$request->header_ar,
                'header_en'=>$request->header_en,
            ]);
        }
        if($request->scroll =="true" ){
            //$request->validate([]);
            $scroll = \App\Adv::where('id','<>','0')->update([
                'scroll_status'=>($request->scroll_status=='true')?1:0,
                'scroll_ar'=>$request->scroll_ar,
                'scroll_en'=>$request->scroll_en,
            ]);
        }
        if($request->adv =="true" ){
            //$request->validate([]);
            $adv = \App\Adv::where('id','<>','0')->update([
                'adv_status'=>($request->adv_status=='true')?1:0,
                'adv_ar'=>$request->adv_ar,
                'adv_en'=>$request->adv_en,
            ]);
        }

        /*

        if($request-> == ){
            $request->validate([]);
            $ = \App\Adv::where('id','<>','0')->update([
                ''=>$request->
                ''=>$request->
                ''=>$request->
            ]);
        }*/




        return back()->with('data',['alert'=>'تم تحديث الكل بنجاح','alert-type'=>'success']);
        //view('settings.all');
    }



    public function index()
    {
        return view('settings.index');
    }
    public function index_site(Request $request,$id){
        $site=\App\Site::where('id',$id)->get()->first();
        $settings=\App\Adv::where('site_id',$id)->get()->first();
        return view('settings.site',compact('site','settings'));
       // return $id;
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

    public function update(Request $request, $id)
    {


        $request->validate([
            'site_id'=>'integer|required',
//            'popup_status'=> 'required|string',
//            'popup_ar'=> 'nullable|string',
//            'popup_en'=> 'nullable|string',
//            'intro_status'=> 'required|string',
//            'intro_ar'=> 'nullable|string',
//            'intro_en'=> 'nullable|string',
            'header_status'=> 'required|string',
            'header_ar'=> 'nullable|string',
            'header_en'=> 'nullable|string',
//            'scroll_status'=> 'required|string',
//            'scroll_ar'=> 'nullable|string',
//            'scroll_en'=> 'nullable|string',
            'adv_status'=> 'required|string',
            'adv_ar'=> 'nullable|string',
            'adv_en'=> 'nullable|string'
        ]);
        $settings=\App\Adv::where('site_id',$request->site_id)->update([
            'user_id'=>\Auth::user()->id,
//            'popup_status'=> ($request->popup_status=='true')?1:0,
//            'popup_ar'=> $request->popup_ar,
//            'popup_en'=> $request->popup_en,
//            'intro_status'=> ($request->intro_status=='true')?1:0,
//            'intro_ar'=> $request->intro_ar,
//            'intro_en'=> $request->intro_en,
            'header_status'=> ($request->header_status=='true')?1:0,
            'header_ar'=> $request->header_ar,
            'header_en'=> $request->header_en,
//            'scroll_status'=> ($request->scroll_status=='true')?1:0,
//            'scroll_ar'=> $request->scroll_ar,
//            'scroll_en'=> $request->scroll_en,
            'adv_status'=> ($request->adv_status=='true')?1:0,
            'adv_ar'=> $request->adv_ar,
            'adv_en'=> $request->adv_en
        ]);
        return redirect()->back()->with('data',['alert'=>'تم التعديل بنجاح','alert-type'=>'success']);
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
