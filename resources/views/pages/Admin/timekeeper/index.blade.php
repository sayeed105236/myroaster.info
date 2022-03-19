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
                {{-- <form method="head" action="" data-toggle="modal" id="myForm"> --}}
                <div class="row row-xs">
                    <div class="col-md-5 col-lg-4 ">
                        <input type="date" id="startDate" class="form-control" placeholder="Select Start Date"
                            wire:model.defer="start_date" min="{{ Carbon\Carbon::now()->format('Y-m-d') }}" required>
                    </div>
                    <div class="col-md-5 col-lg-4 mt-3 mt-md-0 ">
                        <input type="date" id="endDate" class="form-control" placeholder="Select End Date"
                            wire:model.defer="end_date" min="{{ Carbon\Carbon::now()->format('Y-m-d') }}" required>

                    </div>

                    <div class="col-md-2 col-lg-3 mt-3 mt-md-0">

                        {{-- <input class="btn btn btn-outline-primary btn-block" onclick="myFunction()" type="submit"
                                value="Create Schedule"> --}}
                        <a class="btn btn-primary" onclick="myFunction()" href="#" data-toggle="modal"
                            data-target="#addTimeKeeper">Create Schedule</a>
                        @include(
                            'pages.Admin.timekeeper.modals.timeKeeperAddModal'
                        )
                    </div>
                </div>
                {{-- </form> --}}
            </div>

            <div class="row" id="table-hover-animation">
                <div class="col-12">
                    <div class="card">



                        <div class="container">
                            <div class="table-responsive">
                                <table id="example" class="table table-hover-animation table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Employee</th>
                                            <th>Client</th>
                                            <th>Project</th>
                                            <th>Roaster Start</th>
                                            <th>Roaster End</th>
                                            <th>Duration</th>
                                            <th>Rate</th>
                                            <th>Amount</th>


                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($timekeepers as $row)
                                            <tr>
                                                <td></td>
                                                <td>

                                                    {{ $row->employee->fname }} {{ $row->employee->mname }}
                                                    {{ $row->employee->lname }}


                                                </td>
                                                <td>@if (isset($row->client->cname))
                                                    {{ $row->client->cname }}
                                                    @else
                                                    Null
                                                @endif
                                                    </td>
                                                <td>@if (isset($row->project->pName))
                                                    {{ $row->project->pName }}
                                                    @else
                                                    Null
                                                @endif
                                                   </td>
                                                <td>
                                                    {{ $row->roasterStartDate }}
                                                </td>
                                                <td>{{ $row->roasterEndDate }}</td>
                                                <td>{{ $row->duration }}</td>
                                                <td>{{ $row->ratePerHour }}</td>
                                                <td>{{ $row->amount }}</td>

                                                <td>
                                                    <a href="#" data-toggle="modal"
                                                        data-target="#editTimeKeeper{{ $row->id }}"><i
                                                            data-feather='edit'></i></a>
                                                    <a href="#" data-toggle="modal"
                                                        data-target="#copyTimeKeeper{{ $row->id }}"><i
                                                            data-feather='save'></i></a>


                                                    <a href="/admin/home/timekeeper/delete/{{ $row->id }}"><i
                                                            data-feather='trash-2'></i></a>
                                                </td>
                                            </tr>
                                            @include(
                                                'pages.Admin.timekeeper.modals.timeKeeperEditModal'
                                            )
                                            @include(
                                                'pages.Admin.timekeeper.modals.timeKeeperCopyModal'
                                            )
                                        @endforeach


                                    </tbody>
                                </table>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script>
        // $('#myForm').on('submit', function(e) {

        //     e.preventDefault();

        //     if ($('#startDate').val()) {

        //         $('#addTimeKeeper').modal('show');
        //     }
        // });

        var today = new Date();

        var date = today.getFullYear() + '-' + (today.getMonth() + 1) + '-' + today.getDate() + ' ' + today.getHours() +
            ':' + today.getMinutes();
        document.getElementById("fp-date-time").value = date;

        function myFunction() {
            var x = document.getElementById("startDate").value;
            var y = document.getElementById("endDate").value;
            document.getElementById("start").value = x;
            document.getElementById("end").value = y;



        }
    </script>

    <script>
        //get the days between two dates
        function getDays() {

            var start_date = new Date(document.getElementById('start_date').value);
            var end_date = new Date(document.getElementById('end_date').value);
            //Here we will use getTime() function to get the time difference
            var time_difference = (end_date.getTime() - start_date.getTime());
            //Here we will divide the above time difference by the no of miliseconds in a day
            var days_difference = parseInt(time_difference / (1000 * 3600));
                // var days_difference = parseInt(time_difference / (1000 * 3600 * 24)) + ' Day ' + time_difference / (1000 *
                // 3600) % 24 + ' Hour';

            //alert(days);
            document.getElementById('days').value = days_difference;
        }


        function amountPerHour() {
            var start_date = new Date(document.getElementById('start_date').value);
            var end_date = new Date(document.getElementById('end_date').value);
            var rate = document.getElementById('rate').value;
            //Here we will use getTime() function to get the time difference
            var time_difference = (end_date.getTime() - start_date.getTime());
            //Here we will divide the above time difference by the no of miliseconds in a day
            var days_difference = parseInt(time_difference / (1000 * 3600));
            var amount = parseInt(time_difference / (1000 * 3600) * rate);

            //alert(days);
            document.getElementById('amount').value = amount;
        }




        function getDay() {

            var start_dates = new Date(document.getElementById('start_dates').value);
            var end_dates = new Date(document.getElementById('end_dates').value);
            //Here we will use getTime() function to get the time difference
            var time_differences = (end_dates.getTime() - start_dates.getTime());
            //Here we will divide the above time difference by the no of miliseconds in a day
            var days_differences = parseInt(time_differences / (1000 * 3600));

            //alert(days);
            document.getElementById('day').value = days_differences;
        }


        function amountPerHours() {
            var start_dates = new Date(document.getElementById('start_dates').value);
            var end_dates = new Date(document.getElementById('end_dates').value);
            var rates = document.getElementById('rates').value;
            //Here we will use getTime() function to get the time difference
            var time_differences = (end_dates.getTime() - start_dates.getTime());
            //Here we will divide the above time difference by the no of miliseconds in a day
            var days_differences = parseInt(time_differences / (1000 * 3600));
            var amounts = parseInt(time_differences / (1000 * 3600) * rates);

            //alert(days);
            document.getElementById('amounts').value = amounts;
        }



        function getDuration() {

            var start_date1 = new Date(document.getElementById('start_date1').value);
            var end_date1 = new Date(document.getElementById('end_date1').value);
            //Here we will use getTime() function to get the time difference
            var time_difference1 = (end_date1.getTime() - start_date1.getTime());
            //Here we will divide the above time difference by the no of miliseconds in a day
            var days_difference1 = parseInt(time_difference1 / (1000 * 3600));

            //alert(days);
            document.getElementById('day1').value = days_difference1;
        }

        function roasterAmountPerHour() {
            var start_date1 = new Date(document.getElementById('start_date1').value);
            var end_date1 = new Date(document.getElementById('end_date1').value);
            var hourlyRate = document.getElementById('hourlyRate').value;
            //Here we will use getTime() function to get the time difference
            var time_difference1 = (end_date1.getTime() - start_date1.getTime());
            //Here we will divide the above time difference by the no of miliseconds in a day
            var day_difference1 = parseInt(time_difference1 / (1000 * 3600));
            var roasterAmount = parseInt(time_difference1 / (1000 * 3600) * hourlyRate);

            //alert(days);
            document.getElementById('roasterAmount').value = roasterAmount;
        }
    </script>
@endsection
