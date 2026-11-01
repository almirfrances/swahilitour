<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Amenity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AmenityController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $amenities = Amenity::query();

        if (!empty($search)) {
            $amenities = $amenities->where('name', 'like', '%' . $search . '%');
        }

        $amenities = $amenities->latest()->paginate(10);

        return view('admin.amenities.index', compact('amenities', 'search'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255|unique:amenities,name',
            'icon' => 'nullable|string|max:255'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $amenity = new Amenity();
        $amenity->name = $request->name;
        $amenity->slug = Str::slug($request->name);
        $amenity->icon = $request->icon;
        $amenity->save();

        return redirect()->route('admin.amenities.index')->with('success', 'Amenity created successfully.');
    }

    public function update(Request $request, Amenity $amenity)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255|unique:amenities,name,' . $amenity->id,
            'icon' => 'nullable|string|max:255'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $amenity->name = $request->name;
        $amenity->slug = Str::slug($request->name);
        $amenity->icon = $request->icon;
        $amenity->save();

        return redirect()->route('admin.amenities.index')->with('success', 'Amenity updated successfully.');
    }

    public function destroy($id)
    {
        $amenity = Amenity::findOrFail($id);
        $amenity->delete();

        return response()->json(['message' => 'Amenity deleted successfully']);
    }
}