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
                <div class="col-sm-6" style="text-align:right;">
                    <a href="{{route('teacher.add')}}" class="btn btn-primary">Add New
                        teacher</a>
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

                        <div class="form-group col-md-3">
                            <label for="name">Emaiil</label>

                            <div class="input-group">
                                <input type="email" class="form-control" id="email" placeholder="email" name="email"
                                    value="{{Request::get('email')}}">
                            </div>
                        </div>

                        <div class="form-group col-md-3">
                            <label for="status">Status</label>
                            <div class="input-group">
                                <select class="form-control" name="status" id="status">
                                    <option value="null">Select Status</option>
                                    <option value="1">Active</option>
                                    <option value="0">InActive</option>
                                </select>
                            </div>
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
                <div class="card-body p-0" style="overflow:auto">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Profile Picture</th>
                                <th>Name</th>
                                <th>Eamil</th>
                                <th>Gender</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Status</th>
                                <th>Birth Date</th>
                                <th>Qualification</th>
                                <th>Experience</th>
                                <th>Note</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($teachers as $value)
                            <tr>
                                <td>{{$value->id}}</td>
                                <td><img src="{{asset('assets/img/profiles/'.$value->profile_picture)}}"
                                        style="border-radius:50px; height:50px; width:50px;">
                                </td>
                                <td>{{$value->name}}</td>
                                <td>{{$value->email}}</td>
                                <td>{{$value->gender}}</td>
                                <td>{{$value->mobile_phone}}</td>
                                <td>{{$value->address}}</td>
                                <td>{{$value->status}}</td>
                                <td>{{$value->date_of_birth}}</td>
                                <td>{{$value->qualification}}</td>
                                <td>{{$value->experience}}</td>
                                <td>{{$value->note}}</td>
                                <td>{{date('d-m-Y H:i A',strtotime($value->created_at))}}</td>
                                <td style="min-width:150px;">
                                    <a href="{{route('teacher.edit',$value->id)}}"
                                        class="btn btn-primary btn-sm">Edit</a>
                                    <a href="{{route('teacher.delete',$value->id)}}"
                                        class="btn btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div style="padding:10px;float:right;">
                        {{ $teachers->links() }}
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