@extends('layouts.requestpage_layout')

@section('content')

<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

<div class="content-header">
    <div class="container-fluid">
        <!-- Main Section -->
        <section class="main-section">
                <!-- Add Your Content Inside -->
                <div class="content">
                        <h1 class="m-0 text-dark">Add New Reservation</h1>
                        <hr>
                    <form action="{{ route('requestpage.store') }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="schedule">Schedule:</label>
                            <input type="text" class="form-control" id="schedule" name="schedule">
                        </div>
                        <div class="form-group">
                            <label for="title">Title:</label>
                            <input type="text" class="form-control" id="title" name="title">
                        </div>
                        <div class="form-group">
                            <label for="room">Room:</label>
                            <input type="text" class="form-control" id="room" name="room">
                        </div>
                        <div class="form-group">
                            <label for="personNum">Number of Person:</label>
                            <input type="text" class="form-control" id="personNum" name="personNum">
                        </div>
                        <div class="form-group">
                            <label for="frequency">Frequency:</label>
                            <input type="text" class="form-control" id="frequency" name="frequency">
                        </div>
                        <div class="form-group">
                            <label for="description">Description:</label>
                            <textarea class="form-control" id="description" name="description"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="requestedBy">Requested By:</label>
                            <input type="text" class="form-control" id="requestedBy" name="requestedBy">
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
                    </div>
                <!-- /.content -->
        </section>
        <!-- /.main-section -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
@endsection