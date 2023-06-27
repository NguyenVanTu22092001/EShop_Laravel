@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 >Order View

                        </h4>
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
                                <label>Phone</label>
                                <div class="border p-2">{{ $orders->pincode }}</div>
                            </div>
                            <div class="col-md-6">
                                <h2>Order Details</h2>
                                <hr>
                                <table class="table text-center">
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
                                <h3 class="px-2">Grand Total: <span class="float-end">{{ number_format($total) }}</span>
                                </h3>
                                <div class="mt-3 px-2">
                                    <label>Order Status</label>
                                    <form action="{{ url('update-order/' . $orders->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <select class="form-select" aria-label="" name="status">
                                            <option {{ $orders->status == '0' ? 'selected' : '' }} value="0">Pending
                                            </option>
                                            <option {{ $orders->status == '1' ? 'selected' : '' }} value="1">Completed
                                            </option>
                                        </select>
                                        <button type="submit" class="btn btn-primary mt-3">Update</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
