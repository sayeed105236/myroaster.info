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
                <form method="head" action="" data-toggle="modal" id="myForm">
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

                            <input class="btn btn btn-outline-primary btn-block" onclick="myFunction()" type="submit"
                                value="Create Schedule">
                            @include(
                                'pages.Admin.timekeeper.modals.timeKeeperAddModal'
                            )
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script>
        $('#myForm').on('submit', function(e) {

            e.preventDefault(); //stop submit

            if ($('#startDate').val()) {
                //Check if checkbox is checked then show modal
                $('#addTimeKeeper').modal('show');
            }
        });

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
            var days_difference = parseInt(time_difference / (1000 * 3600 * 24)) + ' Day ' + time_difference / (1000 * 3600) % 24 + ' Hour';

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
            var amount = parseInt(time_difference / (1000 * 3600)*rate);

            //alert(days);
            document.getElementById('amount').value = amount;
        }
    </script>
@endsection
