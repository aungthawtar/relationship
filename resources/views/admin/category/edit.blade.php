@extends('admin/layouts/master')
@section('content')
<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card card-body">
                <form action="" method="post">
                @csrf
                    <div class="form-group">
                        <label for="">Title</label>
                        <input type="text" class="form-control" name="title" value="{{$category->title}}">                 
                    </div>
                    <button class="btn btn-primary" type="submit">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection