<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\SEOSetting;
use App\Models\Setting;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class PageController extends Controller
{
    // Display a listing of the pages
    public function index()
    {
        $pages = Page::paginate(10); // Adjust the number per page as needed
        return view('admin.pages.index', compact('pages'));
    }
    public function edit($id)
{
    $page = Page::findOrFail($id);
        return response()->json($page);
    }

    // Store a newly created page in storage
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'title' => 'nullable|string|max:255',
            'content' => 'nullable'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $page = new Page($validator->validated());
        $page->slug = Str::slug($request->name);
        $page->save();

        return redirect()->route('admin.pages.index')->with('success', 'Page created successfully.');
    }

    // Update the specified page in storage
    public function update(Request $request, $id)
    {
        try {
            $page = Page::findOrFail($id);

            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'title' => 'nullable|string|max:255',
                'content' => 'nullable'
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $page->fill($validator->validated());
            $page->slug = Str::slug($request->name);
            $page->save();

            return redirect()->route('admin.pages.index')->with('success', 'Page updated successfully.');
        } catch (ModelNotFoundException $e) {
            return redirect()->route('admin.pages.index')->with('error', 'Page not found.');
        }
    }



    public function destroy($id)
{
    try {
        $page = Page::findOrFail($id);
        $page->delete();
        Log::info('Page deleted successfully.');
        return redirect()->route('admin.pages.index')->with('success', 'Page deleted successfully.');
    } catch (ModelNotFoundException $e) {
        Log::error('Page not found: ' + $e->getMessage());
        return redirect()->route('admin.pages.index')->with('error', 'Page not found.');
    }
}



    public function show($slug)
    {
        $page = Page::where('slug', $slug)->firstOrFail();

                   // Fetch SEO settings from the database (optional: if there are predefined SEO settings for tours)
    $seoSettings = SEOSetting::where('page_name', 'page_show')->first();
    $settings = Setting::pluck('value', 'key')->toArray();
    // Generate SEO data using the tour details
    $title = $settings['site_name'] . " - " . $page->name;

    $descriptionSeo = $seoSettings->meta_description ?? strip_tags(substr($page->title, 0, 150));
    $keywords = $seoSettings->meta_keywords ?? implode(', ', ['tours', 'travel', $page->name, $page->title ?? '']);
    $ogTitle = $title;
    $ogDescription = $descriptionSeo;
    $ogImage = '';
    $canonicalUrl = url()->current();


        return view('front.pages.show', compact('page', 'title', 'descriptionSeo', 'keywords', 'ogTitle', 'ogDescription', 'ogImage', 'canonicalUrl'));
    }
}