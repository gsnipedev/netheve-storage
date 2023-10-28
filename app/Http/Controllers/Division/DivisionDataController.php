<?php

namespace App\Http\Controllers\Division;

use App\Http\Controllers\Controller;
use App\Models\Trx;
use Illuminate\Http\Request;

class DivisionDataController extends Controller {
    public function search(Request $request){
        $divisions = Trx::where([
            ['division_id', '=', $request->get('division_id')]
        ])->with('items')->get();
        return $divisions;
    }
}
