@extends('user/layouts/master')
@section('content')
<div class="container mt-3">
    <div class="row">
        <div class="col-md-4">
        <a href="{{url("post")}}" class="btn btn-primary mb-3">Back</a>
            <div class="card">
                <div class="card-header">{{$post->title}}</div>
                <div class="card-body">{{$post->content}}</div>
                <div class="card-footer">
                    <form method="post">
                    @csrf
                        <div>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>{{$likes->count()}}</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <span>{{$dislikes->count()}}</span>
                        </div>
                        <button type="submit" formaction="{{url("/post/$post->id/like")}}" class="btn btn-primary">Like</button>
                        <button type="submit" formaction="{{url("/post/$post->id/dislike")}}" class="btn btn-danger">Dislike</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection