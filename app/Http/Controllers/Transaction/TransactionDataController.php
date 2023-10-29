<?php

namespace App\Http\Controllers\Transaction;

use App\Http\Controllers\Controller;
use App\Models\Division;
use App\Models\Trx;
use App\Models\TrxLog;
use Illuminate\Http\Request;

class TransactionDataController extends Controller {
    public function send(Request $request){
        $request->validate([
            'division_id' => 'bail|required',
            'start_date' => 'bail|required|date',
            'end_date' => 'bail|required|date'
        ]);

        $start_date = new \DateTime($request->start_date);
        $end_date = new \DateTime($request->end_date);
        $end_date->setTime(23, 59, 59);

        $trx = Trx::where('division_id', '=', $request->division_id)->first();
        $result = TrxLog::where([
            ['trx_id', $trx->id],
            ['amount', '>', 0]
        ])->whereBetween('created_at', [$start_date, $end_date])->with(['trx', 'issuer', 'trx.items'])->get();

        $returnResult = new \stdClass();
        $returnResult->db = $result;
        $returnResult->division_data = Division::find($request->division_id);

        return $returnResult;
    }
}
