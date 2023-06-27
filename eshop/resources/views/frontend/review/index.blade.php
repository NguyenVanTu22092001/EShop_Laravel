@extends('layouts.front')

@section('title')
    EShop
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h5>You are writing a review for {{$product->name}}</h5>
                    <form action="{{url('add-review')}}" method="post">
                        @csrf
                        <input type="hidden" name="prod_id" value="{{$product->id}}">
                        <textarea class="form-control" style="resize: none" rows="7" name="user_review" placeholder="Write a review"></textarea>
                        <button type="submit" class="btn btn-primary mt-3">Submit Review</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
@endsection
