@extends('admin/layouts/master')
@section('content')
<div class="container mt-3">
<a href="{{url("admin/category/create")}}" class="btn btn-primary mb-3">Create</a> 
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{$category->id}}</td>
                        <td>{{$category->title}}</td>
                        <td>
                            <a href="{{url("admin/category/$category->id/edit")}}" class="btn btn-info">Edit</a>
                            <a href="{{url("admin/category/$category->id/delete")}}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection