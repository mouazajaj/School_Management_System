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
                <div class="col-sm-6" style="text-align:right;">
                </div>

            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="container-fluid">

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <div class="card">
                @include('layout._message')
                <!-- /.card-header -->
                <div class="card-body p-0" style="overflow:auto">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Profile Picture</th>
                                <th>Name</th>
                                <th>Class</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($mystudents as $value)
                            <tr>
                                <td>{{$value->id}}</td>
                                <td><img src="{{asset('assets/img/profiles/'.$value->profile_picture)}}"
                                        style="border-radius:50px; height:50px; width:50px;">
                                </td>
                                <td>{{$value->name}}</td>
                                <td>{{$value->class_name}}</td>
                                <td style="min-width:200px;">
                                    <a href=" {{url('admin/parent/mystudents/subjects/'.$value->id)}}"
                                        class="btn btn-primary">Subjects</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div style="padding:10px;float:right;">

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