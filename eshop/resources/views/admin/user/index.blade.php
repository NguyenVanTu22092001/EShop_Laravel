@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>User</h4>
        </div>
        <div class="card-body">
            <table class="table table-bordered ">
                <thead>
                    <tr>
                        <th>Number</th>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 0;
                    @endphp
                    @foreach ($users as $item)
                        @php
                            $i++;
                        @endphp
                        <tr>
                            <th>{{ $i }}</th>
                            <th>{{ $item->id }}</th>
                            <th>{{ $item->name }}</th>
                            <th>{{ $item->email }}</th>
                            <th>{{ $item->phone }}</th>
                            <th>

                                <a href="{{ url('view-users/' . $item->id) }}" class="btn btn-primary">View</a>

                                <a href="{{ url('update-user-admin/'.$item->id) }}">
                                    <button onclick="return confirm('Bạn muốn người dùng này trở thành admin?')"
                                        class="btn btn-danger">Update</button>
                                </a>

                            </th>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
