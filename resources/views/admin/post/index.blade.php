@extends('admin/layouts/master')
@section('content')
<div class="container mt-3">
<a href="{{url("admin/post/create")}}" class="btn btn-primary mb-3">Create</a>  
<a href="{{url("admin/post/drift")}}" class="btn btn-info mb-3">Drift</a>  
    <div class="row justify-content-center">
    @foreach($posts as $post)
        <div class="col-md-4 mb-3">
            <div class="card mb-2">
                <div class="card-header">{{$post->title}}</div>
                <div class="card-body">
                <img src="{{asset('uploads/'.$post->image)}}" style="width:300px; height:300px;" alt="">
                {{$post->content}}</div>
                <a href="">{{$post->category->title}}</a>
                <div class="card-footer">
                    <a href="{{url("admin/post/$post->id/edit")}}" class="btn btn-info">Edit</a>
                    <a href="{{url("admin/post/$post->id/delete")}}" class="btn btn-danger">Delete</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection