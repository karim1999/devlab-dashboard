<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteTextController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($page_id)
    {
        $texts=\App\Page_text::where('page_id',$page_id)->get();
        $page=\App\Site_page::where('id',$page_id)->get()->first();
        return view('texts.texts',compact('texts','page'));
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
         $request->validate([
            'content_ar'=>'required|min:1|max:225|string',
            'content_en'=>'required|min:1|max:225|string'
        ]);

        $page=\App\Site_page::where('id',$request->page_id)->get()->first();
        $site=\App\Page_text::create(['user_id'=>\Auth::user()->id,'site_id'=>$page->site_id,'page_id'=>$page->id,'content_en'=>$request->content_en,'content_ar'=>$request->content_ar]); 
        return redirect()->back()->with('data',['alert'=>'تمت الاضافة بنجاح','alert-type'=>'success']);

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
        $text=\App\Page_text::where('id',$id)->get()->first();
        $page=$text->page;
         return view('texts.edit',compact('page','text'));
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
            'content_ar'=>'required|min:1|max:225|string',
            'content_en'=>'required|min:1|max:225|string',
            'note'=>'nullable|min:1|string',
            'enabled'=>'nullable|string',
        ]);

        
        $text=\App\Page_text::where('id',$id)->update(
            [
                'content_ar'=>$request->content_ar,
                'content_en'=>$request->content_en,
                'note'=>$request->note,
                'enabled'=>($request->enabled=='true')?1:0,
            ]); 

        return redirect()->route('texts.index',['page_id'=>$request->page_id])->with('data',['alert'=>'تمت التحديث بنجاح','alert-type'=>'success']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $site=\App\Page_text::where('id',$id)->delete();
       return redirect()->back()->with('data',['alert'=>'تم الحذف بنجاح','alert-type'=>'success']);
    }
}
