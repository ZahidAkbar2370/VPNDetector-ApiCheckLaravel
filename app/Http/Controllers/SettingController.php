<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SettingController extends Controller
{
    public function setting()
    {
        $setting = Setting::first();

        return view("Admin.Setting.setting", compact("setting"));
    }

    public function store(Request $request)
    {
        $setting = Setting::find(1);
        $setting->website_url = $request->website_url;
        $setting->advertisement_url = $request->advertisment_url;
        $setting->update();


        Session::flash("message", "Setting Updated Sucessfully!");
        return redirect()->back();
    }
}
