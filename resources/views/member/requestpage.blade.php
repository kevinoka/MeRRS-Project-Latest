@extends('member.requestpage_layout')

@section('content')

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
                <th class="align-middle text-center" style="width: 12%; word-wrap: break-word;">Start</th>
                <th class="align-middle text-center" style="width: 12%; word-wrap: break-word;">End</th>
                <th class="align-middle text-center" style="width: 15%;">Title</th>
                <th class="align-middle text-center">Room</th>
                <th class="align-middle text-center">Person Qty</th>
{{--                <th class="align-middle text-center">Freq</th>--}}
                <th class="align-middle text-center">Description</th>
                <!-- <th class="align-middle text-center">Requested by</th> -->
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
                        <!-- <td>{{ $req->user->name }}</td> -->
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
                                    <a href="{{ route('member.requestpage.edit',$req->id) }}" type="submit" class="btn btn-info btn-sm"
                                       style="margin-bottom: 4px; margin-top: 4px;"><i class="fa fa-pencil-alt"></i>&nbsp; Edit</a>

                                @else
                                    <button type="button" class="btn btn-outline-info btn-sm" style="margin-bottom: 4px; margin-top: 4px; cursor: default"
                                            onclick="false" disabled ><i class="fa fa-pencil-alt"></i>&nbsp; Edit</button>
                                @endif
                            </div>
                            <a href="{{ route('member.requestpage.deletos',$req->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure want to delete this?')"><i class="fa fa-trash"></i>&nbsp; Delete</a>

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
                        "targets": 8,
                        "orderable": false
                    } ]
                });
            });
        </script>
    </div>
</div>

<link href={{asset('css/style.css')}} rel='stylesheet' />



@endsection
