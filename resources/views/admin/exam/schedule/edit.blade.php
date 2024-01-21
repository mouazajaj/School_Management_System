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
            <div class="card card-primary">
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{route('exam.schedule.update',$schedule_exam->id)}}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row">

                            <div class="form-group col-md-6">
                                <label for="exam_id">Exam Name</label>
                                <select class="form-control" name="exam_id" id="exam_id">
                                    <option value="">Select Exam</option>
                                    @foreach($exames as $value)
                                    <option value="{{$value->id}}" @selected($schedule_exam->
                                        exam_id==$value->id)>{{$value->name}}
                                    </option>
                                    @endforeach
                                </select>
                                @error('exam_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="form-group col-md-6">
                                <label for="class_id">Class</label>
                                <select class="form-control" name="class_id" id="class_id">
                                    <option value="">Select Class</option>
                                    @foreach($classes as $value)
                                    <option value="{{$value->id}}" @selected($schedule_exam->
                                        class_id==$value->id)>{{$value->name}}
                                    </option>
                                    @endforeach
                                </select>
                                @error('class_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="subject_id">Subject</label>
                                <select class="form-control" name="subject_id" id="subject_id">
                                    <option value="">Select Subject</option>
                                    @foreach($subjects as $value)
                                    <option value="{{$value->id}}" @selected($schedule_exam->
                                        subject_id==$value->id)>{{$value->name}}
                                    </option>
                                    @endforeach
                                </select>
                                @error('subject_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="form-group col-md-6">
                                <label for="room_number">Room Number</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" id="room_number" name="room_number"
                                        min="0" max="100" value="{{$schedule_exam->room_number}}">
                                </div>
                                @error('room_number')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="exam_date">Exam Date</label>
                                <div class="input-group">
                                    <input type="date" class="form-control" id="exam_date" name="exam_date"
                                        value="{{$schedule_exam->exam_date}}">
                                </div>
                                @error('exam_date')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="start_time">Start Time</label>
                                <div class="input-group">
                                    <input type="time" class="form-control" id="start_time" name="start_time"
                                        value="{{$schedule_exam->start_time}}">
                                </div>
                                @error('start_time')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="end_time">End Time</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="end_time" name="end_time"
                                        value="{{$schedule_exam->end_time}}" required>
                                </div>
                                @error('end_time')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-md-3">
                                <label for="full_mark">Full Mark</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" id="full_mark" name="full_mark" min="80"
                                        max="100" value="{{$schedule_exam->full_mark}}" required>
                                </div>
                                @error('full_mark')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-md-3">
                                <label for="parssing_mark">Passing Mark</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="passing_mark" name="passing_mark"
                                        value=" {{$schedule_exam->passing_mark}}">
                                </div>
                                @error('passing_mark')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>
                    </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
        </div>


</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection