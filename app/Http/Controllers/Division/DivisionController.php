<?php

namespace App\Http\Controllers\Division;

use App\Http\Controllers\Controller;
use App\Models\Division;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DivisionController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $allDivision = Division::all();
        return Inertia::render('Division/index', [
            'divisions' => $allDivision
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        return Inertia::render('Division/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $request->validate([
            'name' => 'bail|required|max:64'
        ]);

        Division::create([
            'name' => $request->name
        ]);

        return to_route('division.index');
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
        $division = Division::find($id);
        return Inertia::render('Division/Edit', [
            'data' => $division
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id) {
        $request->validate([
            'name' => 'bail|required|max:64'
        ]);

        Division::find($id)->update([
            'name' => $request->name
        ]);

        return to_route('division.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) {
        Division::find($id)->delete();
        return to_route('division.index');
    }
}
