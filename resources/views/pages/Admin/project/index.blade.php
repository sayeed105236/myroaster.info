@extends('layouts.Admin.master')


@section('admincontent')
<div class="content-header row">
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0">Projects</h2>
                <div class="breadcrumb-wrapper">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Home</a>
                        </li>
                        <li class="breadcrumb-item active">Project Lists
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
                <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#addEmployee">Add Project</a>
            </div>


            <div class="container">
              <div class="table-responsive">
                  <table id="example" class="table table-hover-animation table-bordered">
                      <thead>
                          <tr>
                            <th>#</th>
                              <th>Name</th>
                              <th>Email</th>
                              <th>Number</th>
                              <th>Contact Person</th>



                              <th>Status</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>

                          <tr>
                            <td></td>
                            <td>
                              <div class="row">
                                <div data-toggle="tooltip" data-popup="tooltip-custom" data-placement="top" title="" class="avatar pull-up my-0" data-original-title="">
                                    <img src="#" alt="Avatar" height="26" width="26" />
                                </div>

                              </div>


                              </td>
                            <td></td>
                            <td></td>
                            <td></td>

                              <td>
                                <span class="badge badge-pill badge-light-success mr-1">Active</span>
                              </td>

                              <td>
                                <a href="#" data-toggle="modal" data-target="#editEmployee"><i data-feather='edit'></i></a>
                                  <a href="#"><i data-feather='trash-2'></i></a>
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
