<?php

namespace App\Http\Controllers;

use Session;
use App\Setting;
use Illuminate\Http\Request;

class SettingsController extends Controller
{

    public function __construct() 
    {
        $this->middleware('admin');
    }

    public function index()
    {
        return view('admin.settings.settings')->with('settings', Setting::first());
    }

    public function update()
    {
        $this->validate(request(), [
            'site_name' => 'required',
            'contact_number' => 'required',
            'contact_email' => 'required',
            'address' => 'required',
            'site_info'=> 'required',
            'footer_text1'=>'required',
            'footer_text2'=>'required',
            'footer_text3'=>'required'
        ]);

        $settings = Setting::first();

        $settings->site_name = request()->site_name;
        $settings->address = request()->address;
        $settings->contact_email = request()->contact_email;
        $settings->contact_number = request()->contact_number;
        $settings->site_info = request()->site_info;
        $settings->footer_text1 = request()->footer_text1;
        $settings->footer_text2 = request()->footer_text2;
        $settings->footer_text3 = request()->footer_text3;

        $settings->save();

        Session::flash('success','Settings updated.');

        return redirect()->back();
    }
}
