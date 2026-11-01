<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Destination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DestinationController extends Controller
{
    public function index(Request $request)
    {
        $query = Destination::query();  // Assuming 'Destination' is your model name

        if ($request->has('search') && trim($request->search) !== '') {
            $search = $request->search;
            $query->where('name', 'like', "%{$search}%")  // Assuming you are searching by 'name'
                  ->orWhere('country', 'like', "%{$search}%");  // Add more fields as necessary
        }

        $destinations = $query->latest()->paginate(10);  // Use pagination if needed

        return view('admin.destinations.index', compact('destinations'));
    }

    public function create()
    {
        return view('admin.destinations.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'country' => 'required|string|max:255',
            'visa_requirements' => 'required|string|max:255',
            'language_spoken' => 'required|string|max:255',
            'area' => 'required|numeric',
            'images' => 'sometimes|array',
            'images.*' => 'image',
            'faq' => 'sometimes|array',
            'currency_used' => 'required|string|max:255',
        ]);

        $destination = new Destination($request->only([
            'name', 'description', 'country', 'visa_requirements',
            'language_spoken', 'area'
        ]));

        $destination->images = $this->handleImages($request);
        $destination->faq = json_encode($request->input('faq', []));
        $destination->save();

        return redirect()->route('admin.destinations.index')->with('success', 'Destination added successfully.');
    }

    public function edit(Destination $destination)
    {

        if ($destination->faq) {
            $destination->faq = json_decode($destination->faq, true);
        }
        return view('admin.destinations.form', compact('destination'));
    }

    public function update(Request $request, Destination $destination)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'country' => 'required|string|max:255',
            'visa_requirements' => 'required|string|max:255',
            'language_spoken' => 'required|string|max:255',
            'area' => 'required|numeric',
            'images' => 'sometimes|array',
            'images.*' => 'image',
            'faq' => 'sometimes|array',
            'currency_used' => 'required|string|max:255',
        ]);

        $destination->update($request->only([
            'name', 'description', 'country', 'visa_requirements',
            'language_spoken', 'area'
        ]));

        $destination->images = $this->handleImages($request, $destination);
        $destination->faq = json_encode($request->input('faq', []));
        $destination->save();

        return redirect()->route('admin.destinations.index')->with('success', 'Destination updated successfully.');
    }

    private function handleImages(Request $request, Destination $destination = null)
    {
        $images = $destination ? $destination->images : [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('public/destination_images');
                $images[] = $path;  // Store only the path
            }
        }
        return $images;  // Always return an array
    }


    public function destroy($id)
{
    $destination = Destination::findOrFail($id);
    $destination->delete();

    return response()->json(['message' => 'Destination deleted successfully']);
}

    public function uploadImage(Request $request)
    {
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('public/destination_images');
            return response()->json(['success' => true, 'url' => Storage::url($path), 'filename' => basename($path)]);
        }
        return response()->json(['success' => false]);
    }

    public function removeImage(Request $request, $index)
    {
        $destination = Destination::find($request->input('destination_id'));
        $images = $destination->images;
        if (isset($images[$index])) {
            Storage::delete($images[$index]);
            unset($images[$index]);
            $destination->images = array_values($images); // Reindex array
            $destination->save();
            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false]);
    }
}