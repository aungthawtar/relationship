@extends('admin/layouts/master')
@section('content')
<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card card-body">
                <form action="" method="post" enctype="multipart/form-data">
                @csrf
                    <div class="form-group">
                        <label for="">Title</label>
                        <input type="text" class="form-control" name="title">                 
                    </div>
                    <div class="form-group">
                        <label for="">Content</label>
                        <input type="text" class="form-control" name="content">                 
                    </div>

                    <div class="form-group">
                        <label for="">Category</label>
                        <select name="category_id" class="form-control">
                            <option value="">Select Category</option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->title}}</option>
                        @endforeach
                        </select>                
                    </div>

                    <div class="form-group">
                        <label for="">Image</label>
                        <input type="file" class="form-control-file" name="image">                 
                    </div>
                    <button class="btn btn-primary" type="submit">Create</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection