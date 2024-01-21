@if (Session::has('error'))
<div class="alert alert-danger alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert">
        <i class="fa fa-times"></i>
    </button>
    <strong>Error !</strong> {{ session('error') }}
</div>
@endif

@if (Session::has('success'))
<div class="alert alert-success" role="alert">
    {{ session('success') }}
</div>
@endif