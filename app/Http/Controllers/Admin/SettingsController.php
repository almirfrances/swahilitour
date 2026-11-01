<?php

namespace App\Http\Controllers\Admin;

use \Exception;
use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Mail;
use Log;

class SettingsController extends Controller
{
    public function index()
    {
        return view('admin.settings.index');
    }

    public function general()
    {
        $settings = Setting::pluck('value', 'key')->toArray();
        return view('admin.settings.general', compact('settings'));
    }

    public function updateGeneral(Request $request)
    {
        $request->validate([
            'site_name' => 'required|string|max:255',
            'site_email' => 'required|email|max:255',
            'site_phone' => 'required|string|max:20',
            'address' => 'nullable|string|max:255',
            'facebook_url' => 'nullable|url',
            'instagram_url' => 'nullable|url',
            'telegram_url' => 'nullable|url',
            'twitter_url' => 'nullable|url',
            'primary_color' => 'nullable|string|max:7',
            'footer_copyright' => 'nullable|string|max:255',
            'site_description' => 'nullable|string',
            'youtube_url' => 'nullable|url',
            'almir_base' => 'nullable|string|max:7',  // Validate the base color
            'almir_primary' => 'nullable|string|max:7',  // Validate the primary color
            'almir_secondary' => 'nullable|string|max:7',  // Validate the secondary color
            'almir_footer' => 'nullable|string|max:7',  // Validate the footer color
            'almir_copyright_footer' => 'nullable|string|max:7',  // Validate the footer copyright color
            'soon_title' => 'required|string|max:255',
            'soon_heading' => 'required',
            'lipa_number' => 'required',
            'lipa_name' => 'required',
            'bank_name' => 'required',
            'swift_code' => 'required',
            'bank_account_number' =>'required',
            'bank_account_name' => 'required',
            'bank_branch' => 'required',
            'lipa_number_company' => 'required',
            'booking_note' => 'required',
        ]);

        $data = $request->only([
            'site_name', 'booking_note', 'site_email', 'site_phone', 'address', 'facebook_url', 'soon_title', 'soon_heading', 'lipa_number', 'lipa_name', 'bank_branch',
            'instagram_url', 'telegram_url', 'twitter_url', 'primary_color', 'footer_copyright', 'bank_name', 'swift_code', 'bank_account_number', 'bank_account_name',
            'site_description', 'youtube_url', 'almir_base', 'almir_primary', 'almir_secondary', 'almir_footer', 'almir_copyright_footer', 'lipa_number_company'
        ]);

        foreach ($data as $key => $value) {
            Setting::updateOrCreate(['key' => $key], ['value' => $value]);
        }

        // Optionally cache important color settings for quick access
        Cache::forever('primary_color', $request->input('primary_color'));
        Cache::forever('almir_base', $request->input('almir_base'));
        Cache::forever('almir_primary', $request->input('almir_primary'));
        Cache::forever('almir_secondary', $request->input('almir_secondary'));
        Cache::forever('almir_footer', $request->input('almir_footer'));
        Cache::forever('almir_copyright_footer', $request->input('almir_copyright_footer'));

        sweetalert()->success('General settings updated successfully.');
        return redirect()->route('admin.settings.general');
    }

    public function logo()
    {
        $title = 'Logo and Favicon Settings';
        return view('admin.settings.logo', compact('title'));
    }

    public function updateLogo(Request $request)
    {
        $request->validate([
            'logo_light' => 'nullable|image|mimes:jpeg,png,jpg',
            'logo_dark' => 'nullable|image|mimes:jpeg,png,jpg',
            'favicon' => 'nullable|image|mimes:jpeg,png,jpg',
        ]);

        $images = ['logo_light', 'logo_dark', 'favicon'];
        foreach ($images as $image) {
            if ($request->hasFile($image)) {
                $path = $request->file($image)->store('settings', 'public');
                Setting::updateOrCreate(['key' => $image], ['value' => $path]);
                Log::info("Uploaded $image to $path");
            }
        }

        sweetalert()->success('Logo and Favicon settings updated successfully.');
        return redirect()->route('admin.settings.logo');
    }




    public function showCustomCode()
{
    $settings = Setting::pluck('value', 'key')->toArray();
    $title = 'Custom Code Settings';
    return view('admin.settings.custom_code', compact('settings', 'title'));
}

public function updateCustomCode(Request $request)
{
    $request->validate([
        'header_code' => 'nullable|string',
        'footer_code' => 'nullable|string',
    ]);

    // Process and save the header_code and footer_code
    $codes = ['header_code', 'footer_code'];
    foreach ($codes as $code) {
        Setting::updateOrCreate(['key' => $code], ['value' => $request->input($code)]);
    }

    sweetalert()->success('Custom Code settings updated successfully.');
    return redirect()->route('admin.settings.custom_code');
}


    public function email()
    {
        $settings = Setting::pluck('value', 'key')->toArray();
        $title = 'Email Settings';
        return view('admin.settings.email', compact('settings', 'title'));
    }

    public function updateEmail(Request $request)
    {
        $request->validate([
            'email_method' => 'required|string|in:phpmailer,smtp',
            'smtp_host' => 'nullable|required_if:email_method,smtp|string|max:255',
            'smtp_port' => 'nullable|required_if:email_method,smtp|integer',
            'smtp_username' => 'nullable|required_if:email_method,smtp|string|max:255',
            'smtp_password' => 'nullable|required_if:email_method,smtp|string|max:255',
            'smtp_encryption' => 'nullable|required_if:email_method,smtp|string|in:none,ssl,tls',
            'smtp_from_email' => 'required|email|max:255',
            'smtp_from_name' => 'required|string|max:255',
        ]);

        $data = $request->only([
            'email_method', 'smtp_host', 'smtp_port', 'smtp_username', 'smtp_password', 'smtp_encryption', 'smtp_from_email', 'smtp_from_name'
        ]);

        foreach ($data as $key => $value) {
            Setting::updateOrCreate(['key' => $key], ['value' => $value]);
        }

        sweetalert()->success('Email settings updated successfully.');
        return redirect()->route('admin.settings.email');
    }

        public function testEmail(Request $request)
    {
        $request->validate([
            'test_email' => 'required|email',
        ]);

        $email = $request->input('test_email');

        try {
            Mail::raw('This is a test email to verify your email settings.', function ($message) use ($email) {
                $message->to($email)
                        ->subject('Test Email');
            });



            sweetalert()->success('Test email sent successfully to ' . $email);
        } catch (Exception $e) {
            sweetalert()->error('Failed to send test email. Please check your email settings and try again.');
        }

        return back();
    }

    public function configurations()
    {
        $settings = Setting::pluck('value', 'key')->toArray();

        // Ensure default values for homepage_style if not present
        if (!array_key_exists('homepage_style', $settings)) {
            $settings['homepage_style'] = 'static'; // Default to static if not set
        }
        if (!array_key_exists('static_homepage', $settings)) {
            $settings['static_homepage'] = 'home1'; // Default to home1 if not set
        }
        if (!array_key_exists('change_interval', $settings)) {
            $settings['change_interval'] = '1_hour'; // Default to 1 hour if not set
        }

        return view('admin.settings.configuration', compact('settings'));
    }

    public function updateStyle(Request $request)
    {
        $data = $request->validate([
            'homepage_style' => 'required|string',
            'static_homepage' => 'nullable|string',
            'change_interval' => 'nullable|string'
        ]);

        Setting::updateOrCreate(['key' => 'homepage_style'], ['value' => $data['homepage_style']]);

        if ($data['homepage_style'] === 'static') {
            Setting::updateOrCreate(['key' => 'static_homepage'], ['value' => $data['static_homepage']]);
        } elseif ($data['homepage_style'] === 'timed') {
            Setting::updateOrCreate(['key' => 'change_interval'], ['value' => $data['change_interval']]);
        } else {
            Setting::where('key', 'static_homepage')->delete();
            Setting::where('key', 'change_interval')->delete();
        }
        sweetalert()->success('Homepage settings updated successfully.');

        return redirect()->route('admin.settings.configurations');
    }


    public function emailConfirm(Request $request)
    {
        $request->validate([
            'email_confirmation' => 'required|boolean',
        ]);

        Setting::updateOrCreate(['key' => 'email_confirmation'], ['value' => $request->email_confirmation]);

        sweetalert()->success('Email confirmation settings updated successfully.');
        return redirect()->route('admin.settings.configurations');
    }


    public function forceHttps(Request $request)
    {
        $request->validate([

           'force_https' => 'required|boolean',
        ]);

        Setting::updateOrCreate(['key' => 'force_https'], ['value' => $request->force_https]);

        sweetalert()->success('HTTPS enforcement settings updated successfully.');
        return redirect()->route('admin.settings.configurations');
    }

    public function updateMaintenanceMode(Request $request)
    {
        $request->validate([
            'maintenance_mode' => 'nullable|boolean',
            'maintenance_access_code' => 'nullable|string',
            'maintenance_view_style' => 'required|in:1,2,3' // Ensure the input is one of the three valid options
        ]);

        $maintenanceMode = $request->has('maintenance_mode');
        Setting::updateOrCreate(['key' => 'maintenance_mode'], ['value' => $maintenanceMode ? 'true' : 'false']);
        Setting::updateOrCreate(['key' => 'maintenance_access_code'], ['value' => $request->maintenance_access_code]);
        Setting::updateOrCreate(['key' => 'maintenance_view_style'], ['value' => $request->maintenance_view_style]);

        sweetalert()->success('Maintenance settings updated successfully.');
        return redirect()->back();
    }




    public function AboutIndex()
    {
        $settings = Setting::pluck('value', 'key')->toArray();
        return view('admin.about-us.index', compact('settings'));
    }

    public function AboutUpdate(Request $request)
    {
        $request->validate([
            'about_title' => 'required|string|max:255',
            'about_description' => 'required|string|max:1000',
            'about_big_image' => 'nullable|image|max:2048',
            'about_small_image' => 'nullable|image|max:2048',
            'about_list_1_icon' => 'nullable|string|max:255',
            'about_list_2_icon' => 'nullable|string|max:255',
            'about_list_1_title' => 'required|string|max:255',
            'about_list_2_title' => 'required|string|max:255',
            'about_experience_percentages' => 'nullable|string',
            'about_why_us_title' => 'required|string|max:255',
            'about_why_us_description' => 'required|string|max:1000',
            'about_why_us_list_1_icon' => 'nullable|string|max:255',
            'about_why_us_list_1_title' => 'required|string|max:255',
            'about_why_us_list_2_title' => 'required|string|max:255',
            'about_why_us_list_2_icon' => 'nullable|string|max:255',
            'about_why_image_1' => 'nullable|image|max:2048',
            'about_why_image_2' => 'nullable|image|max:2048',
            'about_why_image_3' => 'nullable|image|max:2048',
            'about_why_image_4' => 'nullable|image|max:2048',
        ]);

        $fields = $request->except(['_token']);

        foreach ($fields as $key => $value) {
            if ($request->hasFile($key)) {
                $value = $request->file($key)->store('about_images', 'public');
            }
            Setting::updateOrCreate(['key' => $key], ['value' => $value]);
        }

        return redirect()->route('admin.settings.about-us.index')->with('success', 'About Us settings updated successfully.');
    }


}