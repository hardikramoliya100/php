@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">All Product</div>

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