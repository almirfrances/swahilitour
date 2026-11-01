<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tour;
use App\Models\Type;
use App\Models\Amenity;
use App\Models\Pricing;
use App\Models\Destination;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class TourController extends Controller
{
    /**
     * Display a listing of the tours.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $tours = Tour::query();

        if (!empty($search)) {
            $tours = $tours->where('name', 'like', '%' . $search . '%');
        }

        $tours = $tours->latest()->paginate(10);

        return view('admin.tours.index', compact('tours', 'search'));
    }

    /**
     * Show the form for creating a new tour.
     */
    public function create()
    {
        $types = Type::all();
        $destinations = Destination::all();
        $amenities = Amenity::all();

        return view('admin.tours.create', compact('types', 'destinations', 'amenities'));
    }

    /**
     * Store a newly created tour in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255|unique:tours,name',
            'duration' => 'required|string|max:50',
            'min_age' => 'nullable|integer|min:0',
            'type_id' => 'required|exists:types,id',
            'destination_id' => 'required|exists:destinations,id',
            'overview' => 'required|string',
            'amenities' => 'nullable|array',
            'includes' => 'nullable|array',
            'excludes' => 'nullable|array',
            'tour_plan' => 'nullable|array',
            'images' => 'sometimes|array',
            'images.*' => 'image',
            'featured' =>'boolean',
            'video_link'=> 'nullable|url',
            'pricing' => 'required|array',
            'pricing.jan_resident_price' => 'required|numeric',
            'pricing.jan_foreign_price' => 'required|numeric',
            'pricing.jan_discount' => 'nullable|numeric',
            'pricing.feb_resident_price' => 'required|numeric',
            'pricing.feb_foreign_price' => 'required|numeric',
            'pricing.feb_discount' => 'nullable|numeric',
            'pricing.mar_resident_price' => 'required|numeric',
            'pricing.mar_foreign_price' => 'required|numeric',
            'pricing.mar_discount' => 'nullable|numeric',
            'pricing.apr_resident_price' => 'required|numeric',
            'pricing.apr_foreign_price' => 'required|numeric',
            'pricing.apr_discount' => 'nullable|numeric',
            'pricing.may_resident_price' => 'required|numeric',
            'pricing.may_foreign_price' => 'required|numeric',
            'pricing.may_discount' => 'nullable|numeric',
            'pricing.jun_resident_price' => 'required|numeric',
            'pricing.jun_foreign_price' => 'required|numeric',
            'pricing.jun_discount' => 'nullable|numeric',
            'pricing.jul_resident_price' => 'required|numeric',
            'pricing.jul_foreign_price' => 'required|numeric',
            'pricing.jul_discount' => 'nullable|numeric',
            'pricing.aug_resident_price' => 'required|numeric',
            'pricing.aug_foreign_price' => 'required|numeric',
            'pricing.aug_discount' => 'nullable|numeric',
            'pricing.sep_resident_price' => 'required|numeric',
            'pricing.sep_foreign_price' => 'required|numeric',
            'pricing.sep_discount' => 'nullable|numeric',
            'pricing.oct_resident_price' => 'required|numeric',
            'pricing.oct_foreign_price' => 'required|numeric',
            'pricing.oct_discount' => 'nullable|numeric',
            'pricing.nov_resident_price' => 'required|numeric',
            'pricing.nov_foreign_price' => 'required|numeric',
            'pricing.nov_discount' => 'nullable|numeric',
            'pricing.dec_resident_price' => 'required|numeric',
            'pricing.dec_foreign_price' => 'required|numeric',
            'pricing.dec_discount' => 'nullable|numeric',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $tour = new Tour();
        $tour->name = $request->name;
        $tour->duration = $request->duration;
        $tour->min_age = $request->min_age;
        $tour->type_id = $request->type_id;
        $tour->destination_id = $request->destination_id;
        $tour->overview = $request->overview;

        $tour->includes = $request->includes;
        $tour->excludes = $request->excludes;
        $tour->tour_plan = $request->tour_plan;
    $tour->images = $this->handleImages($request, $tour);
    $tour->featured = $request->featured;
        $tour->video_link = $request->video_link;
        $tour->slug = Str::slug($request->name);
        $tour->amenities = json_encode($request->amenities); // Store as JSON
        $tour->save();

        // Save pricing data
        $tour->pricing()->create([
            'package_type' => 'Tour',
            'package_id' => $tour->id,
            'jan_resident_price' => $request->pricing['jan_resident_price'],
            'jan_foreign_price' => $request->pricing['jan_foreign_price'],
            'jan_discount' => $request->pricing['jan_discount'],
            'feb_resident_price' => $request->pricing['feb_resident_price'],
            'feb_foreign_price' => $request->pricing['feb_foreign_price'],
            'feb_discount' => $request->pricing['feb_discount'],
            'mar_resident_price' => $request->pricing['mar_resident_price'],
            'mar_foreign_price' => $request->pricing['mar_foreign_price'],
            'mar_discount' => $request->pricing['mar_discount'],
            'apr_resident_price' => $request->pricing['apr_resident_price'],
            'apr_foreign_price' => $request->pricing['apr_foreign_price'],
            'apr_discount' => $request->pricing['apr_discount'],
            'may_resident_price' => $request->pricing['may_resident_price'],
            'may_foreign_price' => $request->pricing['may_foreign_price'],
            'may_discount' => $request->pricing['may_discount'],
            'jun_resident_price' => $request->pricing['jun_resident_price'],
            'jun_foreign_price' => $request->pricing['jun_foreign_price'],
            'jun_discount' => $request->pricing['jun_discount'],
            'jul_resident_price' => $request->pricing['jul_resident_price'],
            'jul_foreign_price' => $request->pricing['jul_foreign_price'],
            'jul_discount' => $request->pricing['jul_discount'],
            'aug_resident_price' => $request->pricing['aug_resident_price'],
            'aug_foreign_price' => $request->pricing['aug_foreign_price'],
            'aug_discount' => $request->pricing['aug_discount'],
            'sep_resident_price' => $request->pricing['sep_resident_price'],
            'sep_foreign_price' => $request->pricing['sep_foreign_price'],
            'sep_discount' => $request->pricing['sep_discount'],
            'oct_resident_price' => $request->pricing['oct_resident_price'],
            'oct_foreign_price' => $request->pricing['oct_foreign_price'],
            'oct_discount' => $request->pricing['oct_discount'],
            'nov_resident_price' => $request->pricing['nov_resident_price'],
            'nov_foreign_price' => $request->pricing['nov_foreign_price'],
            'nov_discount' => $request->pricing['nov_discount'],
            'dec_resident_price' => $request->pricing['dec_resident_price'],
            'dec_foreign_price' => $request->pricing['dec_foreign_price'],
            'dec_discount' => $request->pricing['dec_discount'],
        ]);

        // Attach selected amenities
    if ($request->has('amenities')) {
        $tour->amenities()->attach($request->input('amenities'));
    }

        return redirect()->route('admin.tours.index')->with('success', 'Tour created successfully.');
    }

    /**
     * Show the form for editing the specified tour.
     */
    public function edit(Tour $tour)
    {
        $types = Type::all();
        $destinations = Destination::all();
        $amenities = Amenity::all();

        if (is_string($tour->images)) {
            $tour->images = json_decode($tour->images, true); // Decode to an array if it's a JSON string
        }

        return view('admin.tours.edit', compact('tour', 'types', 'destinations', 'amenities'));
    }

    /**
     * Update the specified tour in storage.
     */
    public function update(Request $request, Tour $tour)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255|unique:tours,name,' . $tour->id,
            'duration' => 'required|string|max:50',
            'min_age' => 'nullable|integer|min:0',
            'type_id' => 'required|exists:types,id',
            'destination_id' => 'required|exists:destinations,id',
            'overview' => 'required|string',
            'amenities' => 'nullable|array',
            'includes' => 'nullable|array',
            'excludes' => 'nullable|array',
            'tour_plan' => 'nullable|array',
            'images' => 'sometimes|array',
            'images.*' => 'image',
            'featured' =>'boolean',
            'video_link'=> 'nullable|url',
            'pricing' => 'required|array',
            'pricing.jan_resident_price' => 'required|numeric',
            'pricing.jan_foreign_price' => 'required|numeric',
            'pricing.jan_discount' => 'nullable|numeric',
            'pricing.feb_resident_price' => 'required|numeric',
            'pricing.feb_foreign_price' => 'required|numeric',
            'pricing.feb_discount' => 'nullable|numeric',
            'pricing.mar_resident_price' => 'required|numeric',
            'pricing.mar_foreign_price' => 'required|numeric',
            'pricing.mar_discount' => 'nullable|numeric',
            'pricing.apr_resident_price' => 'required|numeric',
            'pricing.apr_foreign_price' => 'required|numeric',
            'pricing.apr_discount' => 'nullable|numeric',
            'pricing.may_resident_price' => 'required|numeric',
            'pricing.may_foreign_price' => 'required|numeric',
            'pricing.may_discount' => 'nullable|numeric',
            'pricing.jun_resident_price' => 'required|numeric',
            'pricing.jun_foreign_price' => 'required|numeric',
            'pricing.jun_discount' => 'nullable|numeric',
            'pricing.jul_resident_price' => 'required|numeric',
            'pricing.jul_foreign_price' => 'required|numeric',
            'pricing.jul_discount' => 'nullable|numeric',
            'pricing.aug_resident_price' => 'required|numeric',
            'pricing.aug_foreign_price' => 'required|numeric',
            'pricing.aug_discount' => 'nullable|numeric',
            'pricing.sep_resident_price' => 'required|numeric',
            'pricing.sep_foreign_price' => 'required|numeric',
            'pricing.sep_discount' => 'nullable|numeric',
            'pricing.dec_resident_price' => 'required|numeric',
            'pricing.dec_foreign_price' => 'required|numeric',
            'pricing.dec_discount' => 'nullable|numeric',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $tour->name = $request->name;
        $tour->duration = $request->duration;
        $tour->min_age = $request->min_age;
        $tour->type_id = $request->type_id;
        $tour->destination_id = $request->destination_id;
        $tour->overview = $request->overview;
        $tour->includes = $request->includes;
        $tour->excludes = $request->excludes;
        $tour->tour_plan = $request->tour_plan;
        $tour->featured = $request->featured;
        $tour->video_link = $request->video_link;
        $tour->slug = Str::slug($request->name);
        $tour->amenities = json_encode($request->amenities); // Store as JSON
                // Update basic fields
        $tour->fill($request->except(['images']));

        // Handle images
            $tour->images = $this->handleImages($request, $tour);

        $tour->save();

        // Update pricing data
        $pricing = $tour->pricing()->first();
        $pricing->update([
            'jan_resident_price' => $request->pricing['jan_resident_price'],
            'jan_foreign_price' => $request->pricing['jan_foreign_price'],
            'jan_discount' => $request->pricing['jan_discount'],
            'feb_resident_price' => $request->pricing['feb_resident_price'],
            'feb_foreign_price' => $request->pricing['feb_foreign_price'],
            'feb_discount' => $request->pricing['feb_discount'],
            'mar_resident_price' => $request->pricing['mar_resident_price'],
            'mar_foreign_price' => $request->pricing['mar_foreign_price'],
            'mar_discount' => $request->pricing['mar_discount'],
            'apr_resident_price' => $request->pricing['apr_resident_price'],
            'apr_foreign_price' => $request->pricing['apr_foreign_price'],
            'apr_discount' => $request->pricing['apr_discount'],
            'may_resident_price' => $request->pricing['may_resident_price'],
            'may_foreign_price' => $request->pricing['may_foreign_price'],
            'may_discount' => $request->pricing['may_discount'],
            'jun_resident_price' => $request->pricing['jun_resident_price'],
            'jun_foreign_price' => $request->pricing['jun_foreign_price'],
            'jun_discount' => $request->pricing['jun_discount'],
            'jul_resident_price' => $request->pricing['jul_resident_price'],
            'jul_foreign_price' => $request->pricing['jul_foreign_price'],
            'jul_discount' => $request->pricing['jul_discount'],
            'aug_resident_price' => $request->pricing['aug_resident_price'],
            'aug_foreign_price' => $request->pricing['aug_foreign_price'],
            'aug_discount' => $request->pricing['aug_discount'],
            'sep_resident_price' => $request->pricing['sep_resident_price'],
            'sep_foreign_price' => $request->pricing['sep_foreign_price'],
            'sep_discount' => $request->pricing['sep_discount'],
            'oct_resident_price' => $request->pricing['oct_resident_price'],
            'oct_foreign_price' => $request->pricing['oct_foreign_price'],
            'oct_discount' => $request->pricing['oct_discount'],
            'nov_resident_price' => $request->pricing['nov_resident_price'],
            'nov_foreign_price' => $request->pricing['nov_foreign_price'],
            'nov_discount' => $request->pricing['nov_discount'],
            'dec_resident_price' => $request->pricing['dec_resident_price'],
            'dec_foreign_price' => $request->pricing['dec_foreign_price'],
            'dec_discount' => $request->pricing['dec_discount'],
        ]);

        return redirect()->route('admin.tours.index')->with('success', 'Tour updated successfully.');
    }


    private function handleImages(Request $request, Tour $tour)
    {
        // Decode the JSON string into an array. If null, default to an empty array.
        $images = json_decode($tour->images, true) ?? [];

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('public/tour_images');
                $images[] = $path; // Add the new path to the array
            }
        }

        // Before saving back to the model, encode it to JSON if storing as JSON
        return json_encode($images);
    }




    public function uploadImage(Request $request)
    {
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('public/tour_images');
            return response()->json(['success' => true, 'url' => Storage::url($path), 'filename' => basename($path)]);
        }
        return response()->json(['success' => false]);
    }

    public function removeImage(Request $request, $index)
    {
        $tour = Tour::find($request->input('tour_id'));
        if (!$tour) {
            return response()->json(['success' => false, 'message' => 'Tour not found.']);
        }

        $images = is_array($tour->images) ? $tour->images : json_decode($tour->images, true);
        if (isset($images[$index])) {
            Storage::delete($images[$index]);
            unset($images[$index]); // Unset the image at the specific index
            $images = array_values($images); // Re-index the array
            $tour->images = json_encode($images); // Convert back to JSON string if needed
            $tour->save();
            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false, 'message' => 'Image not found.']);
    }



    public function destroy($id)
    {
        $tour = Tour::findOrFail($id);
        $tour->delete();

        return response()->json(['message' => 'Tour deleted successfully']);
    }
}