@extends('user/layouts/master')
@section('content')
<div class="container mt-3">
    <div class="row">
    @foreach($posts as $post)
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">{{$post->title}}</div>
                <div class="card-body">{{$post->content}}</div>
                <div class="card-footer">
                    <a href="{{url("post/$post->id")}}" class="btn btn-info">Detail</a>
                </div>
            </div>
        </div>
    @endforeach
    </div>
</div>
@endsection