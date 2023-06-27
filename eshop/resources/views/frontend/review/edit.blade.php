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
                    <h5>You are writing a review for {{$review->product->name}}</h5>
                    <form action="{{url('update-review')}}" method="post">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="review_id" value="{{$review->id}}">
                        <textarea class="form-control" style="resize: none" rows="7" name="user_review" >{{$review->user_review}}</textarea>
                        <button type="submit" class="btn btn-primary mt-3">Update Review</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
@endsection
