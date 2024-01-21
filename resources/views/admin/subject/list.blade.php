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
                    <a href="{{route('subject.add')}}" class="btn btn-primary">Add New subject</a>
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
                        <div class="form-group col-md-2">
                            <label for="name">Name</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="name" placeholder="name" name="name"
                                    value="{{Request::get('name')}}">
                            </div>
                        </div>

                        <div class=" form-group col-md-2">
                            <label for="Type">Subject Type</label>
                            <select class="form-control" id="type" name="type" value="{{Request::get('type')}}"
                                placeholder="Enter type">
                                <option value="">choose type</option>
                                <option value="Theory">Theory</option>
                                <option value="Practical">Practical</option>
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

                        <div class=" form-group col-md-2" style="margin-top:32px;">
                            <button type="submit" class="btn btn-primary">Search</button>
                            <button type="reset" class="btn btn-success">Clear</button>
                        </div>

                        <!-- /.card-body -->
                    </div>
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
                                <th>Name</th>
                                <th>Type</th>
                                <th>Teacher Name</th>

                                <th>Status</th>
                                <th>Create Date</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($subjects as $value)
                            <tr>
                                <td>{{$value->id}}</td>
                                <td>{{$value->name}}</td>
                                <td>{{$value->type}}</td>
                                <td>{{$value->teacher_name}}</td>
                                <td>{{$value->status}}</td>
                                <td>{{date('d-m-Y H:i A',strtotime($value->created_at))}}</td>
                                <td>
                                    <a href="{{route('subject.edit',$value->id)}}" class="btn btn-primary">Edit</a>
                                    <a href="{{route('subject.delete',$value->id)}}" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div style="padding:10px;float:right;">
                        {{ $subjects->links() }}
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