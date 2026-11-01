<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HeroSection;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomePageController extends Controller
{
    public function index( )
    {
        return view('admin.homepage.index');
    }

    public function Homepage1( )
    {
        return view('admin.homepage.home1.index');
    }

    public function Home1Heroedit()
    {
        // Ensure there is always an existing record to edit, or redirect with an error if not found.
        $heroSection = HeroSection::first();
        if (!$heroSection) {
            return redirect()->route('admin.homepages.index')->with('error', 'No hero section data found.');
        }

        return view('admin.homepage.home1.hero', compact('heroSection'));
    }

    public function Home1Heroupdate(Request $request)
    {
        $heroSection = HeroSection::first();
        if (!$heroSection) {
            return redirect()->route('admin.homepages.index')->with('error', 'No hero section data found.');
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
            'satisfied_customers' => 'required|string|max:10',
            'button_text' => 'required|string|max:255',
            'button_link' => 'required',
            'image' => 'sometimes|image',
        ]);

        $data = $request->only(['title', 'subtitle', 'satisfied_customers', 'button_text', 'button_link']);

        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($heroSection->image) {
                Storage::delete($heroSection->image);
            }

            // Store the new image and update the image path
            $path = $request->file('image')->store('public/hero_images');
            $data['image'] = $path;
        }

        $heroSection->update($data);

        return redirect()->back()->with('success', 'Hero section updated successfully.');
    }




    public function FeaturesIndex()
    {


        $settings = Setting::pluck('value', 'key')->toArray();
        $title = 'Home-1 Features Settings';
        return view('admin.homepage.home1.features', compact('settings', 'title'));
    }

    public function FeaturesUpdate(Request $request)
    {
        $request->validate([
            'home_1_feature_1_title' => 'required|string|max:255',
            'home_1_feature_1_description' => 'required|string|max:1000',
            'home_1_feature_1_icon' => 'required|string|max:255',
            'home_1_feature_2_title' => 'required|string|max:255',
            'home_1_feature_2_description' => 'required|string|max:1000',
            'home_1_feature_2_icon' => 'required|string|max:255',
            'home_1_feature_3_title' => 'required|string|max:255',
            'home_1_feature_3_description' => 'required|string|max:1000',
            'home_1_feature_3_icon' => 'required|string|max:255',
        ]);

        $data = $request->only([
            'home_1_feature_1_title', 'home_1_feature_1_description', 'home_1_feature_1_icon',
            'home_1_feature_2_title', 'home_1_feature_2_description', 'home_1_feature_2_icon',
            'home_1_feature_3_title', 'home_1_feature_3_description', 'home_1_feature_3_icon'
        ]);
        foreach ($data as $key => $value) {
            Setting::updateOrCreate(['key' => $key], ['value' => $value]);
        }

        return redirect()->route('admin.homepages.home1.features')->with('success', 'Home-1 features updated successfully.');
    }


    public function aboutIndex()
{
    $settings = Setting::pluck('value', 'key')->toArray();
    $title = 'Home-1 About Us Settings';
    return view('admin.homepage.home1.about', compact('settings', 'title'));
}

public function aboutUpdate(Request $request)
{
    $request->validate([
        'home_1_about_title' => 'required|string|max:255',
        'home_1_about_description' => 'required|string',
        'home_1_about_subtitle' => 'required|string|max:255',
        'home_1_about_list_1' => 'required|string|max:255',
        'home_1_about_list_2' => 'required|string|max:255',
        'home_1_about_button' => 'required|string|max:255',
        'home_1_about_discount' => 'nullable|string|max:255',
        'home_1_about_big_image' => 'sometimes|image|max:2048', // Change to sometimes to allow non-required update
        'home_1_about_small_image' => 'sometimes|image|max:2048' // Same here
    ]);

    // Text and non-file fields update
    $fields = [
        'home_1_about_title', 'home_1_about_description', 'home_1_about_subtitle',
        'home_1_about_list_1', 'home_1_about_list_2', 'home_1_about_button', 'home_1_about_discount'
    ];

    foreach ($fields as $field) {
        if ($request->has($field)) {
            Setting::updateOrCreate(['key' => $field], ['value' => $request->input($field)]);
        }
    }

    // Handle image files separately
    $imageFields = ['home_1_about_big_image', 'home_1_about_small_image'];
    foreach ($imageFields as $imageField) {
        if ($request->hasFile($imageField)) {
            $path = $request->file($imageField)->store('about_images', 'public');
            Setting::updateOrCreate(['key' => $imageField], ['value' => $path]);
        }
    }

    return redirect()->route('admin.homepages.home1.about')->with('success', 'Home-1 About Us settings updated successfully.');
}




public function whyUsIndex()
{
    $settings = Setting::pluck('value', 'key')->toArray();
    $title = 'Home-1 Why Us Settings';
    return view('admin.homepage.home1.why_us', compact('settings', 'title'));
}

public function whyUsUpdate(Request $request)
{
    $request->validate([
        'home_1_why_us_title' => 'required|string|max:255',
        'home_1_why_us_description' => 'required|string',
        'home_1_why_us_image' => 'sometimes|image|max:2048',
        'home_1_why_us_list_1_title' => 'required|string|max:255',
        'home_1_why_us_list_1_description' => 'required|string|max:1000',
        'home_1_why_us_list_1_icon' => 'required|string|max:255',
        'home_1_why_us_list_2_title' => 'required|string|max:255',
        'home_1_why_us_list_2_description' => 'required|string|max:1000',
        'home_1_why_us_list_2_icon' => 'required|string|max:255',
        'home_1_why_us_list_3_title' => 'required|string|max:255',
        'home_1_why_us_list_3_description' => 'required|string|max:1000',
        'home_1_why_us_list_3_icon' => 'required|string|max:255',
    ]);

    $data = $request->except(['_token', '_method', 'home_1_why_us_image']);

    if ($request->hasFile('home_1_why_us_image')) {
        $image_path = $request->file('home_1_why_us_image')->store('why_us_images', 'public');
        $data['home_1_why_us_image'] = $image_path;
    }

    foreach ($data as $key => $value) {
        Setting::updateOrCreate(['key' => $key], ['value' => $value]);
    }

    return redirect()->route('admin.homepages.home1.why_us')->with('success', 'Why Us settings updated successfully.');
}

}