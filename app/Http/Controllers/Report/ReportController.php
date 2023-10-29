<?php

namespace App\Http\Controllers\Report;

use App\Http\Controllers\Controller;
use App\Models\Division;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ReportController extends Controller {
    public function index(){
        return Inertia::render('Report/index', [
            'divisions' => Division::all()
        ]);
    }
}
