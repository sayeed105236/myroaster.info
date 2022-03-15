@extends('layouts.Admin.master')


@section('admincontent')
<div class="col-lg-12 col-md-12">
    <div class="card p-0">
        <div class="card-header text-primary border-top-0 border-left-0 border-right-0">
            <h3 class="card-title text-primary d-inline">
                Select Project Dates
            </h3>
            <span class="float-right">
                <i class="fa fa-chevron-up clickable"></i>
            </span>
        </div>
        <div class="card-body">
            <div class="row row-xs">
                <div class="col-md-5 col-lg-4 ">
                    <input type="date" class="form-control" placeholder="Select Start Date"
                        wire:model.defer="start_date">
                </div>
                <div class="col-md-5 col-lg-4 mt-3 mt-md-0 ">
                    <input type="date" class="form-control" placeholder="Select End Date" wire:model.defer="end_date"
                        min="">

                </div>

                <div class="col-md-2 col-lg-3 mt-3 mt-md-0">
                    <a class="btn btn btn-outline-primary btn-block" href="#" data-toggle="modal" data-target="#addTimeKeeper">Create
                        Schedule</a>
                        @include('pages.Admin.timekeeper.modals.timeKeeperAddModal')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
