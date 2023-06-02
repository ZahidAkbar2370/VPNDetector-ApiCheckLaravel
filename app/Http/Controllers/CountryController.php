<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CountryController extends Controller
{
    public function index()
    {
        $countries = Country::all();

        return view("Admin.Country.view_countries", compact('countries'));
    }

    public function create()
    {
        return view("Admin.Country.create_country");
    }

    public function store(Request $request)
    {
        $request->validate([
            "country_name" => "unique:countries",
            "country_code" => "unique:countries",
        ]);

        Country::create([
            "country_name" => $request->country_name,
            "country_code" => $request->country_code,
        ]);

        Session::flash("message", "Country Added Sucessfully!");
        return redirect("admin/countries");
    }

    public function approve($id)
    {
        $country = Country::find($id);
        $country->status = "approved";
        $country->update();

        Session::flash("message", "Country Status Updated!");
        return redirect()->back();
    }

    public function blocked($id)
    {
        $country = Country::find($id);
        $country->status = "blocked";
        $country->update();

        Session::flash("message", "Country Blocked Updated!");
        return redirect()->back();
    }

    public function destroy($id)
    {
        $country = Country::find($id)->delete();

        Session::flash("message", "Country Deleted Updated!");
        return redirect()->back();
    }
}
