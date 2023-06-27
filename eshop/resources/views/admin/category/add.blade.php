@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Add Category</h4>
        </div>
        <div class="card-body">
            <form action="{{url('insert-category')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label fpr="" class="form-label">Slug</label>
                        <input type="text" class="form-control"  name="slug">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label fpr="" class="form-label">Description</label>
                        <textarea name="description" row="3" class="form-control" ></textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="" class="form-label">Status</label>
                        <input type="checkbox" class="form-check-input" name="status">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="" class="form-label">Popular</label>
                        <input type="checkbox" class="form-check-input" name="popular">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label fpr=""class="form-label">Meta title</label>
                        <input type="text" class="form-control" name="meta_title">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label fpr="" class="form-label">Meta Description</label>
                        <textarea name="meta_descrip" row="3" class="form-control"></textarea>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label fpr=""class="form-label">Meta Keywords</label>
                        <textarea name="meta_keywords" row="3" class="form-control"></textarea>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label fpr=""class="form-label">Image</label>
                        <input type="file" class="form-control"  name="image">
                    </div>
                    <div class="col-md-12 mb-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
