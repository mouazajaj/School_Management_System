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
                <form action="{{route('parent.update',$parent->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="name">Name</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Name"
                                        value="{{$parent->name}}">
                                </div>
                                @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="gender">gender</label>
                                <select class="form-control" name="gender" id="gender">
                                    <option value="null">Select Gender</option>
                                    <option value="m" @selected($parent->gender=='m')>Male</option>
                                    <option value="f" @selected($parent->gender=='f')>Female</option>
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="date_of_birth">Date Of Birth</label>
                                <div class="input-group">
                                    <input type="date" class="form-control" id="date_of_birth" name="date_of_birth"
                                        placeholder="date_of_birth" value="{{$parent->date_of_birth}}">
                                </div>
                                @error('date_of_birth')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="form-group col-md-6">
                                <label for="mobile_phone">Mobile Number</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="mobile_phone" name="mobile_phone"
                                        placeholder="Mobile Phone" value="{{$parent->mobile_phone}}">
                                </div>
                                @error('mobile_phone')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="form-group col-md-6">
                                <label for="profile_picture">Profile Picture</label>
                                <div class="input-group">
                                    <img src="{{asset('assets/img/profiles/'.$parent->profile_picture)}}" width="100">
                                    <input type="file" id="profile_picture" name="profile_picture" class="ml-5 mt-3"
                                        value="{{$parent->profile_picture}}">
                                </div>
                                @error('profile_picture')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="address">address</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="address" name="address"
                                        placeholder="address" value="{{$parent->address}}">
                                </div>
                                @error('address')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="status">Status</label>
                                <div class="input-group">
                                    <select class="form-control" name="status" id="status">
                                        <option value="1" @selected($parent->status=='1')>Active</option>
                                        <option value="0" @selected($parent->status=='0')>InActive</option>
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
                                        value="{{$parent->email}}">
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
                                @error('email')
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