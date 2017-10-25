@extends('layouts.admin')

@section('content')
    @if(Session::has('info'))
        <div class="alert alert-info" role="alert">
            {{Session::get('info')}}
        </div>
    @endif
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('admin.create') }}" class="btn btn-success">New Post</a>
        </div>
    </div>
    @foreach($posts as $post)
    <hr>
    <div class="row">
        <div class="col-md-12">
            <p><strong>{{$post->title}}</strong>
                <a href="{{ route('admin.edit',$post->id) }}">Edit</a>
                <a href="{{ route('admin.delete',$post->id) }}">Delete</a></p>
            </p>

        </div>
    </div>
    @endforeach
@endsection