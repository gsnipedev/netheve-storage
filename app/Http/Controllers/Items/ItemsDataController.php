<?php

namespace App\Http\Controllers\Items;

use App\Http\Controllers\Controller;
use App\Models\Item;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ItemsDataController extends Controller {
    public function search(Request $request){
        $searchResult = Item::where('name', $request->get('q'))->get();
        return $searchResult;
    }
}
