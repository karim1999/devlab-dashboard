<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingsController extends Controller
{
    //
    public function terms(){
        $setting = \App\Setting::firstOrCreate(
            ['id' => 1],
            ['terms' => "", 'privacy' => "", 'terms_en' => "", 'privacy_en' => ""]
        );
        return view('common', ["data"=> $setting->terms, "title" => "الشروط والاحكام"]);
    }
    public function policy(){
        $setting = \App\Setting::firstOrCreate(
            ['id' => 1],
            ['terms' => "", 'privacy' => "", 'terms_en' => "", 'privacy_en' => ""]
        );
        return view('common', ["data"=> $setting->privacy, "title" => "سياسة الخصوصية"]);
    }
}
