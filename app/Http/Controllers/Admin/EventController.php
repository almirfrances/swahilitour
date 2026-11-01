<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Amenity;
use App\Models\Destination;
use App\Models\Event;
use App\Models\Promo;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class EventController extends Controller
{
    /**
     * Display a listing of events.
     */
    public function index()
    {
        $events = Event::with(['type', 'destination'])->paginate(10);
        return view('admin.events.index', compact('events'));
    }

    /**
     * Show the form for creating a new event.
     */
    public function create()
    {
        $destinations = Destination::all();
        $types = Type::all();
        $amenities = Amenity::all();

        return view('admin.events.create', compact('destinations', 'types', 'amenities'));
    }

    /**
     * Store a newly created event in storage.
     */
    public function store(Request $request)
    {
        // Log the incoming request data
        Log::info('Storing new event', ['request_data' => $request->all()]);

        // Validate the input
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:events,name',
            'type_id' => 'required|exists:types,id',
            'destination_id' => 'required|exists:destinations,id',
            'images.*' => 'nullable|image|max:2048',
            'event_plan' => 'nullable|array',
            'event_plan.*.title' => 'required_with:event_plan|string|max:255',
            'event_plan.*.description' => 'required_with:event_plan|string|max:1000',
            'residential_price_single' => 'required|numeric|min:0',
            'foreign_price_single' => 'required|numeric|min:0',
            'couple_foreign_price' => 'required|numeric|min:0',
            'couple_residential_price' => 'required|numeric|min:0',
            'discount_percentage' => 'nullable|integer|min:0|max:100',
            'status' => 'required|in:active,inactive',
            'amenities' => 'nullable|array',
            'amenities.*' => 'exists:amenities,id',
            'overview' => 'nullable|string|max:2000',
            'duration' => 'nullable',
            'includes' => 'nullable|array',
            'includes.*' => 'nullable|string',
            'excludes' => 'nullable|array',
            'excludes.*' => 'nullable|string',

        ]);

        Log::info('Validation passed', ['validated_data' => $validated]);

        // Handle image uploads
        $imagePaths = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                try {
                    $path = $image->store('events', 'public');
                    $imagePaths[] = $path;
                    Log::info('Image uploaded successfully', ['path' => $path]);
                } catch (\Exception $e) {
                    Log::error('Error uploading image', ['error' => $e->getMessage()]);
                    return redirect()->back()->with('error', 'Failed to upload images. Please try again.');
                }
            }
        }

        // Prepare event plan
        $eventPlan = [];
        if (isset($validated['event_plan']) && is_array($validated['event_plan'])) {
            foreach ($validated['event_plan'] as $plan) {
                $eventPlan[] = [
                    'title' => $plan['title'],
                    'description' => $plan['description'],
                ];
            }
        }

        // Prepare amenities
        $amenities = $validated['amenities'] ?? [];

            // Create the event
            $event = Event::create([
                'name' => $validated['name'],
                'type_id' => $validated['type_id'],
                'destination_id' => $validated['destination_id'],
                'images' => $imagePaths, // Store as JSON array
                'event_plan' => $eventPlan, // Store as JSON array
                'slug' => Str::slug($validated['name']),
                'residential_price_single' => $validated['residential_price_single'],
                'foreign_price_single' => $validated['foreign_price_single'],
                'couple_foreign_price' => $validated['couple_foreign_price'],
                'couple_residential_price' => $validated['couple_residential_price'],
                'discount_percentage' => $validated['discount_percentage'] ?? 0,
                'status' => $validated['status'],
                'amenities' => $amenities, // Store as JSON array
                'overview' => $validated['overview'],
                'duration' => $validated['duration'],
                'includes' => json_encode($validated['includes'] ?? []),
                'excludes' => json_encode($validated['excludes'] ?? []),

            ]);

            Log::info('Event created successfully', ['event_id' => $event->id]);
            return redirect()->route('admin.events.index')->with('success', 'Event created successfully.');

            return redirect()->back()->with('error', 'Failed to create event. Please try again.');

    }


    /**
     * Show the form for editing the specified event.
     */
    public function edit(Event $event)
    {
        $destinations = Destination::all();
        $types = Type::all();
        $amenities = Amenity::all();

        return view('admin.events.edit', compact('event', 'destinations', 'types', 'amenities'));
    }

    /**
     * Update the specified event in storage.
     */
    public function update(Request $request, Event $event)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:events,name,' . $event->id,
            'type_id' => 'required|exists:types,id',
            'destination_id' => 'required|exists:destinations,id',
            'images.*' => 'nullable|image|max:2048',
            'event_plan' => 'nullable|array',
            'event_plan.*.title' => 'required_with:event_plan|string|max:255',
            'event_plan.*.description' => 'required_with:event_plan|string|max:1000',
            'residential_price_single' => 'required|numeric|min:0',
            'foreign_price_single' => 'required|numeric|min:0',
            'couple_foreign_price' => 'required|numeric|min:0',
            'couple_residential_price' => 'required|numeric|min:0',
            'discount_percentage' => 'nullable|integer|min:0|max:100',
            'status' => 'required|in:active,inactive',
            'amenities' => 'nullable|array',
            'amenities.*' => 'exists:amenities,id',
            'overview' => 'nullable|string|max:2000',
            'duration' => 'nullable',
            'includes' => 'nullable|array',
            'includes.*' => 'nullable|string',
            'excludes' => 'nullable|array',
            'excludes.*' => 'nullable|string',
        ]);


    $imagePaths = $event->images ?? [];

    // Handle image removals
    if ($request->filled('removed_images')) {
        $removedImages = json_decode($request->input('removed_images'), true);
        foreach ($removedImages as $removedImage) {
            if (($key = array_search($removedImage, $imagePaths)) !== false) {
                unset($imagePaths[$key]);
                Storage::disk('public')->delete($removedImage);
            }
        }
    }

    // Handle new images
    if ($request->hasFile('images')) {
        foreach ($request->file('images') as $image) {
            $imagePaths[] = $image->store('events', 'public');
        }
    }

        // Update the event
        $event->update([
            'name' => $validated['name'],
            'type_id' => $validated['type_id'],
            'destination_id' => $validated['destination_id'],
            'images' => array_values($imagePaths),
            'event_plan' => $validated['event_plan'] ?? [],
            'slug' => Str::slug($validated['name']),
            'residential_price_single' => $validated['residential_price_single'],
            'foreign_price_single' => $validated['foreign_price_single'],
            'couple_foreign_price' => $validated['couple_foreign_price'],
            'couple_residential_price' => $validated['couple_residential_price'],
            'discount_percentage' => $validated['discount_percentage'] ?? 0,
            'status' => $validated['status'],
            'amenities' => $validated['amenities'] ?? [],
            'overview' => $validated['overview'],
            'duration' => $validated['duration'],
            'includes' => json_encode($validated['includes']), // Convert array to JSON
            'excludes' => json_encode($validated['excludes']) // Convert array to JSON

        ]);

        return redirect()->route('admin.events.index')->with('success', 'Event updated successfully.');
    }

    /**
     * Remove the specified event from storage.

    */
    public function destroy(Event $event)
    {
        // Delete associated images
        if ($event->images) {
            foreach ($event->images as $image) {
                Storage::disk('public')->delete($image);
            }
        }

        $event->delete();
        return redirect()->route('admin.events.index')->with('success', 'Event deleted successfully.');
    }



        public function promoIndex(Request $request)
    {
        $promos = Promo::with('event')->paginate(10);
        $events = Event::where('status', 'active')->get(); // Fetch only active events
        return view('admin.events.promos.index', compact('promos', 'events'));
    }

    public function promoStore(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'sub_title' => 'nullable|string|max:255',
            'short_description' => 'required|string|max:1000',
            'promo_image' => 'required|image|max:2048',
            'event_id' => 'required|exists:events,id',
            'popup' => 'required|boolean',
            'status' => 'required|in:active,inactive',
        ]);

        $promoImagePath = $request->file('promo_image')->store('promos', 'public');

        Promo::create(array_merge($validated, ['promo_image' => $promoImagePath]));

        return redirect()->route('admin.promos.index')->with('success', 'Promo created successfully.');
    }

    public function promoUpdate(Request $request, Promo $promo)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'sub_title' => 'nullable|string|max:255',
            'short_description' => 'required|string|max:1000',
            'promo_image' => 'nullable|image|max:2048',
            'event_id' => 'required|exists:events,id',
            'popup' => 'required|boolean',
            'status' => 'required|in:active,inactive',
        ]);

        if ($request->hasFile('promo_image')) {
            $promoImagePath = $request->file('promo_image')->store('promos', 'public');
            $validated['promo_image'] = $promoImagePath;
        }

        $promo->update($validated);

        return redirect()->route('admin.promos.index')->with('success', 'Promo updated successfully.');
    }

    public function promoDestroy(Promo $promo)
    {
        $promo->delete();
        return redirect()->route('admin.promos.index')->with('success', 'Promo deleted successfully.');
    }



        /**
     * Remove the image from the specified promo.
     *
     * @param  int  $promoId
     * @return \Illuminate\Http\JsonResponse
     */
    public function removeImage($promoId)
    {
        $promo = Promo::find($promoId);

        if (!$promo) {
            return response()->json(['success' => false, 'message' => 'Promo not found.']);
        }

        try {
            // Check if an image exists
            if ($promo->image) {
                // Delete image from storage
                Storage::disk('public')->delete($promo->image);

                // Update the promo to remove the image path
                $promo->image = null;
                $promo->save();

                return response()->json(['success' => true, 'message' => 'Image removed successfully.']);
            }

            return response()->json(['success' => false, 'message' => 'No image to remove.']);
        } catch (\Exception $e) {
            Log::error('Failed to remove image', ['promoId' => $promoId, 'error' => $e->getMessage()]);
            return response()->json(['success' => false, 'message' => 'Failed to remove image.']);
        }
    }


}