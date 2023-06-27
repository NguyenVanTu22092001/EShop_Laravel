@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Order <a href="{{url('order-history')}}" class="btn btn-primary float-end">Order History</a></h4>
                    </div>
                    <div class="card-body">
                        <table class="table text-center">
                            <thead>
                                <tr>
                                    <th>Order Date</th>
                                    <th>Track Number</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $item)
                                <tr>
                                    <td>{{date('d-m-Y', strtotime($item->created_at))}}</td>
                                    <td>{{$item->tracking_no}}</td>
                                    <td>{{$item->status =='0'?'pending':'completed'}}</td>
                                    <td><a href="{{url('admin/view-order/'.$item->id)}}" class="btn btn-outline-success">View</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
