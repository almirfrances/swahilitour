<?php

namespace App\Http\Controllers\Admin;

use App\Models\TourGuide;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class TourGuideController extends Controller
{
    public function index()
    {
        $tourGuides = TourGuide::paginate(10);
        return view('admin.tourGuides.index', compact('tourGuides'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'picture' => 'required|image', // 1MB Max
            'instagram_link' => 'nullable|url',

           'facebook_link' => 'nullable|url',
            'twitter_link' => 'nullable|url',
        ]);

        if ($request->hasFile('picture')) {
            $path = $request->file('picture')->store('tour_guides', 'public');
        }

        $tourGuide = new TourGuide($request->only('name', 'title', 'instagram_link', 'facebook_link', 'twitter_link'));
        $tourGuide->picture = $path;
        $tourGuide->save();

        return redirect()->route('admin.tourGuides.index')->with('success', 'Tour Guide added successfully.');
    }

    public function update(Request $request, TourGuide $tourGuide)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'picture' => 'sometimes|image',
            'instagram_link' => 'nullable|url',
            'facebook_link' => 'nullable|url',
            'twitter_link' => 'nullable|url',
        ]);

        $data = $request->only('name', 'title', 'instagram_link', 'facebook_link', 'twitter_link');

        if ($request->hasFile('picture')) {
            // Delete old image
            Storage::delete('public/'.$tourGuide->picture);

            // Store new image
            $data['picture'] = $request->file('picture')->store('tour_guides', 'public');
        }

        $tourGuide->update($data);

        return redirect()->route('admin.tourGuides.index')->with('success', 'Tour Guide updated successfully.');
    }


    public function destroy(TourGuide $tourGuide)
    {
        $tourGuide->delete();
        return redirect()->route('admin.tourGuides.index')->with('success', 'Tour Guide deleted successfully.');
    }
}