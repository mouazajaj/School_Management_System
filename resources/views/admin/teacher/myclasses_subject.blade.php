@extends('layout.app')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3>Search subject List</h3>
                </div>

            </div>
        </div><!-- /.container-fluid -->
    </section>


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
                                <th>Subject Name</th>
                                <th>Subject Type</th>
                                <th>Status</th>
                                <th>Create Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($classes_subject as $value)
                            <tr>
                                <td>{{$value->id}}</td>
                                <td>{{$value->class_name}}</td>
                                <td>{{$value->subject_name}}</td>
                                <td>{{$value->subject_type}}</td>
                                <td>{{$value->status}}</td>
                                <td>{{date('d-m-Y H:i A',strtotime($value->created_at))}}</td>
                                <td>
                                    <a href="{{url('admin/teacher/myclasses_subjects/'.$value->class_id.'/'.$value->subject_id)}}"
                                        class="btn btn-primary">TimeTable</a>
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