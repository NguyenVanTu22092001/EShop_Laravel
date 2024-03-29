<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Rating;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{
    public function add(Request $request){
        $stars_rated =$request->input('product_rating');
        $prod_id=$request->input('prod_id');

        $product_check=Product::where('id', $prod_id)->where('status', '1')->first();

        if($product_check){
            $verified_purchase=Order::where('orders.user_id', Auth::id())->join('order_items', 'orders.id', 'order_items.order_id')->where('order_items.prod_id', $prod_id)->get();
            if($verified_purchase->count() > 0){
                $existing_rating=Rating::where('user_id', Auth::id())->where('prod_id', $prod_id)->first();
                if($existing_rating){
                    $existing_rating->stars_rated=$stars_rated;
                    $existing_rating->update();
                }else{
                    Rating::create([
                        'user_id'=> Auth::id(),
                        'prod_id'=> $prod_id,
                        'stars_rated'=>$stars_rated,
                    ]);
                }
                return redirect()->back()->with('status', 'Thank you for rating this product');
            }else{
                return redirect()->back()->with('status', 'You cannot rate this product without purchase');
            }
        }else{
            return redirect()->back()->with('status', 'The link you followed was broken');
        }
    }

}
