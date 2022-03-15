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
    public function index($id){
        $employees = Employee::where('user_id',Auth::id())->get();
        $projects = Project::where('user_id',Auth::id())->get();
        $clients = Client::where('user_id',Auth::id())->get();
        $timekeepers= TimeKeeper::where('user_id',Auth::id())->get();
        return view('pages.Admin.timekeeper.index',compact('employees','projects','clients','timekeepers'));
    }



    public function storeTimeKeeper(Request $request)
    {
      $timekeeper= new TimeKeeper();
      $timekeeper->user_id= Auth::id();
      $timekeeper->employeeID= $request->employeeID;
      $timekeeper->clientID= $request->clientID;
      $timekeeper->projectID=$request->projectID;
      $timekeeper->projectStartDate= $request->projectStartDate;
      $timekeeper->projectEndDate= $request->projectEndDate;
      $timekeeper->roasterStartDate= $request->roasterStartDate;
      $timekeeper->roasterEndDate= $request->roasterEndDate;
      $timekeeper->duration= $request->duration;
      $timekeeper->ratePerHour= $request->ratePerHour;
      $timekeeper->amount= $request->amount;
      $timekeeper->remarks= $request->remarks;
      $timekeeper->created_at= Carbon::now();

      $timekeeper->save();
      $notification=array(
          'message'=>'Timekeeper Successfully Added !!!',
          'alert-type'=>'success'
      );
      return Redirect()->route('timekeeper')->with($notification);


    }
    public function update(Request $request)
    {

      $timekeeper= TimeKeeper::find($request->id);
      $timekeeper->user_id= Auth::id();
      $timekeeper->employeeID= $request->employeeID;
      $timekeeper->clientID= $request->clientID;
      $timekeeper->projectID=$request->projectID;
      $timekeeper->projectStartDate= $request->projectStartDate;
      $timekeeper->projectEndDate= $request->projectEndDate;
      $timekeeper->roasterStartDate= $request->roasterStartDate;
      $timekeeper->roasterEndDate= $request->roasterEndDate;
      $timekeeper->duration= $request->duration;
      $timekeeper->ratePerHour= $request->ratePerHour;
      $timekeeper->amount= $request->amount;
      $timekeeper->remarks= $request->remarks;
      $timekeeper->created_at= Carbon::now();

      $timekeeper->save();


      $notification=array(
          'message'=>'Scheduler Updated Successfully Added !!!',
          'alert-type'=>'success'
      );
      return Redirect()->back()->with($notification);
    }
    public function delete($id)
    {
      //dd($id);
      $timekeeper = TimeKeeper::find($id);
      //dd($timekeeper);
      $timekeeper->delete();
      $notification=array(
          'message'=>'Timekeeper record has been deleted successfully!!!',
          'alert-type'=>'error'
      );
      return Redirect()->back()->with($notification);
    }
}
