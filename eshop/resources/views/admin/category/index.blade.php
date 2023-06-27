@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Category</h4>
    </div>
    <div class="card-body">
        <table class="table table-bordered ">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $i=0
                @endphp
                @foreach ($category as $item )
                @php
                    $i++
                @endphp
                <tr>
                    <th>{{$i}}</th>
                    <th>{{$item->name}}</th>
                    <th>{{$item->description}}</th>
                    <th>
                        <img src="{{asset('assets/uploads/category/'.$item->image)}}" alt="Image here" class="cate-image">
                    </th>
                    <th>
                        <a href="{{url('edit-category/'.$item->id)}}" class="btn btn-primary">Edit</a>
                        <a href="{{url('delete-category/'.$item->id)}}" class="btn btn-danger">Delete</a>
                    </th>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
