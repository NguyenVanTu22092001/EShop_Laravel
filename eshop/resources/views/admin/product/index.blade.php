@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Product</h4>
    </div>
    <div class="card-body">
        <table class="table table-bordered ">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Category</th>
                    <th>Name</th>
                    {{-- <th>Slug</th>
                    <th>Small Description</th> --}}
                    <th>Description</th>
                    <th>Original Price</th>
                    <th>Selling Price</th>
                    <th>Quantity</th>
                    <th>Tax</th>
                    <th>Status</th>
                    <th>Trending</th></th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $i=0
                @endphp
                @foreach ($products as $item )
                @php
                    $i++
                @endphp
                <tr>
                    <th>{{$i}}</th>
                    <th>{{$item->category->name}}</th>
                    <th>{{$item->name}}</th>
                    {{-- <th>{{$item->slug}}</th>
                    <th>{{$item->small_description}}</th> --}}
                    <th>{{$item->description}}</th>
                    <th>{{$item->original_price}}</th>
                    <th>{{$item->selling_price}}</th>
                    <th>{{$item->qty}}</th>
                    <th>{{$item->tax}}</th>
                    @if ($item->status ==  '1')
                    <th>Hiển thị</th>
                    @else
                    <th>Không hiển thị</th>
                    @endif

                    @if ($item->trending ==  '1')
                    <th>Hot trend</th>
                    @else
                    <th>No</th>
                    @endif
                    <th>
                        <img src="{{asset('assets/uploads/product/'.$item->image)}}" alt="Image here" class="cate-image">
                    </th>
                    <th>
                        <a href="{{url('edit-product/'.$item->id)}}" class="btn btn-primary">Edit</a>
                        <a href="{{url('delete-product/'.$item->id)}}" class="btn btn-danger">Delete</a>
                    </th>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
