<?php


// app/Http/Controllers/Admin/SEOSettingController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SEOSetting;
use Illuminate\Http\Request;

class SEOSettingController extends Controller
{
    public function index()
    {
        $seoSettings = SEOSetting::all()->keyBy('page_name')->toArray();
        return view('admin.seo.index', compact('seoSettings'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'homepage_meta_title' => 'required|string|max:255',
            'homepage_meta_description' => 'required|string|max:1000',
            'homepage_meta_keywords' => 'required|string|max:255',
            'homepage_seo_image' => 'nullable|image|max:2048',

            // Validate other pages similarly...
        ]);

        $pages = ['homepage', 'about_us', 'contact_us', 'destinations', 'tours', 'hotels', 'gallery', 'faqs', 'guides'];
        foreach ($pages as $page) {
            SEOSetting::updateOrCreate(
                ['page_name' => $page],
                [
                    'meta_title' => $request->input("{$page}_meta_title"),
                    'meta_description' => $request->input("{$page}_meta_description"),
                    'meta_keywords' => $request->input("{$page}_meta_keywords"),
                    'seo_image' => $request->hasFile("{$page}_seo_image")
                        ? $request->file("{$page}_seo_image")->store('seo_images', 'public')
                        : (SEOSetting::where('page_name', $page)->first()->seo_image ?? null)
                ]
            );
        }

        return redirect()->route('admin.seo.index')->with('success', 'SEO Settings updated successfully.');
    }
}