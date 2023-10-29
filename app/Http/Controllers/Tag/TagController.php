<?php

namespace App\Http\Controllers\Tag;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TagController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        return Inertia::render('Tag/index', [
            'tags' => Tag::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        return Inertia::render('Tag/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $request->validate([
            'name' => 'bail|required|max:64'
        ]);

        Tag::create([
            'name' => $request->name
        ]);

        return to_route('tag.index');
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
        return Inertia::render('Tag/Edit', [
            'data' => Tag::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id) {
        $request->validate([
            'name' => 'bail|required|max:64'
        ]);

        Tag::find($id)->update([
            'name' => $request->name
        ]);

        return to_route('tag.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) {
        Tag::find($id)->delete();
        return to_route('tag.index');
    }
}
