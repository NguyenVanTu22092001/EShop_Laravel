@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Imformation User</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">

                            <div class="col-md-4 mt-3">
                                <label>Role</label>
                                <div class="border p-2">{{ $users->role_as == '1' ? 'Admin' : 'Customer' }}</div>
                            </div>
                            <div class="col-md-4 mt-3">
                                <label>First Name</label>
                                <div class="border p-2">{{ $users->name }}</div>
                            </div>
                            <div class="col-md-4 mt-3">
                                <label>Last Name</label>
                                <div class="col-md-4 mt-3">{{ $users->lname }}</div>
                            </div>
                            <div class="col-md-4 mt-3">
                                <label>Email</label>
                                <div class="border p-2">{{ $users->email }}</div>
                            </div>
                            <div class="col-md-4 mt-3">
                                <label>Phone</label>
                                <div class="border p-2">{{ $users->phone }}</div>
                            </div>
                            <div class="col-md-4 mt-3">
                                <label> Address 1</label>
                                <div class="border p-2">{{ $users->address1 }}</div>
                            </div>
                            <div class="col-md-4 mt-3">
                                <label> Address 2</label>
                                <div class="border p-2">{{ $users->address2 }}</div>
                            </div>
                            <div class="col-md-4 mt-3">
                                <label> City</label>
                                <div class="border p-2">{{ $users->city }}</div>
                            </div>
                            <div class="col-md-4 mt-3">
                                <label> State</label>
                                <div class="border p-2">{{ $users->state }}</div>
                            </div>
                            <div class="col-md-4 mt-3">
                                <label> Cuntry</label>
                                <div class="border p-2">{{ $users->country }}</div>
                            </div>
                            <div class="col-md-4 mt-3">
                                <label>Pincode</label>
                                <div class="border p-2">{{ $users->pincode }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
