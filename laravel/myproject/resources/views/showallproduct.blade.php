@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-10">
                            All Product
                        </div>
                        <div class="col-md-2"><a class="btn btn-sm btn-info text-light" href="addnewproduct">Add New</a></div>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Sr</th>
                                <th>title</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Quntity</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                        @php
                        $sr = 0
                        @endphp
                        @foreach($productdata as $data)
                        @php
                        $sr++
                        @endphp
                        <tr>
                            <th>{{ $sr }}</th>
                            <th>{{ $data->titel }}</th>
                            <th>{{ $data->discription }}</th>
                            <th>{{ $data->price }}</th>
                            <th>{{ $data->quantity }}</th>
                            <th>{{ $data->id }}</th>
                        </tr>

                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection