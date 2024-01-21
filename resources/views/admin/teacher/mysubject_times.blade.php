@extends('layout.app')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1></h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>


    <!-- /.content -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">


            <div class="card">
                @include('layout._message')
                <!-- /.card-header -->
                <div class="card-body p-0">

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>day</th>
                                <th>Start Time</th>
                                <th>End Time</th>
                                <th>Room Number</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($subject_time as $value)
                            <tr>
                                <td>{{$value->day}}</td>
                                <td>{{$value->start_date}}</td>
                                <td>{{$value->end_date}}</td>
                                <td>{{$value->room_number}}</td>
                            </tr>
                            @endforeach

                        </tbody>

                    </table>
                </div>
                <!-- /.col -->
            </div>

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection