<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SitePageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function site_index(Request $request)
    {
        return view('pages.index');
    }


    public function index($site_id)
    {
        $pages=\App\Site_page::where('site_id',$site_id)->get();
        $site=\App\Site::where('id',$site_id)->get()->first();
        return view('pages.site',compact('pages','site'));
    }


    /*public function text($page_id)
    {
        $texts=\App\Page_text::where('page_id',$page_id)->get();
        return view('pages.texts',compact('texts'));
    }*/
    
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
        $page=\App\Site_page::where('id',$id)->get()->first();
        return view('pages.edit',compact('page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function create_site_page(Request $request,$id){

        $site=\App\Site::where('id',$id)->get()->first();
     
        return view('pages.create',compact('site'));


    }

    public function create_site_page_store(Request $request,$id){
        //return $request;
        $request->validate([
            'page_name','nullable|string|min:1',
            'status','nullable|string|min:1'
        ]);
         //return $id;
         $page=\App\Site_page::create(['user_id'=>\Auth::user()->id,'site_id'=>$id,'page_name'=>$request->page_name,'status'=>($request->status=='true')?1:0]);
         //return $page;
         return redirect()->route('pages.index',['site_id'=>$id])->with('data',['alert'=>'تم التحديث بنجاح','alert-type'=>'success']);


         
    }


    public function update(Request $request, $id)
    {


       // return 0;
         $request->validate([
            'page_name','nullable|string|min:1',
            'status','nullable|string|min:1'
        ]);
         //return $id;
         $page=\App\Site_page::where('id',$id)->update(['page_name'=>$request->page_name,'status'=>($request->status=='true')?1:0]);
         //return $page;
         return redirect()->route('pages.index',['site_id'=>$page])->with('data',['alert'=>'تم التحديث بنجاح','alert-type'=>'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $site=\App\Site_page::where('id',$id)->delete();
       return redirect()->back()->with('data',['alert'=>'تم الحذف بنجاح','alert-type'=>'success']);
    }
}
