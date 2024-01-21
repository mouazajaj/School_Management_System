@extends('layout.app')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{$header_title}}
                    </h1>
                </div>
                <div class="col-sm-6" style="text-align:right;">
                    <a href="{{url('admin/admin/add')}}" class="btn btn-primary">Add New Admin</a>
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
                            <label for="name">Name</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="name" placeholder="name" name="name"
                                    value="{{Request::get('name')}}">
                            </div>
                        </div>

                        <div class=" form-group col-md-3">
                            <label for="Email1">Email address</label>
                            <input type="email" class="form-control" id="email" name="email"
                                value="{{Request::get('email')}}" placeholder="Enter email">
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
                                <th>Name</th>
                                <th>Email</th>
                                <th>Create Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($admins as $value)
                            <tr>
                                <td>{{$value->id}}</td>
                                <td>{{$value->name}}</td>
                                <td>{{$value->email}}</td>
                                <td>{{date('d-m-Y H:i A',strtotime($value->created_at))}}</td>
                                <td>
                                    <a href="{{route('admin.edit',$value->id)}}" class="btn btn-primary">Edit</a>
                                    <a href="{{route('admin.delete',$value->id)}}" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>


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