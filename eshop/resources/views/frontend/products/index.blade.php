@extends('layouts.front')

@section('title')
    EShop
@endsection

@section('content')
    <div class="py-3 mb-4 shadow-sm bg-warning border-top">
        <div class="container">
            <h6 class="mb-0"><a href="{{ url('/') }}">Home</a> / <a
                    href="{{ url('view-category/' . $category->slug) }}">{{ $category->name }}</a></h6>
        </div>
    </div>

    <div class="container mt-3">
        <div class="row">
            <h2>{{ $category->name }}</h2>
            @foreach ($products as $prod)
                <div class="col-md-3 mt-3">
                    <a href="{{ url('category/' . $category->slug . '/' . $prod->slug) }}">
                        <div class="card">

                            <img src="{{ asset('assets/uploads/product/' . $prod->image) }}" alt="Product image">
                            <div class="card-body">
                                <h5>{{ $prod->name }}</h5>
                                <span class="float-start">{{ number_format($prod->selling_price) }}</span>
                                @if ($prod->selling_price != $prod->original_price)
                                    <span class="float-end"><s>{{ number_format($prod->original_price) }}</s></span>
                                @endif
                            </div>

                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@section('scripts')
@endsection
