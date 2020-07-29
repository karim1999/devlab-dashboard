<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingsController extends Controller
{
    //
    public function terms(){
        $setting = \App\Setting::firstOrCreate(
            ['id' => 1],
            ['terms' => "", 'privacy' => ""]
        );
        return view('common', ["data"=> $setting->terms]);
    }
    public function policy(){
        $setting = \App\Setting::firstOrCreate(
            ['id' => 1],
            ['terms' => "", 'privacy' => ""]
        );
        return view('common', ["data"=> $setting->policy]);
    }
}
