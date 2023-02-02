@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Products</h2>
        </div>
        <div class="pull-right">
            @can('post-create')
            <a class="btn btn-success" href="{{ route('posts.create') }}"> Create New Product </a>
            @endcan
        </div>
    </div>
</div>


@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<table class="table table-bordered mt-4">
    <tr>
        <th>Id</th>
        <th>Author</th>
        <th>Title</th>
        <th>slug</th>
        <th>Category</th>
        <th>Tag</th>
        <th>Discription</th>
        <th>Status</th>
        <th>Publich Date</th>
        <th width="280px">Action</th>
    </tr>
    @foreach ($posts as $post)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $post->name }}</td>
        <td>{{ $post->title }}</td>
        <td>{{ $post->slug }}</td>
        <td>{{ $post->category }}</td>
        <td>{{ $post->tag }}</td>
        <td>{{ $post->description }}</td>
        <td>{{ $post->status }}</td>
        <td>{{ date('m/d/Y', strtotime($post->created_at)) }}</td>
        <td>
            <form action="{{ route('posts.destroy',$post->id) }}" method="POST">
                <a class="btn btn-info" href="{{ route('posts.show',$post->id) }}">Show</a>
               
                @can('post-edit')
                <a class="btn btn-primary" href="{{ route('posts.edit',$post->id) }}">Edit</a>
                @endcan

                @if($post->user_id == $id)
                <a class="btn btn-primary" href="{{ route('posts.edit',$post->id) }}">Edit</a>
                @endif


                @csrf
                @method('DELETE')

                @can('post-delete')
                <button type="submit" class="btn btn-danger">Delete</button>
                @endcan
                
                @if($post->user_id == $id)
                <button type="submit" class="btn btn-danger">Delete</button>
                @endif
            </form>
        </td>
    </tr>
    @endforeach
</table>

{!! $posts->links() !!}



@endsection