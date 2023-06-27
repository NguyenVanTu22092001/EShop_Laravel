<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Rating;
use App\Models\Review;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    public function index()
    {
        $trending_category = Category::where('popular', '1')->take(15)->get();
        $featured_products = Product::orderBy('id', 'DESC')->where('trending', '=', '1')->take(4)->get();
        return view('frontend.index')->with(compact('featured_products', 'trending_category'));
    }
    public function category()
    {
        $category = Category::where('status', '1')->get();
        return view('frontend.category')->with(compact('category'));
    }
    public function viewcategory($slug)
    {
        if (Category::where('slug', $slug)->exists()) {
            $category = Category::where('slug', $slug)->first();
            $products = Product::where('cate_id', $category->id)->where('status', '1')->get();
            return view('frontend.products.index')->with(compact('category', 'products'));
        } else {
            return redirect('/')->with('status', 'Slug does not exist');
        }
    }
    public function viewproduct($cate_slug, $prod_slug)
    {
        if (Category::where('slug', $cate_slug)->exists()) {
            if (Product::where('slug', $prod_slug)->exists()) {
                $products = Product::where('slug', $prod_slug)->first();
                $ratings = Rating::where('prod_id', $products->id)->get();
                $rating_sum = Rating::where('prod_id', $products->id)->sum('stars_rated');
                $user_rating = Rating::where('prod_id', $products->id)->where('user_id', Auth::id())->first();
                $reviews = Review::orderBy('id', 'DESC')->where('prod_id', $products->id)->get();
                if ($ratings->count() > 0) {
                    $rating_value = $rating_sum / ($ratings->count());
                } else {
                    $rating_value = 0;
                }

                return view('frontend.products.view')->with(compact('products', 'ratings', 'rating_value', 'user_rating', 'reviews'));
            } else {
                return redirect('/')->with('status', 'The link was broken');
            }
        } else {
            return redirect('/')->with('status', 'The link was broken');
        }
    }
    public function productlistAjax()
    {
        $products = Product::select('name')->where('status', '1')->all();
        $data = [];
        foreach ($products as $item) {
            $data = $item['name'];
        }
        return $data;
    }
    public function searchProduct(Request $request)
    {
        $searched_product = $request->product_name;
        if ($searched_product != '') {
            $product = Product::where("name", "LIKE", "%$searched_product%")->first();
            if ($product != null) {
                return redirect('category/' . $product->category->slug . '/' . $product->slug);
            } else {
                return redirect()->back()->with('stats', 'No product found');
            }
        } else {
            return redirect()->back();
        }
    }
}
