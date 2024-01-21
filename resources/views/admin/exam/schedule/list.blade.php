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
                <div class="col-sm-6" style="text-align:right;">
                    <a href="{{route('exam.schedule.add')}}" class="btn btn-primary">Add New
                        Schedul Exam</a>
                </div>

            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="container-fluid">

            <!-- general form elements -->
            <div class="card card-primary">

                <!-- /.card-header -->
                <!-- form start -->
                <form action="" method="get">
                    <div class="card-body row">

                        <div class="form-group col-md-3">
                            <label for="exam_id">Exam</label>
                            <select class="form-control" name="exam_id" id="exam_id" placeholder="Seletc Exam"
                                value="{{Request::get('exam_id')}}">
                                <option value="">Select Exam</option>
                                @foreach($exames as $value)
                                <option value="{{$value->id}}">{{$value->name}}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-md-3">
                            <label for="class_id">Class</label>
                            <select class="form-control" name="class_id" id="class_id" placeholder="Seletc Class"
                                value="{{Request::get('class_id')}}">
                                <option value="">Select Class</option>
                                @foreach($classes as $value)
                                <option value="{{$value->id}}">{{$value->name}}
                                </option>
                                @endforeach
                            </select>
                        </div>


                        <div class="form-group col-md-3">
                            <label for="subject_id">Subject</label>
                            <select class="form-control" name="subject_id" id="subject_id" placeholder="Seletc Subject"
                                value="{{Request::get('subject_id')}}">
                                <option value="">Select Subject</option>
                                @foreach($subjects as $value)
                                <option value="{{$value->id}}">{{$value->name}}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <div class=" form-group col-md-3" style="margin-top: 32px;">
                            <button type="submit" class="btn btn-primary">Search</button>
                            <button type="reset" class="btn btn-success">Clear</button>
                        </div>
                        <!-- /.card-body -->
                </form>
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
                                <th>#</th>
                                <th>Exam Name</th>
                                <th>Class Name</th>
                                <th>Subject Name</th>
                                <th>Exam Date</th>
                                <th>Start Time</th>
                                <th>End Time</th>
                                <th>Room Number</th>
                                <th>Passing Mark</th>
                                <th>Full Mark</th>
                                <th>Create By</th>
                                <th>Create At</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($scheduels as $value)
                            <tr>
                                <td>{{$value->id}}</td>
                                <td>{{$value->exam_name}}</td>
                                <td>{{$value->class_name}}</td>
                                <td>{{$value->subject_name}}</td>
                                <td>{{$value->exam_date}}</td>
                                <td>{{$value->start_time}}</td>
                                <td>{{$value->end_time}}</td>
                                <td>{{$value->room_number}}</td>
                                <td>{{$value->passing_mark}}</td>
                                <td>{{$value->full_mark}}</td>
                                <td>{{$value->created_name}}</td>
                                <td>{{date('d-m-Y H:i A',strtotime($value->created_at))}}</td>
                                <td>
                                    <a href="{{route('exam.schedule.edit',$value->id)}}"
                                        class="btn btn-primary">Edit</a>
                                    <a href="{{route('exam.schedule.delete',$value->id)}}"
                                        class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div style="padding:10px;float:right;">
                        {{ $scheduels->links() }}
                    </div>

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