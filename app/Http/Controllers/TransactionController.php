<?php

namespace App\Http\Controllers;

use App\Models\Division;
use App\Models\Item;
use App\Models\Trx;
use App\Models\TrxLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class TransactionController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $allItems = Item::all();
        $allDivisions = Division::all();
        return Inertia::render('Transaction/index', [
            'items' => $allItems,
            'divisions' => $allDivisions
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $request->validate([
            'division_id' => 'bail|numeric|required',
            'item_id' => 'bail|numeric|required',
            'amount' => 'bail|required|numeric|min:0'
        ]);

        DB::beginTransaction();

        $item = Item::find($request->item_id);

        if($item->stock < $request->amount){
            return redirect()->back()->withErrors(['amount' => 'Stock tidak mencukupi permintaan']);
        }

        $trx = Trx::where([
            ['division_id', '=',  $request->division_id],
            ['item_id', '=', $request->item_id]
        ])->firstOrNew(
            ['division_id' => $request->division_id, 'item_id' => $request->item_id],
            ['remaining_amount' => 0]
        );

        $trx->update([
            'remaining_amount' => $trx->remaining_amount + $request->amount
        ]);

        $trx->save();

        TrxLog::create([
           'trx_id' => $trx->id,
           'issuer' => Auth::id(),
           'amount' => $request->amount
        ]);

        $item->update([
            'stock' => $item->stock - $request->amount
        ]);

        DB::commit();

        return to_route('transaction.index');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) {
        //
    }
}
