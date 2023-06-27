@extends('layouts.front')

@section('title')
    EShop
@endsection

@section('content')
    <div class="py-3 mb-4 shadow-sm bg-warning border-top">
        <div class="container">
            <h6 class="mb-0"><a href="{{ url('/') }}">Home</a> / <a href="{{ url('my-orders') }}">Order</a></h6>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Order View</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">

                            <div class="col-md-6 order-details">
                                <h2>Shipping Details</h2>
                                <hr>
                                <label>First Name</label>
                                <div class="border p-2">{{ $orders->fname }}</div>
                                <label>Last Name</label>
                                <div class="border p-2">{{ $orders->lname }}</div>
                                <label>Email</label>
                                <div class="border p-2">{{ $orders->email }}</div>
                                <label>Phone</label>
                                <div class="border p-2">{{ $orders->phone }}</div>
                                <label>Shipping Address</label>
                                <div class="border p-2">{{ $orders->address1 }}, {{ $orders->address2 }},
                                    {{ $orders->city }}, {{ $orders->state }}, {{ $orders->country }}</div>
                                <label>Pincode</label>
                                <div class="border p-2">{{ $orders->pincode }}</div>
                            </div>
                            <div class="col-md-6">
                                <h2>Order Details</h2>
                                <hr>
                                <table class="table table-bordered text-center">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>Image</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $total = 0;
                                        @endphp
                                        @foreach ($orders->orderitems as $item)
                                            @php
                                                $total += $item->qty * $item->products->selling_price;
                                            @endphp
                                            <tr>
                                                <td>{{ $item->products->name }}</td>
                                                <td>{{ $item->qty }}</td>
                                                <td>{{ number_format($item->products->selling_price) }}</td>
                                                <td><img src="{{ asset('assets/uploads/product/' . $item->products->image) }}"
                                                        style="height: 100px;"></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <h3 class="px-2">Grand Total: <span class="float-end">{{ number_format($total) }}</span></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
