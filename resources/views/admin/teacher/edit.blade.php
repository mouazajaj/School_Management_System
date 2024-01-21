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
                <form action="{{route('teacher.edit',$teacher->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="name">Name</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Name"
                                        value="{{$teacher->name}}">
                                </div>
                                @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="gender">gender</label>
                                <select class="form-control" name="gender" id="gender">
                                    <option value="null">Select Gender</option>
                                    <option value="m" @selected($teacher->gender=='m') >Male</option>
                                    <option value="f" @selected($teacher->gender=='f')>Female</option>
                                </select>
                                @error('gender')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="date_of_birth">Date Of Birth</label>
                                <div class="input-group">
                                    <input type="date" class="form-control" id="date_of_birth" name="date_of_birth"
                                        placeholder="date_of_birth" value="{{$teacher->date_of_birth}}">
                                </div>
                                @error('date_of_birth')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="mobile_phone">Mobile Number</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="mobile_phone" name="mobile_phone"
                                        placeholder="Mobile Phone" value="{{$teacher->mobile_phone}}">
                                </div>
                                @error('mobile_phone')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="address">address</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="address" name="address"
                                        placeholder="address" value="{{$teacher->address}}">
                                </div>
                                @error('address')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="status">Status</label>
                                <div class="input-group">
                                    <select class="form-control" name="status" id="status">
                                        <option value="1" @selected($teacher->status=='1')>Active</option>
                                        <option value="0" @selected($teacher->status=='0')>InActive</option>
                                    </select>
                                </div>
                                @error('status')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="qualification">qualification</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="qualification" name="qualification"
                                        placeholder="qualification" value="{{$teacher->qualification}}">
                                </div>
                                @error('qualification')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="experience">experience</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="experience" name="experience"
                                        placeholder="experience" value="{{$teacher->experience}}">
                                </div>
                                @error('experience')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="note">note</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="note" name="note" placeholder="note"
                                        value="{{$teacher->note}}">
                                </div>
                                @error('note')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="email">Email</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="email" name="email" placeholder="email"
                                        value="{{$teacher->email}}">
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
                                    <img src="{{asset('assets/img/profiles/'.$teacher->profile_picture)}}" width="100">
                                    <input type="file" id="profile_picture" name="profile_picture" class="ml-5 mt-3"
                                        value="{{$teacher->profile_picture}}">
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