@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Product</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('posts.index') }}"> Back </a>
        </div>
    </div>
</div>

@if ($errors->any())
<div class="alert alert-danger">
    <strong>Whoops!</strong> Something went wrong.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('posts.store') }}" method="POST">
    @csrf


    <div class="form-group mt-3">
        
        <label for="">Post Title</label>
        <input type="text" class="form-control" name="title" id="title" placeholder="Enter Title">
    </div>
    <div class="form-group mt-3">
        <label for="">Post Category</label>
        <input type="text" class="form-control" name="category" id="category" placeholder="Enter Category">
    </div>
    <div class="form-group mt-3">
        <label for="">Post Tage</label>
        <input type="text" class="form-control" name="tag" id="tag" placeholder="Enter Tage">
    </div>
    <div class="form-group mt-3">
        <label for="">Post Discription</label>
        <textarea class="form-control" name="description" id="description" cols="30" rows="5"></textarea>
        <!-- <input type="text" class="form-control" name="description" id="description" placeholder="Enter Description"> -->
    </div>
    <div class="form-group mt-3">
        <input type="radio" name="status" value="published" id="status"> <label for="status"> Published</label>
        <input type="radio" name="status" value="draft" id="status"> <label for="status"> Draft</label>
    </div>
    <div class="row mt-2">
        <div class="col-md-4 offset-5">
            <button class="btn btn-primary" onclick="newpost()">Add</button>
        </div>
    </div>

</form>
@endsection