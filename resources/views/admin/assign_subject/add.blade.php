@extends('layout.app')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Assign Subject</h1>
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
                <form action="{{route('class_subject.insert')}}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="class">Class name</label>
                            <div class="input-group">
                                <select class="form-control" name="class_id" id="class_id" placeholder="Enter class"
                                    required>
                                    <option value="">Select Class</option>
                                    @foreach($classes as $value)
                                    <option value="{{$value->id}}">{{$value->name}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            @error('class_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class=" form-group">
                            <label>Subjects</label><br>
                            @foreach($subjects as $value)
                            <div class="form-check">
                                <label class="form-check-label" for="{{$value->name}}">
                                    <input type="checkbox" class="form-check-input" id="subject_id[]"
                                        name="subject_id[]" value="{{$value->id}}" checked>{{$value->name}}
                                </label>
                            </div>
                            @endforeach
                            @error('subject_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class=" form-group">
                            <label>Status</label><br>
                            <div class="form-check">
                                <label class="form-check-label" for="status">
                                    <input type="hidden" id="status" name="status" value="0" />
                                    <input type="checkbox" class="form-check-input" id="status" name="status" value="1"
                                        checked>Is Active ?
                                </label>
                            </div>
                            @error('status')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
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