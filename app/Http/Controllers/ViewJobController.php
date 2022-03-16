<?php

namespace App\Http\Controllers;

use App\Models\TimeKeeper;
use Illuminate\Http\Request;

class ViewJobController extends Controller
{
    public function index(Request $request, $id)
    {
        $timekeepers = TimeKeeper::all();



        return view('pages.Admin.viewjob.index', compact('timekeepers'));
    }
}
