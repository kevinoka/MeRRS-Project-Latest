@extends('admin.dashboard_layout')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            @if(Session::has('alert-success'))
                <div id="successMessage" class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">x</button>
                    <strong>{{ \Illuminate\Support\Facades\Session::get('alert-success') }}</strong>
                </div>
            @endif
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Dashboard</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            @if (!empty($results) && count($results) > 0)
                                @foreach($results as $rslt)
                                    <h1>{{ $rslt->status }}</h1>
                                @endforeach
                            @endif
                            <p>Request</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-inbox"></i>
                        </div>
                        <a class="small-box-footer" style="cursor: context-menu;">Pending</a>
                    </div>
                </div>
                <!-- ./col -->

            </div>
            <!-- /.row -->
            <!-- Main row -->
            <!-- <div class="row">

            </div> -->
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Calendar</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <div id="modalHomeButton">
                            <li class="breadcrumb-item"><a class="btn btn-success" style="color: white; cursor: pointer;" data-toggle="modal" data-target="#newModal" id="open"><i class="fas fa-plus-circle"></i>&nbsp; Make New Reservation</a></li>
                        </div>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <link href={{asset('css/style.css')}} rel='stylesheet' />

    <!-- Modal -->
    <div class="modal fade" id="newModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="alert alert-danger" style="display:none"></div>
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Make new reservation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{-- showing the error validation --}}
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form class="newRequestForm" id="submit_button" action="{{ route('admin.dashboard.store') }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="start">Start Date &amp; Time</label>
                            <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
                                <input type="text" name="start" class="form-control datetimepicker-input" data-target="#datetimepicker1" data-toggle="datetimepicker" placeholder="Start date" autocomplete="off" required/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="end">End Date &amp; Time</label>
                            <div class="input-group date" id="datetimepicker2" data-target-input="nearest">
                                <input type="text" name="end" class="form-control datetimepicker-input" data-target="#datetimepicker2" data-toggle="datetimepicker" placeholder="End date" autocomplete="off" required/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="title" class="col-form-label">Title</label>
                            <input type="text" class="form-control" name="title" value="{{ old('title') }}" placeholder="Meeting Title" required>
                        </div>
                        <div class="form-group">
                            <label for="room" class="col-form-label">Room</label>
                            <div class="form-group">
                                <select class="form-control" name="room" required>
                                    <option value="" disabled="disabled" selected>Select the meeting room...</option>
                                    <option value="Main Meeting Room">Main Meeting Room</option>
                                    <option value="Small Meeting Room">Small Meeting Room</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="personNum" class="col-form-label">Number of Person</label>
                            <input type="number" min="1" class="form-control" name="personNum" value="{{ old('personNum') }}" placeholder="Number of person" required>
                        </div>
{{--                        <div class="form-group">--}}
{{--                            <label for="frequency" class="col-form-label">Frequency</label>--}}
{{--                            <div class="form-group">--}}
{{--                                <select class="form-control" name="frequency" required>--}}
{{--                                    <option value="" disabled="disabled" selected>Select the meeting frequency...</option>--}}
{{--                                    <option value="One-time only">One-time only</option>--}}
{{--                                    <option value="Weekly">Weekly</option>--}}
{{--                                    <option value="Bi-weekly">Bi-weekly</option>--}}
{{--                                    <option value="Monthly">Monthly</option>--}}
{{--                                </select>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                        <div class="form-group">
                            <label for="description" class="col-form-label">Description</label>
                            <textarea class="form-control" name="description" placeholder="Describe the meeting" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="requestedBy" class="col-form-label">Requested by</label>
                            <input type="text" class="form-control" name="requestedBy" value="{{ Auth::user()->name }}" readonly>
                        </div>
                        {{--          <div class="form-group">--}}
                        {{--            <label for="status" class="col-form-label">Status</label>--}}
                        {{--            <input type="text" class="form-control" name="status" required="required" placeholder="Request status">--}}
                        {{--          </div>--}}
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                            <button class="btn btn-primary" id="formSubmit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!DOCTYPE html>
            <html{{ str_replace('_', '-', app()->getLocale()) }}>
            <head>
                <meta charset='utf-8' />
                <title>{{ config('APP_NAME', 'Meeting Room Reservation System') }}</title>
                <link href={{asset('assets/fullcalendar/packages/core/main.css')}} rel='stylesheet' />
                <link href={{asset('assets/fullcalendar/packages/daygrid/main.css')}} rel='stylesheet' />
                <link href={{asset('assets/fullcalendar/packages/timegrid/main.css')}} rel='stylesheet' />
                <link href={{asset('assets/fullcalendar/packages/list/main.css')}} rel='stylesheet' />
                <link href={{asset('assets/fullcalendar/packages/bootstrap/main.css')}} rel='stylesheet' />

                <link href={{asset('assets/fullcalendar/css/style.css')}} rel='stylesheet' />

                <script src={{asset('assets/fullcalendar/packages/core/main.js')}}></script>
                <script src={{asset('assets/fullcalendar/packages/interaction/main.js')}}></script>
                <script src={{asset('assets/fullcalendar/packages/daygrid/main.js')}}></script>
                <script src={{asset('assets/fullcalendar/packages/timegrid/main.js')}}></script>
                <script src={{asset('assets/fullcalendar/packages/list/main.js')}}></script>
                <script src={{asset('assets/fullcalendar/packages/bootstrap/main.js')}}></script>

                <script src={{asset('assets/fullcalendar/packages/core/locales-all.js')}}></script>
                <script src={{asset('assets/fullcalendar/js/calendar.js')}}></script>
                <script src={{asset('assets/fullcalendar/js/script.js')}}></script>

                <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

                <!-- jQuery -->
                <script src={{asset('js/modal-home.js')}}></script>

            </head>
            <body>
            @include('modal-calendar')
            <div id='calendar'
                 data-route-load-events="{{ route('admin.routeLoadEvents') }}">
            </div>
            </body>
            </html>
        </div>
    </section>

    <script>
        setTimeout(function() {
            $('#successMessage').fadeOut('slow');
        }, 5000); // <-- time in milliseconds
    </script>

@endsection
