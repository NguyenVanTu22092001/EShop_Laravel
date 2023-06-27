@extends('layouts.front')

@section('title')
    EShop
@endsection

@section('content')
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ url('/add-rating') }}" method="post">
                    @csrf
                    <input type="hidden" name="prod_id" value="{{ $products->id }}">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{ $products->name }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="rating-css">
                            <div class="star-icon">
                                @if ($user_rating)
                                    @for ($i = 1; $i <= $user_rating->stars_rated; $i++)
                                        <input type="radio" value="{{ $i }}" name="product_rating" checked
                                            id="rating{{ $i }}">
                                        <label for="rating{{ $i }}" class="fa fa-star"></label>
                                    @endfor
                                    @for ($i = $user_rating->stars_rated+1; $i <= 5  ; $i++)
                                        <input type="radio" value="{{ $i }}" name="product_rating"
                                            id="rating{{ $i }}">
                                        <label for="rating{{ $i }}" class="fa fa-star"></label>
                                    @endfor
                                @else
                                    <input type="radio" value="1" name="product_rating" checked id="rating1">
                                    <label for="rating1" class="fa fa-star"></label>
                                    <input type="radio" value="2" name="product_rating" id="rating2">
                                    <label for="rating2" class="fa fa-star"></label>
                                    <input type="radio" value="3" name="product_rating" id="rating3">
                                    <label for="rating3" class="fa fa-star"></label>
                                    <input type="radio" value="4" name="product_rating" id="rating4">
                                    <label for="rating4" class="fa fa-star"></label>
                                    <input type="radio" value="5" name="product_rating" id="rating5">
                                    <label for="rating5" class="fa fa-star"></label>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="py-3 mb-4 shadow-sm bg-warning border-top">
        <div class="container">
            <h6 class="mb-0"><a href="{{ url('/') }}">Home</a> / <a
                    href="{{ url('view-category/' . $products->category->slug) }}">{{ $products->category->name }}</a> /
                <a
                    href="{{ url('category/' . $products->category->slug . '/' . $products->slug) }}">{{ $products->name }}</a>
            </h6>
        </div>
    </div>

    <div class="container py-5">
        <div class=" product_data">
            <div class="">
                <div class="row">
                    <div class="col-md-4 border-right">
                        <img src="{{ asset('assets/uploads/product/' . $products->image) }}" class="w-100">
                    </div>
                    <div class="col-md-8">
                        <h2 class="mb-0">
                            {{ $products->name }}
                            <label
                                class="float-end badge bg-danger trending_tag">{{ $products->trending == '1' ? 'Trending' : '' }}</label>
                        </h2>
                        <hr>
                        <div class="rating">
                            @if ($ratings->count() > 0)
                                <p>{{ $ratings->count() }} ratings</p>
                            @else
                                <p> No rating</p>
                            @endif
                            @for ($i = 1; $i <= number_format($rating_value); $i++)
                                <i class="fa fa-star" style="color:#ffd900; font-size:30px;"></i>
                            @endfor
                            @for ($i = 1; $i <= 5 - number_format($rating_value); $i++)
                                <i class="fa fa-star" style="font-size:30px;"></i>
                            @endfor
                        </div>
                        <br>
                        @if ($products->original_price != $products->selling_price)
                            <label class="me-3">Original Price:
                                <s>{{ number_format($products->original_price) }}</s></label>
                        @endif
                        <label class="fw-bold">Selling Price: {{ number_format($products->selling_price) }}</></label>

                        <p class="mt-3">
                            {{ $products->small_description }}
                        </p>

                        <hr>
                        @if ($products->qty > 0)
                            <label class="badge bg-success">In stock</label>
                        @else
                            <label class="badge bg-danger">Out of stock</label>
                        @endif
                        <div class="row mt-2">
                            <div class="col-md-2">
                                <input type="hidden" value="{{ $products->id }}" class="prod_id">
                                <label for="Quantity">Quantity</label>
                                <div class="input-group text-center mb-3">
                                    <button class="input-group-text decrement-btn">-</button>
                                    <input type="text" name="quantity" class="form-control text-center qty-input"
                                        value="1">
                                    <button class="input-group-text increment-btn">+</button>
                                </div>
                            </div>
                            <div class="col-md-10">
                                <br />
                                <button type="button" class="btn btn-success me-3  float-start"> Add to Wishlist <i
                                        class="fa fa-heart"></i></button>
                                @if ($products->qty > 0)
                                    <button type="button" class="btn btn-primary me-3 addToCartBtn float-start"> Add to
                                        Cart <i class="fa fa-shopping-cart"></i></button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <hr>
                        <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            Rating this product
                        </button>
                        <a href="{{ url('add-review/' . $products->slug . '/userreview') }}"
                            class="btn btn-success">Review
                            product</a>
                    </div>
                    <div class="col-md-8">
                        <hr>
                        @foreach ($reviews as $item)
                            <div class="user-review">
                                <label class="mt-3"> {{ $item->user->name }}</label>
                                @if ($item->user_id == Auth::id())
                                    <a class="mt-3" href="{{ url('edit-review/' . $products->slug . '/userreview') }}">
                                        Edit </a>
                                @endif
                                <br>
                                @php
                                    $rating = App\Models\Rating::where('prod_id', $products->id)
                                        ->where('user_id', $item->user_id)
                                        ->first();
                                @endphp
                                @if ($rating)
                                    @for ($i = 1; $i <= $rating->stars_rated; $i++)
                                        <i class="fa fa-star checked" style="color:yellow"></i>
                                    @endfor
                                    @for ($i = $rating->stars_rated + 1; $i <= 5 ; $i++)
                                        <i class="fa fa-star "></i>
                                    @endfor
                                @endif
                                <small class="mt-3">Review on: {{ $item->created_at->format('d M Y') }}</small>

                                <p class="mt-3">{{ $item->user_review }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-12 mt-3">

                    <h3>Description</h3>
                    <div class="mt-3">
                        {{ $products->description }}
                    </div>

                </div>
                <hr>

            </div>
        </div>
    </div>
@endsection
