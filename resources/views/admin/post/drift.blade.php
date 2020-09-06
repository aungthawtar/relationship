@extends('admin/layouts/master')
@section('content')
<div class="container mt-3">
<a href="{{url("admin/post")}}" class="btn btn-primary btn-sm">Back</a>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Post Title</th>
                        <th>Post Content</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    @foreach($posts as $post)
                        <td>{{$post->id}}</td>
                        <td>{{$post->title}}</td>
                        <td>{{$post->content}}</td>
                        <td>
                            <a href="{{url("admin/post/$post->id/restore")}}" class="btn btn-primary btn-sm">Restore</a>
                            <a href="{{url("admin/post/$post->id/fdelete")}}" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    @endforeach
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection