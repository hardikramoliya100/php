@extends('layouts.appadmin')

@section('content')
<div class="row">

    <!-- Area Chart -->
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Add New Product</h6>

            </div>
            <!-- Card Body -->
            <div class="card-body">
                {!! Form::open(['url' => 'foo/bar']) !!}
                  test
                {!! Form::close() !!}
            </div>
        </div>
    </div>


</div>

@endsection