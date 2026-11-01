<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class TypeController extends Controller
{
    public function index(Request $request)
{
    $search = $request->input('search');
    $types = Type::query();

    if (!empty($search)) {
        $types = $types->where('name', 'like', '%' . $search . '%');
    }

    $types = $types->latest()->paginate(10);

    return view('admin.types.index', compact('types', 'search'));
}

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255|unique:types,name',
            'icon' => 'nullable|string|max:255'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $type = new Type();
        $type->name = $request->name;
        $type->slug = Str::slug($request->name);
        $type->icon = $request->icon;
        $type->save();

        return redirect()->route('admin.types.index')->with('success', 'Type created successfully.');
    }

    public function update(Request $request, Type $type)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255|unique:types,name,' . $type->id,
            'icon' => 'nullable|string|max:255'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $type->name = $request->name;
        $type->slug = Str::slug($request->name);
        $type->icon = $request->icon;
        $type->save();

        return redirect()->route('admin.types.index')->with('success', 'Type updated successfully.');
    }


    public function destroy($id)
{
    $type = Type::findOrFail($id);
    $type->delete();

        return response()->json(['message' => 'Type deleted successfully']);
}
}