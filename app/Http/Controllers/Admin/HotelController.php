<?php

namespace App\Http\Controllers\Admin;

use App\Models\Hotel;
use App\Models\Destination;
use App\Models\Amenity;
use App\Models\Room;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class HotelController extends Controller
{
    /**
     * Display a listing of the hotels.
     */
    public function index()
    {
        $hotels = Hotel::with('destination')->paginate(10);
        return view('admin.hotels.index', compact('hotels'));
    }

    /**
     * Show the form for creating a new hotel.
     */
    public function create()
    {
        $destinations = Destination::all();
        $amenities = Amenity::all();
        return view('admin.hotels.create', compact('destinations', 'amenities'));
    }

    /**
     * Store a newly created hotel in storage.
     */
    public function store(Request $request)
    {
        // Validate input
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255|unique:hotels,name',
            'destination_id' => 'required|exists:destinations,id',
            'slug' => 'nullable|string|unique:hotels,slug',
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'overview' => 'nullable|string',
            'amenities' => 'nullable|array',
            'amenities.*' => 'exists:amenities,id',
            'status' => 'required|in:active,inactive,under_maintenance',
            'starting_price' => 'nullable|numeric|min:0',
            'featured' => 'boolean',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Handle image uploads
        $imagePaths = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('public/hotel_images');
                $imagePaths[] = Storage::url($path);
            }
        }

        // Create the hotel
        $hotel = new Hotel();
        $hotel->name = $request->name;
        $hotel->destination_id = $request->destination_id;
        $hotel->slug = $request->slug ?? Str::slug($request->name);
        $hotel->images = $imagePaths;
        $hotel->overview = $request->overview;
        $hotel->amenities = json_encode($request->amenities); //  Stored as JSON array
        $hotel->status = $request->status;
        $hotel->starting_price = $request->starting_price;
        $hotel->featured = $request->featured;
        $hotel->save();

        return redirect()->route('admin.hotels.index')->with('success', 'Hotel created successfully.');
    }

    /**
     * Show the form for editing the specified hotel.
     */
    public function edit(Hotel $hotel)
    {
        $destinations = Destination::all();
        $amenities = Amenity::all();
        return view('admin.hotels.edit', compact('hotel', 'destinations', 'amenities'));
    }

    /**
     * Update the specified hotel in storage.
     */
    public function update(Request $request, Hotel $hotel)
    {
        // Validate input
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255|unique:hotels,name,' . $hotel->id,
            'destination_id' => 'required|exists:destinations,id',
            'slug' => 'nullable|string|unique:hotels,slug,' . $hotel->id,
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'overview' => 'nullable|string',
            'amenities' => 'nullable|array',
            'amenities.*' => 'exists:amenities,id',
            'status' => 'required|in:active,inactive,under_maintenance',
            'starting_price' => 'nullable|numeric|min:0',
            'featured' => 'boolean',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Handle image uploads
        if ($request->hasFile('images')) {
            // Optionally, delete old images
            if (is_array($hotel->images)) {
                foreach ($hotel->images as $oldImage) {
                    $path = str_replace('/storage/', 'public/', $oldImage);
                    Storage::delete($path);
                }
            }

            $imagePaths = [];
            foreach ($request->file('images') as $image) {
                $path = $image->store('public/hotel_images');
                $imagePaths[] = Storage::url($path);
            }
            $hotel->images = $imagePaths;
        }

        // Update hotel details
        $hotel->name = $request->name;
        $hotel->destination_id = $request->destination_id;
        $hotel->slug = $request->slug ?? Str::slug($request->name);
        $hotel->overview = $request->overview;
        $hotel->amenities = json_encode($request->amenities); //  Stored as JSON array
        $hotel->status = $request->status;
        $hotel->starting_price = $request->starting_price;
        $hotel->featured = $request->featured;
        $hotel->save();

        return redirect()->route('admin.hotels.index')->with('success', 'Hotel updated successfully.');
    }

    /**
     * Remove the specified hotel from storage.
     */
    public function destroy(Hotel $hotel)
    {
        // Optionally, delete associated images
        if (is_array($hotel->images)) {
            foreach ($hotel->images as $image) {
                $path = str_replace('/storage/', 'public/', $image);
                Storage::delete($path);
            }
        }

        $hotel->delete();

        return redirect()->route('admin.hotels.index')->with('success', 'Hotel deleted successfully.');
    }

    /**
     * Add a room to the specified hotel.
     */
    public function addRoom(Request $request, Hotel $hotel)
    {
        // Validate input
        $validator = Validator::make($request->all(), [
            'room_name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'capacity' => 'required|integer|min:1',
            'room_type' => 'required|in:single,double,suite,family',
            'is_available' => 'required|boolean',
            'status' => 'required|in:available,booked,under_maintenance',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Create the room
        $hotel->rooms()->create([
            'room_name' => $request->room_name,
            'price' => $request->price,
            'capacity' => $request->capacity,
            'room_type' => $request->room_type,
            'is_available' => $request->is_available,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.hotels.edit', $hotel->id)->with('success', 'Room added successfully.');
    }

            public function updateRoom(Request $request, Hotel $hotel, Room $room)
    {
        // Validate input
        $validator = Validator::make($request->all(), [
            'room_name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'capacity' => 'required|integer|min:1',
            'room_type' => 'required|in:single,double,suite,family',
            'is_available' => 'required|boolean',
            'status' => 'required|in:available,booked,under_maintenance',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Update the room
        $room->update([
            'room_name' => $request->room_name,
            'price' => $request->price,
            'capacity' => $request->capacity,
            'room_type' => $request->room_type,
            'is_available' => $request->is_available,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.hotels.edit', $hotel->id)->with('success', 'Room updated successfully.');
    }


        public function destroyRoom(Hotel $hotel, Room $room)
    {
        // Optionally, handle deletion of any resources associated with the room, e.g., images
        $room->delete();

        return redirect()->route('admin.hotels.edit', $hotel->id)->with('success', 'Room deleted successfully.');
    }
}