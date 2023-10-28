<?php

namespace App\Http\Controllers\Items;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class ItemsController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        return Inertia::render("Items/index", [
            'data' => Item::with(["user", "tag"])->paginate(15)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        $tags = Tag::all();
        return Inertia::render("Items/Create", [
            'tags' => $tags
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $request->validate([
            'name' => 'bail|required|max:64',
            'stock' => 'bail|required|min:0',
            'tag' => 'bail|required'
        ]);

        Item::create([
            'name' => $request->name,
            'stock' => $request->stock,
            'tag_id' => $request->tag,
            'user_id' => 1
        ]);

        return to_route('item.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id) {
        $tags = Tag::all();
        $itemData = Item::find($id);

        return Inertia::render('Items/Edit', [
            'data' => $itemData,
            'tags' => $tags
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id) {
        $request->validate([
            'name' => 'bail|required',
            'stock' => 'bail|required|min:0'
        ]);

        Item::find($id)->update([
            'name' => $request->name,
            'stock' => $request->stock
        ]);

        return to_route('item.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) {
        Item::find($id)->delete();
        return to_route('item.index');
    }
}
