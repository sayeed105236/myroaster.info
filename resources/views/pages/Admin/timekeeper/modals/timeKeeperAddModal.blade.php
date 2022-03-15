<div class="modal fade text-left" id="addTimeKeeper" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel17">Add Roaster</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <section id="multiple-column-form">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">

                                <div class="card-body">
                                    <form class="form" action="{{ route('store-project') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-12 col-12">
                                                <label for="">Select Employee</label>
                                                <div class="form-group">
                                                    <select class="form-control" aria-label="Default select example">
                                                        <option selected>Select employee</option>
                                                        @foreach ($employees as $employee)
                                                            <option value="{{ $employee->id }}">
                                                                {{ $employee->mname }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-12 col-12">
                                                <label for="">Select Client</label>
                                                <div class="form-group">
                                                    <select class="form-control" aria-label="Default select example">
                                                        <option selected>Select client</option>
                                                        @foreach ($clients as $client)
                                                            <option value="{{ $client->id }}">{{ $client->cname }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-12 col-12">
                                                <label for="">Select Project</label>
                                                <div class="form-group">
                                                    <select class="form-control" aria-label="Default select example">
                                                        <option selected>Select project</option>
                                                        @foreach ($projects as $project)
                                                            <option value="{{ $project->id }}">{{ $project->pName }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <label for="email-id-column">Project Start Date<span
                                                        class="text-danger">*</span></label>
                                                <div class="form-group">
                                                    <input type="date" id="start" class="form-control"
                                                        min="{{ Carbon\Carbon::now()->format('Y-m-d') }}">
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-12">
                                                <label for="email-id-column">Project Ends Date<span
                                                        class="text-danger">*</span></label>
                                                <div class="form-group">
                                                    <input type="date" class="form-control" id="end"
                                                        min="{{ Carbon\Carbon::now()->format('Y-m-d') }}">
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-12">
                                                <label for="email-id-column">Roaster Start Date & Time<span
                                                        class="text-danger">*</span></label>
                                                <div class="form-group">
                                                    <input type="date" id="start_date"
                                                        class="form-control flatpickr-date-time" placeholder="Start" min= now />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <label for="email-id-column">Roaster Ends Date & Time<span
                                                        class="text-danger">*</span></label>
                                                <div class="form-group">
                                                    <input type="date" id="end_date"
                                                        class="form-control flatpickr-date-time"
                                                         placeholder="End" min="{{ Carbon\Carbon::now()->format('Y-m-d') }}" onchange="getDays()"/>
                                                </div>
                                            </div>
                                            {{-- @php
                                                $datetime1 = new DateTime();
                                                $datetime2 = new DateTime('2011-01-03 17:13:00');
                                                $interval = $datetime1->diff($datetime2);
                                                $elapsed = $interval->format('%y years %m months %a days %h hours %i minutes %s seconds');
                                                echo $elapsed;
                                            @endphp --}}
                                            <div class="col-md-6 col-12">
                                                <label for="email-id-column">Duration<span
                                                        class="text-danger">*</span></label>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="Duration"
                                                    id="days" disabled/>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-12">
                                                <label for="email-id-column">Amount Per Hour<span
                                                        class="text-danger">*</span></label>
                                                <div class="form-group">
                                                    <input type="text" id="rate" onchange="amountPerHour()" class="form-control" placeholder="0"/>
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-12">
                                                <label for="email-id-column">Amount<span
                                                        class="text-danger">*</span></label>
                                                <div class="form-group">
                                                    <input type="text" id="amount" class="form-control" placeholder="0" disabled/>
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-12">
                                                <label for="email-id-column">Remarks<span
                                                        class="text-danger">*</span></label>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="remarks" />
                                                </div>
                                            </div>


                                        </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Create Roaster</button>
                <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Discard</button>
            </div>
            </form>
        </div>
    </div>
</div>
