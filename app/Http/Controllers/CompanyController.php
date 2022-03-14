<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
  public function __construct()
  {
      $this->middleware('super_admin');
  }
    public function index()
    {
      $companies= User::where('is_admin','=',1)->get();

      return view('pages.SuperAdmin.Company.index',compact('companies'));
    }
    public function updateCompany(Request $request)
    {
      $image =$request->file('file');
      $filename=null;
      if ($image) {
          $filename = time() . $image->getClientOriginalName();

          Storage::disk('public')->putFileAs(
              'clients/',
              $image,
              $filename
          );


      }

      $company= User::find($request->id);
      $company->name= $request->name;
      $company->mname= $request->mname;
      $company->lname= $request->lname;
      $company->email= $request->email;
      $company->password= $request->password;
      $company->company=$request->company;
      $company->companyContact= $request->companyContact;

      $company->image= $filename;

      $company->save();
      $notification=array(
          'message'=>'Company Updated Successfully Added !!!',
          'alert-type'=>'success'
      );
      return Redirect()->back()->with($notification);
    }




    public function delete($id)
    {
      //dd($id);
      $employee = User::find($id);
      //dd($employee);
      $employee->delete();
      $notification=array(
          'message'=>'Company record has been deleted successfully!!!',
          'alert-type'=>'error'
      );
      return Redirect()->back()->with($notification);
    }

}
