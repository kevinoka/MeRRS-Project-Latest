@extends('layouts.adminDashboard')

@section('content')
<div class="content-header">
  <div class="container-fluid">
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
            <h1>5</h1>
            <p>Request</p>
          </div>
          <div class="icon">
            <i class="fas fa-users"></i>
          </div>
          <a class="small-box-footer">Main Meeting Room </a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
            <h1>3</h1>
            <p>Request</p>
          </div>
          <div class="icon">
            <i class="fas fa-user"></i>
          </div>
          <a class="small-box-footer">Small Meeting Room</a>
        </div>
      </div>

    </div>
    <!-- /.row -->
    <!-- Main row -->
    <!-- <div class="row">

    </div> -->
    <!-- /.row (main row) -->
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->

<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Schedule</h1>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->


<!-- Main content -->

<section class="content">
  <div class="container-fluid">
    <!DOCTYPE html>
    <html>
    <head>
    <meta charset='utf-8' />
    <link href={{asset('assets/fullcalendar/packages/core/main.css')}} rel='stylesheet' />
    <link href={{asset('assets/fullcalendar/packages/daygrid/main.css')}} rel='stylesheet' />
    <link href={{asset('assets/fullcalendar/packages/timegrid/main.css')}} rel='stylesheet' />
    <link href={{asset('assets/fullcalendar/packages/list/main.css')}} rel='stylesheet' />

    <link href={{asset('assets/fullcalendar/css/style.css')}} rel='stylesheet' />

    <script src={{asset('assets/fullcalendar/packages/core/main.js')}}></script>
    <script src={{asset('assets/fullcalendar/packages/interaction/main.js')}}></script>
    <script src={{asset('assets/fullcalendar/packages/daygrid/main.js')}}></script>
    <script src={{asset('assets/fullcalendar/packages/timegrid/main.js')}}></script>
    <script src={{asset('assets/fullcalendar/packages/list/main.js')}}></script>
    <script src={{asset('assets/fullcalendar/packages/google-calendar/main.js')}}></script>

    <script src={{asset('assets/fullcalendar/packages/core/locales-all.js')}}></script>
    <script src={{asset('assets/fullcalendar/js/calendar.js')}}></script>

    </head>
    <body>
      <div id = 'cal-content'>
        <div id='calendar'></div>
      <!-- <div id='wrap'>
        <div id='external-events'>
          <h4>Draggable Events</h4>

          <div id='external-events-list'>
            <div class='fc-event'>My Event 1</div>
            <div class='fc-event'>My Event 2</div>
            <div class='fc-event'>My Event 3</div>
            <div class='fc-event'>My Event 4</div>
            <div class='fc-event'>My Event 5</div>
          </div>

          <p>
            <input type='checkbox' id='drop-remove' />
            <label for='drop-remove'>Remove after drop</label>
          </p>
        </div>

        <div id='calendar'></div>

        <div style='clear:both'></div>

      </div> -->
      </div>
    </body>
    </html>
  </div>
</div>

<div class="content-header">
  <div class="container-fluid">
    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr>
                        <th align="center">No.</th>
                        <th data-field="kode">Kode</th>
                        <th data-field="nama_dokumen">Judul</th>
                        <th data-field="jenis_dokumen">Jenis</th>
                        <th data-field="status_dokumen">Status</th>
                        <th data-field="unit">Unit</th>
                        <th data-field="Revisi">Revisi Ke-</th>
                        <th data-field="entry_date">Waktu</th>
                        <th data-field="keterangan">Keterangan</th>
                        <th colspan="1">Aksi</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>

            <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

@endsection
