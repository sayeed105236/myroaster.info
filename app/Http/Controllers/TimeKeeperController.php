<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Employee;
use App\Models\Project;
use App\Models\TimeKeeper;
use Carbon\Carbon;
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

    public function store(Request $request){
        TimeKeeper::insert([
            "user_id" => Auth::id(),
            "employeeID" => $request->employeeID,
            "clientID" => $request->clientID,
            "projectID" => $request->projectID,
            "projectStartDate" => $request->projectStartDate,
            "projectEndDate" => $request->projectEndDate,
            "roasterStartDate" => $request->roasterStartDate,
            "roasterEndDate" => $request->roasterEndDate,
            "duration" => $request->duration,
            "ratePerHour" => $request->ratePerHour,
            "amount" => $request->amount,
            "remarks" => $request->remarks,
            "created_at" => Carbon::now()
        ]);
        $notification=array(
            'message'=>'Roaster Added Successfully !!!',
            'alert-type'=>'success'
        );
        return Redirect()->route('index')->with($notification);
    }
}
