@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Edit Category</h4>
        </div>
        <div class="card-body">
            <form action="{{url('update-category/'.$category->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" value="{{$category->name}}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label fpr="" class="form-label">Slug</label>
                        <input type="text" class="form-control" name="slug" value="{{$category->slug}}">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label fpr="" class="form-label">Description</label>
                        <textarea name="description" row="3" class="form-control">{{$category->name}}</textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="" class="form-label">Status</label>
                        <input type="checkbox" {{$category->status =="1" ?'checked':''}} class="form-check-input" name="status">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="" class="form-label">Popular</label>
                        <input type="checkbox" {{$category->popular =="1" ?'checked':''}} class="form-check-input" name="popular">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label fpr=""class="form-label">Meta title</label>
                        <input type="text" class="form-control" name="meta_title" value="{{$category->meta_title}}">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label fpr="" class="form-label">Meta Description</label>
                        <textarea name="meta_descrip" row="3" class="form-control">{{$category->meta_descrip}}</textarea>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label fpr=""class="form-label">Meta Keywords</label>
                        <textarea name="meta_keywords" row="3" class="form-control">{{$category->meta_keywords}}</textarea>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label fpr=""class="form-label">Image</label>
                        <input type="file" class="form-control"  name="image">
                        <br>
                        @if($category->image)
                        <img src="{{asset('assets/uploads/category/'.$category->image)}}" class="cate-image">
                        @endif
                    </div>
                    <div class="col-md-12 mb-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
