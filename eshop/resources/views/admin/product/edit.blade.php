@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Add Product</h4>
        </div>
        <div class="card-body">
            <form action="{{ url('update-product/'.$products->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="" class="form-label">Category</label>
                        <select class="form-select" aria-label="Test" name="cate_id">
                            <option value="">Select Category</option>
                            @foreach ($category as $cate)
                                <option value="{{ $cate->id }}" @if($cate->id==$products->cate_id) selected @else @endif>{{ $cate->name }}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" value="{{$products->name}}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label fpr="" class="form-label">Slug</label>
                        <input type="text" class="form-control" name="slug" value="{{$products->slug}}">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label fpr="" class="form-label">Small Description</label>
                        <textarea name="small_description" row="3" class="form-control">{{$products->small_description}}</textarea>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label fpr="" class="form-label">Description</label>
                        <textarea name="description" row="3" class="form-control">{{$products->description}}</textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="" class="form-label">Original Price</label>
                        <input type="number" class="form-control" name="original_price" value="{{$products->original_price}}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="" class="form-label">Selling Price</label>
                        <input type="number" class="form-control" name="selling_price" value="{{$products->selling_price}}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="" class="form-label">Tax</label>
                        <input type="number" class="form-control" name="tax" value="{{$products->tax}}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="" class="form-label">Quantity</label>
                        <input type="number" class="form-control" name="qty" value="{{$products->qty}}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="" class="form-label">Status</label>
                        <input type="checkbox" @if ($products->status == '1')
                        checked
                        @else

                        @endif class="form-check-input" name="status">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="" class="form-label">Trending</label>
                        <input type="checkbox" @if ($products->trending == '1')
                        checked
                        @else

                        @endif class="form-check-input" name="trending">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for=""class="form-label">Meta title</label>
                        <input type="text" class="form-control" name="meta_title" value="{{$products->meta_title}}">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="" class="form-label">Meta Description</label>
                        <textarea name="meta_description" row="3" class="form-control" >{{$products->meta_description}}</textarea>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for=""class="form-label">Meta Keywords</label>
                        <textarea name="meta_keywords" row="3" class="form-control">{{$products->meta_keywords}}</textarea>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for=""class="form-label">Image</label>
                        <input type="file" class="form-control" name="image">
                        @if ($products->image)
                        <img src="{{asset('assets/uploads/product/'.$products->image)}}" class="cate-image">
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
