@extends('layout.app')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add Subject</h1>
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
                <form action="{{route('subject.add')}}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Subject Name</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="name" placeholder="name" name="name"
                                    required>
                            </div>
                            @error('name')
                            <div class="alert alert-danger">{{$message }}</div>
                            @enderror
                        </div>

                        <div class=" form-group">
                            <label for="Type">Subject Type</label>
                            <select class="form-control" id="type" name="type" placeholder="Enter type">
                                <option value="">choose type</option>
                                <option value="theory">Theory</option>
                                <option value="practical">Practical</option>
                            </select>
                            @error('type')
                            <div class="alert alert-danger">{{$message }}</div>
                            @enderror
                        </div>


                        <div class=" form-group">
                            <label for="Type">Subject Teacher</label>
                            <select class="form-control" id="teacher_id" name="teacher_id" placeholder="Select Teacher">
                                <option value="">Select Teacher</option>
                                @foreach($teachers as $value)
                                <option value="{{$value->id}}">{{$value->name}}</option>
                                @endforeach
                            </select>
                            @error('type')
                            <div class="alert alert-danger">{{$message }}</div>
                            @enderror
                        </div>

                        <div class="form-group ">
                            <label for="status">status</label>
                            <select class="form-control" name="status" id="status">
                                <option value=0>unActive</option>
                                <option value=1>Active</option>
                            </select>
                            @error('status')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
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