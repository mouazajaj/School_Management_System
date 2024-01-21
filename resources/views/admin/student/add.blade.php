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
                <form action="{{route('student.insert')}}" method="post" enctype="multipart/form-data">
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
                                <label for="email">Email</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="email" name="email" placeholder="Email"
                                        value="{{old('email')}}" required>
                                </div>
                                @error('email')
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
                                <label for="mobile_phone">Mobile Number</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="mobile_phone" name="mobile_phone"
                                        placeholder="Mobile Phone" value="{{old('mobile_phone')}}">
                                </div>
                                @error('mobile_phone')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="status">Status</label>
                                <div class="input-group">
                                    <select class="form-control" name="status" id="status">
                                        <option value="">Select</option>
                                        <option value="1">Active</option>
                                        <option value="0">InActive</option>
                                    </select>
                                </div>
                                @error('status')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="admission_number">Admission number</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="admission_number"
                                        name="admission_number" placeholder="Admission Number"
                                        value="{{old('admission_number')}}" required>
                                </div>
                                @error('admission_number')
                                <div class="alert alert-danger ">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="roll_number">Roll Number</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="roll_number" roll_number="roll_number"
                                        placeholder="Roll Number" value="{{old('roll_number')}}">
                                </div>
                                @error('roll_number')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="parent_id">Parent</label>
                                <select class="form-control" name="parent_id" id="parent_id"
                                    placeholder="Seletc Parent">
                                    <option value="">Select Parent</option>
                                    @foreach($parents as $value)
                                    <option value="{{$value->id}}">{{$value->name}}
                                    </option>
                                    @endforeach
                                </select>
                                @error('parent_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="email">Password</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" id="password" name="password"
                                        placeholder="Password" required>
                                </div>
                                @error('password')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="password_confirmation">Password Confirmation</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" id="password_confirmation"
                                        name="password_confirmation" placeholder="Password_confirmation" required>
                                </div>
                                @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-md-4">
                                <label for="class_id">Class</label>
                                <select class="form-control" name="class_id" id="class_id" placeholder="Seletc class"
                                    required>
                                    <option value="">Select Class</option>
                                    @foreach($classes as $value)
                                    <option value="{{$value->id}}">{{$value->name}}
                                    </option>
                                    @endforeach
                                </select>
                                @error('class_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-md-4">
                                <label for="gender">gender</label>
                                <select class="form-control" name="gender" id="gender" required>
                                    <option value="">Select Gender</option>
                                    <option value="m">Male</option>
                                    <option value="f">Female</option>
                                </select>
                                @error('gender')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="form-group col-md-4">
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