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
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{route('teacher.insert')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row">

                            <div class="form-group col-md-6">
                                <label for="Name">Name</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Name"
                                        value="{{old('name')}}" required>
                                </div>
                                @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="gender">gender</label>
                                <select class="form-control" name="gender" id="gender">
                                    <option value="null">Select Gender</option>
                                    <option value="m">Male</option>
                                    <option value="f">Female</option>
                                </select>
                                @error('gender')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="date_of_birth">Date Of Birth</label>
                                <div class="input-group">
                                    <input type="date" class="form-control" id="date_of_birth" name="date_of_birth"
                                        placeholder="date_of_birth" value="{{old('date_of_birth')}}">
                                </div>
                                @error('date_of_birth')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="mobile_phone">Phone</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="mobile_phone" name="mobile_phone"
                                        placeholder="Mobile Phone" value="{{old('mobile_phone')}}">
                                </div>
                                @error('mobile_phone')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="address">Address</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="address" name="address"
                                        placeholder="address" value="{{old('address')}}">
                                </div>
                                @error('address')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="qualification">Qualification</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="qualification" name="qualification"
                                        placeholder="qualification" value="{{old('qualification')}}">
                                </div>
                                @error('qualification')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="experience">experience</label>
                                <div class="input-group">
                                    <select class="form-control" name="experience" id="experience">
                                        <option value="">Select</option>
                                        <option value="junior">Junior</option>
                                        <option value="senior">Senior</option>
                                        <option value="mid-level">Mid-level</option>
                                    </select>
                                </div>
                                @error('experience')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="form-group col-md-6">
                                <label for="note">note</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="note" name="note" placeholder="note"
                                        value="{{old('note')}}">
                                </div>
                                @error('note')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="status">Status</label>
                                <div class="input-group">
                                    <select class="form-control" name="status" id="status">
                                        <option value="1">Active</option>
                                        <option value="0">InActive</option>
                                    </select>
                                </div>
                                @error('status')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="email">Email</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="email" name="email" placeholder="email"
                                        value="{{old('email')}}">
                                </div>
                                @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="form-group col-md-6">
                                <label for="email">Password</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" id="password" name="password"
                                        placeholder="Password">
                                </div>
                                @error('password')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="password_confirmation">Password Confirmation</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" id="password_confirmation"
                                        name="password_confirmation" placeholder="password_confirmation">
                                </div>
                                @error('password_confirmation')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="profile_picture">Profile Picture</label>
                                <div class="input-group">
                                    <input type="file" id="profile_picture" name="profile_picture"
                                        value="{{old('profile_picture')}}">
                                </div>
                                @error('profile_picture')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
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