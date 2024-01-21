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

    <!-- Main content -->
    <section class="content">

        <div class="container-fluid">

            <!-- general form elements -->




        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">


            <form action="{{url('admin/class_timetable/add')}}" method="Post">
                {{csrf_field()}}
                <input type="hidden" name="class_id" value="{{Request::get('class_id')}}" class="form-control">
                <input type="hidden" name="subject_id" value="{{Request::get('subject_id')}}" class="form-control">

                <div class="card">
                    @include('layout._message')
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Day</th>
                                    <th>Start Time</th>
                                    <th>End Time</th>
                                    <th>Room Number</th>
                                </tr>
                            </thead>
                            @foreach($mysubjects as $value)
                            <tbody>
                                <tr>
                                    <td>{{$value->subject_name}}</td>
                                    <td>{{$value->day}}</td>
                                    <td>{{$value->start_date}}</td>
                                    <td>{{$value->end_date}}</td>
                                    <td>{{$value->room_number}}</td>
                                </tr>
                            </tbody>
                            @endforeach
                        </table>


                    </div>
                    <!-- /.card-body -->
                </div>

            </form>

            <!-- /.card -->

        </div>
        <!-- /.card-body -->
</div>
<!-- /.card -->
</div>
<!-- /.col -->
</div>

</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection