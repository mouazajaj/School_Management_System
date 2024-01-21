@extends('layout.app')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>MySubjects</h1>
                </div>
                <div class="col-sm-6" style="text-align:right;">
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
                <div class="card-body p-0" style="overflow:auto">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Subject Name</th>
                                <th>Subject Type</th>
                            </tr>
                        </thead>
                        <tbody>
                            @isset($mysubjects)
                            @foreach($mysubjects as $value)
                            <tr>
                                <td>{{$value->subject_name}}</td>
                                <td>{{$value->subject_type}}</td>
                            </tr>
                            @endforeach
                            @endisset
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