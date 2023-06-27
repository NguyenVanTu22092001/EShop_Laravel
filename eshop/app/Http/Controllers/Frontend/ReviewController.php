<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Order;
use App\Models\Review;
use App\Models\Product;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function add($product_slug)
    {
        $product = Product::where('slug', $product_slug)->where('status', 1)->first();
        if ($product) {
            $prod_id = $product->id;
            $review= Review::where('user_id', Auth::id())->where('prod_id', $prod_id)->first();
            if ($review) {
                return view('frontend.review.edit')->with(compact('review'));
            } else {
                $verified_purchase = Order::where('orders.user_id', Auth::id())->join('order_items', 'orders.id', 'order_items.order_id')->where('order_items.prod_id', $prod_id)->get();
                if ($verified_purchase->count() > 0) {
                    return view('frontend.review.index')->with(compact('verified_purchase', 'product'));
                } else {
                    return redirect()->back()->with('status', 'You cannot review this product without purchase');
                }
            }
        } else {
            return redirect()->back()->with('status', 'The link you followed was broken');
        }
    }
    public function create(Request $request)
    {
        $prod_id = $request->input('prod_id');
        $product = Product::where('id', $prod_id)->where('status', '1')->first();
        if ($product) {
            $user_review = $request->input('user_review');
            $new_review = Review::create([
                'user_id' => Auth::id(),
                'prod_id' => $prod_id,
                'user_review' => $user_review,
            ]);
            $category_slug = $product->category->slug;
            $prod_slug = $product->slug;
            return redirect('category/' . $category_slug . '/' . $prod_slug)->with('status', 'Thank you for writing a review');
        }
    }
    public function edit($product_slug)
    {
        $product = Product::where('slug', $product_slug)->where('status', '1')->first();
        if ($product) {
            $prod_id = $product->id;
            $review = Review::where('user_id', Auth::id())->where('prod_id', $prod_id)->first();
            if ($review) {
                return view('frontend.review.edit')->with(compact('review'));
            } else {
                return redirect()->back()->with('status', 'The link you follow was broken');
            }
        }
    }
    public function update(Request $request)
    {
        $user_review = $request->input('user_review');
        if ($user_review != '') {
            $review_id = $request->input('review_id');
            $review = Review::where('id', $review_id)->where('user_id', Auth::id())->first();
            if ($review) {
                $review->user_review = $user_review;
                $review->update();
                return redirect('category/' . $review->product->category->slug . '/' . $review->product->slug)->with('status', 'Review Updated Successfully');
            } else {
                return redirect()->back()->with('status', 'The link you followed was broken');
            }
        } else {
            return redirect()->back()->with('status', 'You cannot submit an empty review');
        }
    }
}
