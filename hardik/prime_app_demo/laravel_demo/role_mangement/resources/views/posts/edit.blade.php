@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit Role</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('posts.index') }}"> Back </a>
        </div>
    </div>
</div>


@if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong> something went wrong.<br><br>
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif

{!! Form::model($post, ['method' => 'PATCH','route' => ['posts.update', $post->id]]) !!}
<div class="row mt-3">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Title:</strong>
            {!! Form::text('title', null, array('placeholder' => 'Title','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
        <div class="form-group">
            <strong>Category:</strong>
            {!! Form::text('category', null, array('placeholder' => 'Title','class' => 'form-control')) !!}           
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
        <div class="form-group">
            <strong>Tag:</strong>
            {!! Form::text('tag', null, array('placeholder' => 'Title','class' => 'form-control')) !!}           
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
        <div class="form-group">
            <strong>Description:</strong>
            {!! Form::text('description', null, array('placeholder' => 'Title','class' => 'form-control')) !!}           
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
        <div class="form-group">
            <strong>Status:</strong><br>
            {{ Form::radio('status', 'published', ($post->status == 'published')); }} Published
            {{ Form::radio('status', 'draft', ($post->status == 'draft')); }} Draft
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
        
    </div>
</div>
{!! Form::close() !!}


@endsection