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
                    <a href="{{route('class_teacher.add')}}" class="btn btn-primary">Assign Class to
                        Teacher</a>
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
                    <div class="col-sm-6">
                        <h3>Search</h3>
                    </div>


                    <div class="card-body row">

                        <div class="form-group col-md-3">
                            <label for="name">name</label>

                            <div class="input-group">
                                <input type="text" class="form-control" id="teacher_name" placeholder="name"
                                    name="teacher_name" value="{{Request::get('teacher_name')}}">
                            </div>
                        </div>



                        <div class="form-group col-md-3">
                            <label for="class_id">Class</label>
                            <select class="form-control" name="class_name" id="class_name" placeholder="Seletc class"
                                value="{{Request::get('class_name')}}">
                                <option value="">Select Class</option>
                                @foreach($classes as $value)
                                <option value="{{$value->id}}">{{$value->name}}
                                </option>
                                @endforeach
                            </select>
                        </div>



                        <div class="form-group col-md-3">
                            <label for="status">Status</label>
                            <div class="input-group">
                                <select class="form-control" name="status" id="status">
                                    <option value="">Select Status</option>
                                    <option value="1">Active</option>
                                    <option value="0">InActive</option>
                                </select>
                            </div>
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
                                <th>Class Name</th>
                                <th>Teacher Name</th>
                                <th>Status</th>
                                <th>Create By</th>
                                <th>Created Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($class_teacher as $value)
                            <tr>
                                <td>{{$value->id}}</td>
                                <td>{{$value->class_name}}</td>
                                <td>{{$value->teacher_name}}</td>
                                <td>{{$value->status}}</td>
                                <td>{{$value->created_by}}</td>
                                <td>{{date('d-m-Y H:i A',strtotime($value->created_at))}}</td>
                                <td>
                                    <a href="{{route('class_teacher.edit',$value->id)}}"
                                        class="btn btn-primary">Edit</a>
                                    <a href="{{route('class_teacher.delete',$value->id)}}"
                                        class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div style="padding:10px;float:right;">
                        {{ $class_teacher->links() }}
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