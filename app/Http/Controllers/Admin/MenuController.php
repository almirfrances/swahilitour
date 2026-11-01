<?php

namespace App\Http\Controllers\Admin;

use App\Models\Menu;
use App\Models\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MenuController extends Controller
{
    /**
     * Display a listing of the menus, and handle create and edit contexts.
     *
     * @param  int|null  $id  The ID of the menu to edit (null for index and create)
     * @return \Illuminate\Http\Response
     */
    public function index($id = null)
    {
        $menus = Menu::with('children')->whereNull('parent_id')->orderBy('order')->get();
        $pages = Page::all();
        $menu = $id ? Menu::findOrFail($id) : new Menu;

        return view('admin.menus.index', compact('menus', 'pages', 'menu'));
    }

    public function getMenuData($id)
{
    $menu = Menu::with('children')->findOrFail($id);

    return response()->json($menu);
}

    /**
     * Store or update a menu in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int|null  $id  The ID of the menu to update (null for store)
     * @return \Illuminate\Http\Response
     */
    public function save(Request $request, $id = null)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'link' => 'nullable|string',
            'type' => 'required|in:default,dropdown',
            'position' => 'required|in:navbar,footer,none',
            'page_id' => 'nullable|exists:pages,id',
            'parent_id' => 'nullable|exists:menus,id',
            'order' => 'required|integer',
            'children' => 'nullable|array',
            'children.*.title' => 'required_with:children|string|max:255',
            'children.*.link' => 'nullable|string',
            'category' => 'nullable|string',
        ]);

        $menu = $id ? Menu::findOrFail($id) : new Menu;
        $menu->fill($request->except(['children']));
        $menu->save();

        // Handle children
        if ($request->has('children')) {
            foreach ($request->children as $childData) {
                if (isset($childData['id']) && $childData['id']) {
                    $child = Menu::find($childData['id']);
                    if ($child) {
                        $child->update($childData);
                    }
                } else {
                    $newChild = new Menu($childData);
                    $newChild->parent_id = $menu->id;
                    $newChild->save();
                }
            }
        }

        return redirect()->route('admin.menus.index')->with('success', $id ? 'Menu item updated successfully.' : 'Menu item created successfully.');
    }

    /**
     * Remove the specified menu from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
{
    $menu = Menu::findOrFail($id);
    $menu->delete();

    return response()->json(['message' => 'Menu deleted successfully']);
}
}