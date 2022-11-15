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
                <!-- @csrf -->
                
                <!-- <form action="storeproduct" method="post">
                    <input type="text" name="_token" value="{{ csrf_token() }}" id="_token">
                    <input type="text" name="title">
                    <input type="submit" name="submit" value="ADD">
                </form> -->
                {!! Form::open(['url' => 'storeproduct']) !!}
                <div class="row">
                    <div class="col-md-4">
                        <div class="row mt-3">
                            <div class="col">
                                <label for="">Product Title</label>
                                {{ Form::text("title","",(['class' => 'form-control','placeholder'=>'Enter Title'] )) }}
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                {{ Form::label('discription', 'Product Discription'); }}
                                {{ Form::textarea("discription","",(['class' => 'form-control','placeholder'=>'Enter Discription'] )) }}
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                            <label for="">Product Price</label>
                                {{ Form::text("price","",(['class' => 'form-control','placeholder'=>'Enter Price'] )) }}
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                            <label for="">Product Quantity</label>
                                {{ Form::text("quantity","",(['class' => 'form-control','placeholder'=>'Enter Quantity'] )) }}
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <input type="submit" class="btn btn-primary" name="btn-save" value="ADD" id="btn-save">
                            </div>
                        </div>
                    </div>
                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>


</div>

@endsection