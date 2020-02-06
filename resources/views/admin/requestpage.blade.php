@extends('admin.requestpage_layout')

@section('content')


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
<link href={{asset('css/style.css')}} rel='stylesheet' />
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>


<div class="content-header">
  <div class="container-fluid">
    @if(Session::has('alert-success'))
                <div id="successMessage" class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">x</button>
                    <strong>{{ \Illuminate\Support\Facades\Session::get('alert-success') }}</strong>
                </div>
      @endif

    @if(Session::has('alert-danger'))
          <div id="dangerMessage" class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">x</button>
                <strong>{{ \Illuminate\Support\Facades\Session::get('alert-danger') }}</strong>
          </div>
        @endif

    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">All Requests</h1>
      </div><!-- /.col -->
    </div><!-- /.row -->

    <script>
        setTimeout(function() {
            $('#successMessage').fadeOut('slow');
        }, 5000); // <-- time in milliseconds
    </script>

        <script>
            setTimeout(function() {
                $('#dangerMessage').fadeOut('slow');
            }, 5000); // <-- time in milliseconds
        </script>

  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->


<!-- Main Content -->

<!-- Main Table -->
<div class="content-header">
    <div class="container">
        <table id="dataTables" class="table table-striped table-bordered" style="width: 100%">
            <thead>
            <tr>
                <th class="align-middle text-center" style="table-layout: fixed; width: 8%;">Num</th>
                <th class="align-middle text-center" style="max-width: 275px; word-wrap: break-word;">Start</th>
                <th class="align-middle text-center" style="max-width: 275px; word-wrap: break-word;">End</th>
                <th class="align-middle text-center">Title</th>
                <th class="align-middle text-center">Room</th>
                <th class="align-middle text-center">Num. of Person</th>
{{--                <th class="align-middle text-center">Freq</th>--}}
                <th class="align-middle text-center">Description</th>
                <th class="align-middle text-center">Requested by</th>
                <th class="align-middle text-center">Status</th>
                <th class="align-middle text-center" style="table-layout: fixed; width: 65px;">Action</th>
            </tr>
            </thead>
            <tbody>
            @if(!empty($allrequests) && count($allrequests) > 0)
                @php $no = 1; @endphp
                @foreach($allrequests as $req)
                    <tr>
                        <td class="text-center">{{ $no++ }}</td>
                        <td>{{ \Carbon\Carbon::parse($req->start)->format('l, d F Y H:i')}} </td>
                        <td>{{ \Carbon\Carbon::parse($req->end)->format('l, d F Y H:i')}} </td>
                        <td>{{ $req->title }}</td>
                        <td>{{ $req->room }}</td>
                        <td class="text-center">{{ $req->personNum }}</td>
{{--                        <td>{{ $req->frequency }}</td>--}}
                        <td>{{ $req->description }}</td>
                        <td>{{ $req->user->name }}</td>
                        <td class="text-center">
                            @if($req->status == 0)
                                <span class="badge bg-info" style="padding: 0.45em; margin-top: 4px;">Pending</span>
                            @elseif($req->status == 1)
                                <span class="badge bg-success" style="padding: 0.45em; margin-top: 4px;">Approved</span>
                            @else
                                <span class="badge bg-danger" style="padding: 0.45em; margin-top: 4px;">Declined</span>
                            @endif
                        </td>
                        <td class="text-left">
                            <div class="btn-group">
                                @if($req->status === 0)
                                    <a href="{{ route('admin.requestpage.approve',$req->id) }}" type="submit" class="btn btn-success btn-sm" style="margin-bottom: 4px; margin-top: 4px;"
                                       onclick="return confirm('Are you sure you want to approve this request?')">Approve</a>
                                @else
                                    <button type="button" class="btn btn-outline-success btn-sm" style="margin-bottom: 4px; margin-top: 4px; cursor: default"
                                       onclick="false" disabled >Approved</button>

                                @endif
                            </div>
                            <div class="btn-group">
                                @if($req->status === 0)
                                    <a href="{{ route('admin.requestpage.decline',$req->id) }}" type="submit" class="btn btn-danger btn-sm"
                                       style="margin-bottom: 4px; margin-top: 4px;" onclick="return confirm('Are you sure you want to decline this request?')">Decline</a>

                                @else
                                    <button type="button" class="btn btn-outline-danger btn-sm" style="margin-bottom: 4px; margin-top: 4px; cursor: default"
                                       onclick="false" disabled >Declined</button>
                                @endif
                            </div>
                            <div class="btn-group">
                                @if($req->status === 0)
                                    <a href="{{ route('admin.requestpage.edit',$req->id) }}" type="submit" class="btn btn-info btn-sm"
                                       style="margin-bottom: 4px; margin-top: 4px;"><i class="fa fa-pencil-alt"></i></a>

                                @else
                                    <button type="button" class="btn btn-outline-info btn-sm" style="margin-bottom: 4px; margin-top: 4px; cursor: default"
                                            onclick="false" disabled ><i class="fa fa-pencil-alt"></i></button>
                                @endif
                            </div>
                            <a href="{{ route('admin.requestpage.deletos',$req->id) }}" class="btn btn-sm btn-dark" onclick="return confirm('Are you sure want to delete this?')"><i class="fa fa-trash-alt"></i></a>

                        </td>
                    </tr>

                @endforeach
            @endif
            </tbody>
        </table>
        <script>
            $(document).ready(function() {
                $('#dataTables').DataTable({
                    "language": {
                        "search": "Filter records:"
                    },
                    "columnDefs": [ {
                        "targets": 9,
                        "orderable": false
                    } ]
                });
            });
        </script>
    </div>
</div>

<link href={{asset('css/style.css')}} rel='stylesheet' />

@endsection
