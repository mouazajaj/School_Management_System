@extends('layout.app')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{$header_title}}</h1>
                </div>
            </div>

        </div><!-- /.container-fluid -->
    </section>

    <!-- /.content -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            @for ($i = 0; $i<count($myexames); $i++) <div class="card">@include('layout._message') <div
                    class="card-header">
                    <h3 class="card-title">{{$myexames[$i]}}</h3>

                </div>
                <div class="card-body p-0">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Subject Name</th>
                                <th>Exam Date</th>
                                <th>Start Time</th>
                                <th>End Time</th>
                                <th>Room Number</th>
                                <th>Full Mark</th>
                                <th>Passing Mark</th>
                            </tr>
                        </thead>
                        <tbody>
                            @for ($j =0;$j
                            < count($timetable[$myexames[$i]]); $j++) <tr>
                                <td>{{$timetable[$myexames[$i]][$j]['subject_name']}}</td>
                                <td>{{$timetable[$myexames[$i]][$j]['exam_date']}}</td>
                                <td>{{$timetable[$myexames[$i]][$j]['start_time']}}</td>
                                <td>{{$timetable[$myexames[$i]][$j]['end_time']}}</td>
                                <td>{{$timetable[$myexames[$i]][$j]['room_number']}}</td>
                                <td>{{$timetable[$myexames[$i]][$j]['full_mark']}}</td>
                                <td>{{$timetable[$myexames[$i]][$j]['passing_mark']}}</td>
                            </tr>
                            @endfor
                        </tbody>

                    </table>

                </div>
                <!-- /.card -->
        </div>
        <!-- /.col -->
</div>
@endfor
</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection