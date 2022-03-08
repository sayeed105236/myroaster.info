@extends('layouts.SuperAdmin.master')


@section('super_admincontent')
<div class="content-header row">
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0">Companies</h2>
                <div class="breadcrumb-wrapper">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('super-admin.home')}}">Home</a>
                        </li>
                        <li class="breadcrumb-item active">Company Lists
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- Basic Tables start -->
<!-- Table Hover Animation start -->
<div class="row" id="table-hover-animation">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#large">Add Company</a>
            </div>
            @include('pages.SuperAdmin.Company.modals.add_company_modal')
            <div class="container">
              <div class="table-responsive">
                  <table id="example" class="table table-hover-animation table-bordered">
                      <thead>
                          <tr>
                              <th>Company</th>
                              <th>Contact</th>
                              <th>Admin Name</th>
                              <th>Email</th>
                              <th>Status</th>
                              <th>Actions</th>
                          </tr>
                      </thead>
                      <tbody>
                          <tr>
                              <td>

                              </td>
                              <td></td>
                              <td></td>
                              <td>

                              </td>
                              <td><span class="badge badge-pill badge-light-success mr-1">Active</span></td>
                              <td>

                              </td>
                          </tr>

                      </tbody>
                  </table>
              </div>
            </div>

        </div>
    </div>
</div>
<!-- Table head options end -->
<!-- Basic Tables end -->





@endsection
