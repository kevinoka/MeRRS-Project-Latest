@extends('layouts.requestpage_layout')

@section('content')

<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

<div class="content-header">
  <div class="container-fluid">
  @if(Session::has('alert-success'))
                <div id="successMessage" class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">x</button>
                    <strong>{{ \Illuminate\Support\Facades\Session::get('alert-success') }}</strong>
                </div>
            @endif
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Ongoing Request</h1>
      </div><!-- /.col -->
    </div><!-- /.row -->
    <script>
        setTimeout(function() {
            $('#successMessage').fadeOut('slow');
        }, 6000); // <-- time in milliseconds
    </script>
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main Content --> 
<div class="content-header">
    <div class="container">
        <table class="table table-bordered table-hover table-striped" id="dataTables-example">
                <thead>
                    <tr>
                        <th>Num.</th>
                        <th>Schedule</th>
                        <th>Title</th>
                        <th>Room</th>
                        <th>Num. of Person</th>
                        <th>Freq</th>
                        <th>Description</th>
                        <th>Requested by</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if(!empty($data) && count($data) > 0)
                        @php $no = 1; @endphp
                        @foreach($data as $p)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $p->schedule }}</td>
                            <td>{{ $p->title }}</td>
                            <td>{{ $p->room }}</td>
                            <td>{{ $p->personNum }}</td>
                            <td>{{ $p->frequency }}</td>
                            <td>{{ $p->description }}</td>
                            <td>{{ $p->requestedBy }}</td>
                            <td>
                                <a href="#" class="btn btn-sm btn-success" style="margin-bottom: 6px">Approve</a>
                                <a href="#" class="btn btn-sm btn-danger" style="margin-bottom: 6px; margin-right: 14px">Decline</a>
                                <form action="{{ route('requestpage.destroy',$p->id) }}" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <p><a href="{{ route('requestpage.edit',$p->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                    <button class="btn btn-sm btn-dark" type="submit" onclick="return confirm('Are you sure want to delete this?')"><i class="fa fa-trash"></i></button>
                                    </p>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    @endif
                </tbody>
        </table>

        <script>
            $(document).ready(function() {
                $('#dataTables-example').DataTable({
                responsive: true
                });
            });
        </script>
    </div>
</div>

<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Approved</h1>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main Content --> 
<div class="content-header">
    <div class="container">
        <table class="table table-bordered table-hover table-striped" id="dataTables-example">
                <thead>
                    <tr>
                        <th>Num.</th>
                        <th>Schedule</th>
                        <th>Title</th>
                        <th>Room</th>
                        <th>Num. of Person</th>
                        <th>Freq</th>
                        <th>Description</th>
                        <th>Requested by</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if(!empty($data) && count($data) > 0)
                        @php $no = 1; @endphp
                        @foreach($data as $p)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $p->schedule }}</td>
                            <td>{{ $p->title }}</td>
                            <td>{{ $p->room }}</td>
                            <td>{{ $p->personNum }}</td>
                            <td>{{ $p->frequency }}</td>
                            <td>{{ $p->description }}</td>
                            <td>{{ $p->requestedBy }}</td>
                            <td>
                                <a href="#" class="btn btn-sm btn-outline-success" style="margin-bottom: 6px">Approved</a>
                                <form action="{{ route('requestpage.destroy',$p->id) }}" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <p><a href="{{ route('requestpage.edit',$p->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                    <button class="btn btn-sm btn-dark" type="submit" onclick="return confirm('Are you sure want to delete this?')"><i class="fa fa-trash"></i></button>
                                    </p>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    @endif
                </tbody>
        </table>

        <script>
            $(document).ready(function() {
                $('#dataTables-example').DataTable({
                responsive: true
                });
            });
        </script>
    </div>
</div>

<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Declined</h1>
        </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main Content --> 
<div class="content-header">
    <div class="container">
        <table class="table table-bordered table-hover table-striped" id="dataTables-example">
                <thead>
                    <tr>
                        <th>Num.</th>
                        <th>Schedule</th>
                        <th>Title</th>
                        <th>Room</th>
                        <th>Num. of Person</th>
                        <th>Freq</th>
                        <th>Description</th>
                        <th>Requested by</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if(!empty($data) && count($data) > 0)
                        @php $no = 1; @endphp
                        @foreach($data as $p)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $p->schedule }}</td>
                            <td>{{ $p->title }}</td>
                            <td>{{ $p->room }}</td>
                            <td>{{ $p->personNum }}</td>
                            <td>{{ $p->frequency }}</td>
                            <td>{{ $p->description }}</td>
                            <td>{{ $p->requestedBy }}</td>
                            <td>
                                <a href="#" class="btn btn-sm btn-outline-danger" style="margin-bottom: 6px; margin-right: 5px">Declined</a>
                                <form action="{{ route('requestpage.destroy',$p->id) }}" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <p>
                                    <a href="{{ route('requestpage.edit',$p->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                    <button class="btn btn-sm btn-dark" type="submit" onclick="return confirm('Are you sure want to delete this?')"><i class="fa fa-trash"></i></button>
                                    </p>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    @endif
                </tbody>
        </table>

        <script>
            $(document).ready(function() {
                $('#dataTables-example').DataTable({
                responsive: true
                });
            });
        </script>
    </div>
</div>

@endsection
