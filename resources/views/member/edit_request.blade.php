@extends('member.editrequest_layout')

@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- Main Content -->
<div class="content-header">
    <div class="container-fluid">
            <h1 class="m-0 text-dark">Edit Reservation</h1>
            <hr>
            @foreach($data as $p)
            <form action="{{ route('member.requestpage.update', $p->id) }}" method="post">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="form-group">
                    <div class="col-md-6">
                        <label for="start">Start Date &amp; Time</label>
                        <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
                            <input type="text" name="start" class="form-control datetimepicker-input" data-target="#datetimepicker1" data-toggle="datetimepicker" placeholder="Start date" value="{{ $p->start }}" autocomplete="off"/>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-6">
                        <label for="end">End Date &amp; Time</label>
                        <div class="input-group date" id="datetimepicker2" data-target-input="nearest">
                            <input type="text" name="end" class="form-control datetimepicker-input" data-target="#datetimepicker2" data-toggle="datetimepicker" placeholder="End date" value="{{ $p->end }}" autocomplete="off"/>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-6">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ $p->title }}">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-6">
                        <label for="room">Frequency</label>
                        <select class="form-control" name="room" id="room" required="required">
                            <option value="Main Meeting Room" @if($p->room == 'Main Meeting Room') selected='selected' @endif>Main Meeting Room</option>
                            <option value="Small Meeting Room" @if($p->room == 'Small Meeting Room') selected='selected' @endif>Small Meeting Room</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-6">
                        <label for="personNum">Number of Person</label>
                        <input type="number" min="1" class="form-control" id="personNum" name="personNum" value="{{ $p->personNum }}">
                    </div>
                </div>
{{--                <div class="form-group">--}}
{{--                    <div class="col-md-6">--}}
{{--                        <label for="frequency">Frequency</label>--}}
{{--                        <select class="form-control" name="frequency" id="frequency" required="required">--}}
{{--                            <option value="One-time only" @if($p->frequency=='One-time only') selected='selected' @endif>One-time only</option>--}}
{{--                            <option value="Weekly" @if($p->frequency=='Weekly') selected='selected' @endif>Weekly</option>--}}
{{--                            <option value="Bi-weekly" @if($p->frequency=='Bi-weekly') selected='selected' @endif>Bi-weekly</option>--}}
{{--                            <option value="Monthly" @if($p->frequency=='Monthly') selected='selected' @endif>Monthly</option>--}}
{{--                        </select>--}}
{{--                    </div>--}}
{{--                </div>--}}
                <div class="form-group">
                    <div class="col-md-6">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description">{{ $p->description }}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-6">
                        <label for="requestedBy">Requested By</label>
                        <input type="text" class="form-control" id="requestedBy" name="requestedBy" value="{{ Auth::user()->name }}" readonly>
                    </div>
                </div>
                <div class="form-group text-md-right">
                    <div class="col-md-6">
                        <input type="button" value="Cancel" class="btn btn-md btn-danger" onclick="history.back();" />
                        <button type="submit" class="btn btn-md btn-primary">Submit</button>&nbsp;
                    </div>
                </div>
            </form>
            @endforeach
    </div><!-- /.container -->
</div>
<!-- /.content-header -->


<link href={{asset('css/style.css')}} rel='stylesheet' />
@endsection
