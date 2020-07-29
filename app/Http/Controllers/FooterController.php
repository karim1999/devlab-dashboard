<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FooterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $setting = \App\Setting::firstOrCreate(
            ['id' => 1],
            ['terms' => "", 'privacy' => ""]
        );
        return view('footer.settings', $setting);
    }


    public function index_site(Request $request){
        $footer=\App\Footer::where('site_id',$request->site_id)->get()->first();
        $site_id=$request->site_id;
        return view('footer.site-footer',compact('footer','site_id'));
    }
    public function update_settings(Request $request){
        $terms= $request->post('terms');
        $privacy= $request->post('privacy');
        $setting = \App\Setting::updateOrCreate(
            ['id' => 1],
            ['terms' => $terms, 'privacy' => $privacy]
        );
        return redirect()->back()->with('data',['alert'=>'تم التحديث بنجاح','alert-type'=>'success']);
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
            'site_id'=>'integer|required|min:1',
            'footer_ar'=>'string|nullable|min:1|max:5000',
            'footer_ar_enabled'=>'required|string',
            'footer_en'=>'string|nullable|min:1|max:5000',
            'footer_en_enabled'=>'required|string'
            ]);
         $update_footer=\App\Footer::where('site_id',$request->site_id)->update([
            'footer_ar'=>$request->footer_ar,
            'footer_ar_enabled'=>($request->footer_ar_enabled=='true')?1:0,
            'footer_en'=>$request->footer_en,
            'footer_en_enabled'=>($request->footer_en_enabled=='true')?1:0
         ]);

        return redirect()->back()->with('data',['alert'=>'تم التحديث بنجاح','alert-type'=>'success']);

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
