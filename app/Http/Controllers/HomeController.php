<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function check()
    {
        $ip = getenv('HTTP_CLIENT_IP') ?: getenv('HTTP_X_FORWARDED_FOR') ?: getenv('HTTP_X_FORWARDED') ?: getenv('HTTP_FORWARDED_FOR') ?: getenv('HTTP_FORWARDED') ?: getenv('REMOTE_ADDR');
        $details = json_decode(file_get_contents("http://ipinfo.io/$ip/json"));


        $blockedCountries = Country::where("status", "blocked")->get();
        $setting = Setting::first();

        if(!empty($blockedCountries)){
            foreach($blockedCountries as $blockCountry){
                if (in_array($details->country, [$blockCountry->country_code]))
                {
                    echo $blockCountry->country_name. " Blocked"; exit;
                }
            }
        }

        $proxyResponse = Http::get("https://ipqualityscore.com/api/json/ip/VoDWVvnwtJmSBUnekP0ZfKW6IhUMW1P3/".$details->ip."?strictness=2&fast=1");

        if(json_decode($proxyResponse)->proxy == false){
            return view($setting->advertisement_url);
        }

        return redirect($setting->website_url);
    }
}
