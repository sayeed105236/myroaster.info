<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Employee;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TimeKeeperController extends Controller
{
    public function index(){
        $employees = Employee::where('user_id',Auth::id())->get();
        $projects = Project::where('user_id',Auth::id())->get();
        $clients = Client::where('user_id',Auth::id())->get();
        return view('pages.Admin.timekeeper.index',compact('employees','projects','clients'));
    }
}
