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
                <form action="" method="get">

                    <div class="card-body row">
                        <div class="form-group col-md-3">
                            <label for="class">class</label>
                            <div class="input-group">
                                <select class="form-control getClass" name="class_id" id="class_id">
                                    <option value="">Select class</option>
                                    @foreach($getClass as $value)
                                    <option value="{{$value->id}}"
                                        {{(Request::get('class_id')==$value->id) ? 'selected' :''}}>
                                        {{$value->name}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            @error('class__id')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group col-md-3">
                            <label for="subject">subject</label>
                            <div class="input-group">
                                <select class="form-control getSubjects" name="subject_id">
                                    <option value="">Select Subject</option>
                                    @if(!empty($getSubjects))
                                    @foreach($getSubjects as $value)
                                    <option {{(Request::get('subject_id')==$value->subject_id)? 'selected' :''}}
                                        value="{{$value->id}}">
                                        {{$value->name}}</option>
                                    @endforeach
                                    @endif
                                </select>
                            </div>
                            @error('subject__id')
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


            <form action="{{url('admin/exam/mark/add')}}" method="Post">
                {{csrf_field()}}

                <div class="card">
                    @include('layout._message')
                    <!-- /.card-header -->
                    <div class="card-body p-0">

                        <table class="table table-striped">
                            <input type="hidden" name="class__id" id="class__id" class="form-control">
                            <input type="hidden" name="subject__id" id="subject__id" class="form-control">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Start Time</th>
                                    <th>End Time</th>
                                    <th>Room Number</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $i=1;
                                @endphp
                                @foreach($weeks as $value)
                                <tr>
                                    <td><input type="hidden" name="timetable[{{$i}}][week_id]" value="{{$value->id}}"
                                            class="form-control">{{$value->name}}
                                    </td>
                                    <td><input type="time" name="timetable[{{$i}}][start_date]" class="form-control">
                                    </td>
                                    <td><input type="time" name="timetable[{{$i}}][end_date]" class="form-control"></td>
                                    <td><input type="text" name="timetable[{{$i}}][room_number]" class="form-control">
                                    </td>
                                </tr>
                                @php
                                $i++;
                                @endphp
                                @endforeach

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


@section('script')

<script type="text/javascript">
$(document).ready(function() {
    $(".getClass").change(function() {
        var class_id = $(this).val();
        $('#class__id').val(class_id);
        $.ajax({
            url: "{{url('admin/class_subject_timetable/get_subject')}}",
            type: "get",
            data: {
                "_token": "{{csrf_token()}}",
                class_id: class_id
            },
            dataType: "json",
            success: function(response) {
                $(".getSubjects").html(response.html);
            },
            error: function(request, status,
                error) {
                alert(request.responseText);
            }
        });
    })
});


$(document).ready(function() {
    $(".getSubjects").change(function() {
        var subject_id = $(this).val();
        $('#subject__id').val(subject_id);
    })
});
</script>

@endsection