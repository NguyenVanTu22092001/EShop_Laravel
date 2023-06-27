@extends('layouts.front')

@section('title')
    EShop
@endsection

@section('content')
    @include('layouts.inc.slider')


    <div class="py-5">
        <div class="container">
            <div class="row">
                <h2>Featured Product</h2>

                @foreach ($featured_products as $prod)
                    <div class="col-md-3 mt-3">
                        <a href="{{ url('category/' . $prod->category->slug . '/' . $prod->slug) }}">
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
    </div>
    <div class="py-5">
        <div class="container">
            <div class="row">
                <h2>Trending Category</h2>
                @foreach ($trending_category as $tcategory)
                    <div class="col-md-3 mt-3">
                        <a href="{{ url('view-category/' . $tcategory->slug) }}">
                            <div class="card">
                                <img src="{{ asset('assets/uploads/category/' . $tcategory->image) }}" alt="Product image">
                                <div class="card-body">
                                    <h5>{{ $tcategory->name }}</h5>
                                    <p>{{ $tcategory->description }}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
