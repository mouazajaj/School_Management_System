@extends('layout.app')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Admin</h1>
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
                <form action="{{route('admin.edit',$admin->id)}}" method="post">
                    @csrf
                    @include('layout._message')

                    <div class="card-body row">

                        <div class="form-group col-md-6">
                            <label for="name">Name</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="name" name="name" placeholder="name"
                                    value="{{$admin->name}}" required>
                            </div>
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label for="gender">gender</label>
                            <select class="form-control" name="gender" id="gender">
                                <option value="null" required>Select Gender</option>
                                <option value="m" @selected($admin->gender=='m') >Male</option>
                                <option value="f" @selected($admin->gender=='f')>Female</option>
                            </select>
                            @error('gender')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group col-md-12">
                            <label for="Email1">Email address</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter email"
                                value="{{$admin->email}}" required>
                            @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <p>Do you want to change password please add new password here</p>

                        <div class="form-group col-md-12">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Password">
                            @error('password')

                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group col-md-12">
                            <label for="Confirm password">ConfirmPassword</label>
                            <input type="password" class="form-control" id="password_confirmation"
                                name="password_confirmation" placeholder="confirm Password">
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