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
                @include('layout._message')
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{url('change-password')}}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Old Password</label>

                            <input type="password" class="form-control" id="old_password" name=" old_password" required>
                        </div>
                        @error('old_password')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <div class=" form-group">
                            <label for="">Password</label>
                            <input type="password" class="form-control" id="password" name="password" />
                        </div>
                        @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class=" form-group">
                            <label for="password">Confirm Password</label><br>
                            <input type="password" class="form-control" id="password_confirmation"
                                name="password_confirmation" />
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