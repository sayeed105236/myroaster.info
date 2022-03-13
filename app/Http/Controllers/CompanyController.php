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
    public function index()
    {
      return view('pages.SuperAdmin.Company.index');
    }
    
}
