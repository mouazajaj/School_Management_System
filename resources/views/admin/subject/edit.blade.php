@extends('layout.app')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Subject</h1>
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
                <form action="{{route('subject.update',$subject->id)}}" method="post">
                    @csrf
                    <div class="card-body">

                        <div class="form-group">
                            <label for="name">Name</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="name" placeholder="name" name="name"
                                    value="{{$subject->name}}">
                            </div>
                            @error('name')
                            <div class="alert alert-danger">{{$message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="Type">Subject Type</label>
                            <select class="form-control" id="type" name="type" value="{{$subject->type}}"
                                placeholder="Enter type" required>
                                <option value="">choose type</option>
                                <option value="theory" @selected($subject->type=='Theory')>Theory</option>
                                <option value="practical" @selected($subject->type=='Practical')>Practical</option>
                            </select>
                            @error('type')
                            <div class="alert alert-danger">{{$message }}</div>
                            @enderror
                        </div>

                        <div class="form-group ">
                            <label for="status">status</label>
                            <select class="form-control" name="status" id="status">
                                <option value="">Select status</option>
                                <option value=0 @selected($subject->status=="1")>Active</option>
                                <option value=1 @selected($subject->status=="0")>unActive</option>
                            </select>
                            @error('status')
                            <div class="alert alert-danger">{{$message }}</div>
                            @enderror
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
            </div>
            </form>
        </div>


</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection