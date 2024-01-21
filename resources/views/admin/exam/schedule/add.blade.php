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
                            <label for="Exam">Exam</label>
                            <div class="input-group">
                                <select class="form-control" name="exam_id" id="exam_id"
                                    value="{{Request::get('exam_id')}}" required>
                                    <option value="">Select Exam</option>
                                    @if(!empty($exames))
                                    @foreach($exames as $value)
                                    <option value="{{$value->id}}"
                                        {{(Request::get('exam_id')==$value->id) ? 'selected' :''}}>
                                        {{$value->name}}</option>
                                    @endforeach
                                    @endif
                                </select>
                            </div>
                            @error('exam__id')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group col-md-3">
                            <label for="class">class</label>
                            <div class="input-group">
                                <select class="form-control" name="class_id" id="class_id"
                                    value="{{Request::get('class_id')}}" required>
                                    <option value="">Select class</option>
                                    @if(!empty($classes))
                                    @foreach($classes as $value)
                                    <option value="{{$value->id}}"
                                        {{(Request::get('class_id')==$value->id) ? 'selected' :''}}>
                                        {{$value->name}}
                                    </option>
                                    @endforeach
                                    @endif
                                </select>
                            </div>
                            @error('class__id')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
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


            <form action="{{route('exam.schedule.insert')}}" method="Post">
                {{csrf_field()}}

                <div class=" card">
                    @include('layout._message')
                    <!-- /.card-header -->
                    <div class="card-body p-0">

                        <table class="table table-striped">
                            <input type="hidden" name="class__id" id="class__id" class="form-control"
                                value="{{Request::get('class_id')}}">
                            <input type="hidden" name="exam__id" id="exam__id" class="form-control"
                                value="{{Request::get('exam_id')}}">
                            <thead>
                                <tr>
                                    <th>Subject Name</th>
                                    <th>Exam Date</th>
                                    <th>Start Time</th>
                                    <th>End Time</th>
                                    <th>Room Number</th>
                                    <th>Passing Mark</th>
                                    <th>Full Mark</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(!empty($timetable))
                                @php
                                $i=1;
                                @endphp
                                @foreach($timetable as $value)
                                <tr>
                                    <td>{{$value->subject_name}}
                                        <input type="hidden" name="timetable[{{$i}}][subject_id]"
                                            id="timetable[{{$i}}][subject_id]" class="form-control"
                                            value="{{$value->subject_id}}">
                                        @error('subject_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <input type="date" class="form-control" id="timetable[{{$i}}][exam_date]"
                                                placeholder="Exam Date" name="timetable[{{$i}}][exam_date]">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <input type="time" class="form-control" id="timetable[{{$i}}][start_time]"
                                                min="0" max="24" placeholder="Start"
                                                name="timetable[{{$i}}][start_time]">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <input type="time" class="form-control" id="timetable[{{$i}}][end_time]"
                                                placeholder="End Time" min="0" max="24"
                                                name="timetable[{{$i}}][end_time]">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <input type="number" class="form-control"
                                                id="timetable[{{$i}}][room_number]" placeholder="Room Number" min="0"
                                                max="100" name="timetable[{{$i}}][room_number]">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <input type="number" class="form-control"
                                                id="timetable[{{$i}}][passing_mark]" min="40" max="60"
                                                placeholder="Passing Mark" name="timetable[{{$i}}][passing_mark]">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <input type="number" class="form-control" id="timetable[{{$i}}][full_mark]"
                                                min="80" max="100" placeholder="Full Mark"
                                                name="timetable[{{$i}}][full_mark]">
                                        </div>
                                    </td>
                                </tr>
                                @php
                                $i++;
                                @endphp
                                @endforeach
                                @endif

                            </tbody>

                        </table>

                        <div style="text-align:center;">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>

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