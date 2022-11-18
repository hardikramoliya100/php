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
                        <div class="col-md-2"><a class="btn btn-sm btn-primary text-light" href="pdf">PDF</a></div>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-bordered">
                        <thead class="bg-dark text-light ">
                            <tr>
                                <th>Sr</th>
                                <th>title</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Quntity</th>
                                <th class="col col-lg-2">Action</th>
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
                            <th>{{ $data->title }}</th>
                            <th>{{ $data->discription }}</th>
                            <th>{{ $data->price }}</th>
                            <th>{{ $data->quantity }}</th>
                            <th>
                                <a href="editproduct/{{ $data->id }}" class="btn btn-primary btn-sm">Edit</a>
                                <a href="deleteproduct/{{ $data->id }} "class="btn btn-danger btn-sm">Delete</a>
                            </th>
                        </tr>

                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection