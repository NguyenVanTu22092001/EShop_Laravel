@extends('layouts.front')

@section('title')
    Eshop
@endsection

@section('content')

    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>All Category</h2>
                    <div class="row">
                        @foreach ($category as $cate)
                            <div class="col-md-4 mb-3">
                                <a href="{{ url('view-category/' . $cate->slug) }}">
                                    <div class="card">
                                        <img src="{{ asset('assets/uploads/category/' . $cate->image) }}" alt="Product image">
                                        <div class="card-body">
                                            <h5>{{ $cate->description }}</h5>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
