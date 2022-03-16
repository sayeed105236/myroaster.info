@extends('layouts.Admin.master')
@section('admincontent')
<link href="//cdnjs.cloudflare.com/ajax/libs/datatables/1.9.4/css/jquery.dataTables_themeroller.css" rel="stylesheet" data-semver="1.9.4" data-require="datatables@*" />
<link href="//cdnjs.cloudflare.com/ajax/libs/datatables/1.9.4/css/jquery.dataTables.css" rel="stylesheet" data-semver="1.9.4" data-require="datatables@*" />
<link href="//cdnjs.cloudflare.com/ajax/libs/datatables/1.9.4/css/demo_table_jui.css" rel="stylesheet" data-semver="1.9.4" data-require="datatables@*" />
<link href="//cdnjs.cloudflare.com/ajax/libs/datatables/1.9.4/css/demo_table.css" rel="stylesheet" data-semver="1.9.4" data-require="datatables@*" />
<link href="//cdnjs.cloudflare.com/ajax/libs/datatables/1.9.4/css/demo_page.css" rel="stylesheet" data-semver="1.9.4" data-require="datatables@*" />
<link data-require="jqueryui@*" data-semver="1.10.0" rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.10.0/css/smoothness/jquery-ui-1.10.0.custom.min.css" />
    <div class="row">

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
                    <p id="date_filter">
                        <span id="date-label-from" class="date-label">From: </span><input class="date_range_filter date" type="text" id="datepicker_from" />
                        <span id="date-label-to" class="date-label">To:<input class="date_range_filter date" type="text" id="datepicker_to" />
                    </p>
                    {{-- <form id="dates_form" wire:submit.prevent="refreshTable">
                        <div class="row row-xs">
                            <div class="col-md-5 col-lg-4 ">
                                <input type="date" class="form-control date_range_filter date" placeholder="Select Start Date" id="start_date datepicker_from"
                                    required="required" wire:model="start_date" wire:change="set_min_val()">
                            </div>
                            <div class="col-md-5 col-lg-4 mt-3 mt-md-0 ">
                                <input type="date" class="form-control" placeholder="Select End Date" id="end_date datepicker_to"
                                    required="required" min="0000-00-00 00:00:00" wire:model="end_date">
                            </div>
                            <div class="col-md-2 col-lg-3 mt-3 mt-md-0">
                                <button type="submit" class="btn btn btn-outline-primary btn-block"
                                    id="btn_search">Search</button>
                            </div>
                        </div>
                    </form> --}}
                </div>
                <!-- Button trigger modal -->
            </div>

            <table width="100%" class="display" id="datatable">
                <thead>
                  <tr>
                    <th>Col1</th>
                    <th>Col2</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>
                      03/03/2016
                    </td>
                    <td>5</td>
                  </tr>
                  <tr>
                    <td>
                      03/04/2017
                    </td>
                    <td>4</td>
                  </tr>
                  <tr>
                    <td>
                       03/05/2017
                    </td>
                    <td>2</td>
                  </tr>
                  <tr>
                    <td>
                      03/06/2016
                    </td>
                    <td>17</td>
                  </tr>
                  <tr>
                    <td>
                      03/07/2017
                    </td>
                    <td>10</td>
                  </tr>
                </tbody>
              </table>
            </body>

          </html>

            {{-- <table class="table" id="datatable">
                <thead>
                  <tr>
                    <th scope="col">Employee Name</th>
                    <th scope="col">Total Hour</th>
                    <th scope="col">Total Amount</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($timekeepers as $timekeeper)
                  <tr>
                    <td>{{ $timekeeper->employeeID }}</td>
                    <td>{{ $timekeeper->duration }}</td>
                    <td>{{ $timekeeper->amount }}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table> --}}
        </div>
    </div>

    <script>
        $(function() {
  var oTable = $('#datatable').DataTable({
    "oLanguage": {
      "sSearch": "Filter Data"
    },
    "iDisplayLength": -1,
    "sPaginationType": "full_numbers",

  });




  $("#datepicker_from").datepicker({
    showOn: "button",
    buttonImage: "images/calendar.gif",
    buttonImageOnly: false,
    "onSelect": function(date) {
      minDateFilter = new Date(date).getTime();
      oTable.fnDraw();
    }
  }).keyup(function() {
    minDateFilter = new Date(this.value).getTime();
    oTable.fnDraw();
  });

  $("#datepicker_to").datepicker({
    showOn: "button",
    buttonImage: "images/calendar.gif",
    buttonImageOnly: false,
    "onSelect": function(date) {
      maxDateFilter = new Date(date).getTime();
      oTable.fnDraw();
    }
  }).keyup(function() {
    maxDateFilter = new Date(this.value).getTime();
    oTable.fnDraw();
  });

});

// Date range filter
minDateFilter = "";
maxDateFilter = "";

$.fn.dataTableExt.afnFiltering.push(
  function(oSettings, aData, iDataIndex) {
    if (typeof aData._date == 'undefined') {
      aData._date = new Date(aData[0]).getTime();
    }

    if (minDateFilter && !isNaN(minDateFilter)) {
      if (aData._date < minDateFilter) {
        return false;
      }
    }

    if (maxDateFilter && !isNaN(maxDateFilter)) {
      if (aData._date > maxDateFilter) {
        return false;
      }
    }

    return true;
  }
);
    </script>
     <script data-require="jqueryui@*" data-semver="1.10.0" src="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.10.0/jquery-ui.js"></script>
     <script src="//cdnjs.cloudflare.com/ajax/libs/datatables/1.9.4/jquery.dataTables.js" data-semver="1.9.4" data-require="datatables@*"></script>
    @endsection
