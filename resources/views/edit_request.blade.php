@extends('layouts.requestpage_layout')

@section('content')

<!-- Main Content --> 
<div class="content-header">
    <div class="container-fluid">
            <h1 class="m-0 text-dark">Edit Reservation</h1>
            <hr>
            @foreach($data as $p)
            <form action="{{ route('requestpage.update', $p->id) }}" method="post">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="form-group">
                    <label for="schedule">Schedule:</label>
                    <input type="text" class="form-control" id="schedule" name="schedule" value="{{ $p->schedule }}">
                </div>
                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $p->title }}">
                </div>
                <div class="form-group">
                    <label for="room">Room:</label>
                    <input type="text" class="form-control" id="room" name="room" value="{{ $p->room }}">
                </div>
                <div class="form-group">
                    <label for="personNum">Number of Person:</label>
                    <input type="text" class="form-control" id="personNum" name="personNum" value="{{ $p->personNum }}">
                </div>
                <div class="form-group">
                    <label for="frequency">Frequency:</label>
                    <input type="text" class="form-control" id="frequency" name="frequency" value="{{ $p->frequency }}">
                </div>
                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea class="form-control" id="description" name="description">{{ $p->schedule }}"</textarea>
                </div>
                <div class="form-group">
                    <label for="requestedBy">Requested By:</label>
                    <input type="text" class="form-control" id="requestedBy" name="requestedBy" value="{{ $p->schedule }}">
                </div>
                <div class="form-group">
                    <label for="action">Action:</label>
                    <input type="text" class="form-control" id="action" name="action">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-md btn-primary">Submit</button>
                    <button type="reset" class="btn btn-md btn-danger">Cancel</button>
                </div>
            </form>
            @endforeach
    </div><!-- /.container -->
</div>
<!-- /.content-header -->
@endsection