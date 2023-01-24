<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function edit()
    {
        $setting = Setting::query()->first();

        return view('dashboard.settings.edit', compact('setting'));
    }

    public function update(Request $request)
    {
        $setting = Setting::query()->first();

        $request->validate([
            'website_logo' => 'nullable|mimes:jpg,png,jpeg',

            'address' => 'required',
            'address_icon' => 'nullable|mimes:jpg,png,jpeg',

            'contact_phone' => 'required|numeric',
            'contact_email' => 'required|email',
            'contact_icon' => 'nullable|mimes:jpg,png,jpeg',

            'service_title' => 'required',
            'service_description' => 'required|max:250',

            'work_from' => 'required',
            'work_to' => 'required',
            'work_icon' => 'nullable|mimes:jpg,png,jpeg',

            'blog_title' => 'required',
            'blog_description' => 'required|max:250',

            'contact_us_title' => 'required',
            'contact_us_subtitle' => 'required',
            'contact_us_description' => 'required|max:250',

            'footer_title' =>'required'
        ]);

        $data = $request->all();

        $website_logo = null;
        if( !empty($data['website_logo']) ) {
            if( $request->hasFile('website_logo') ) {
                $file = $request->file('website_logo'); // Give Me The File

                $website_logo = $file->store('/uploads', [
                    'disk' => 'public', // You Can Check It In config/filesystem.php
                ]);

                $data['website_logo'] = $website_logo;
            }
        }else{
            $data = $request->except('website_logo');
        }

        $address_icon = null;
        if( !empty($data['address_icon']) ) {
            if( $request->hasFile('address_icon') ) {
                $file = $request->file('address_icon'); // Give Me The File

                $address_icon = $file->store('/uploads', [
                    'disk' => 'public', // You Can Check It In config/filesystem.php
                ]);

                $data['address_icon'] = $address_icon;
            }
        }else{
            $data = $request->except('address_icon');
        }

        $contact_icon = null;
        if( !empty($data['contact_icon']) ) {
            if( $request->hasFile('contact_icon') ) {
                $file = $request->file('contact_icon'); // Give Me The File

                $contact_icon = $file->store('/uploads', [
                    'disk' => 'public', // You Can Check It In config/filesystem.php
                ]);

                $data['contact_icon'] = $contact_icon;
            }
        }else{
            $data = $request->except('contact_icon');
        }

        $work_icon = null;
        if( !empty($data['work_icon']) ) {
            if( $request->hasFile('work_icon') ) {
                $file = $request->file('work_icon'); // Give Me The File

                $work_icon = $file->store('/uploads', [
                    'disk' => 'public', // You Can Check It In config/filesystem.php
                ]);

                $data['work_icon'] = $work_icon;
            }
        }else{
            $data = $request->except('work_icon');
        }

        $setting->update($data);

        toastr()->success('Settings Updated');

        return redirect()->back();

    }
}
