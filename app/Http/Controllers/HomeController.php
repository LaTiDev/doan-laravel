<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class HomeController extends Controller
{
    public function index() {

        $categories = Category::where('parent_id',0)->get();
        $stock = Product::where('stock',1)->get();

        return view('fe.main',compact('stock','categories'));
    }

    public function detail($slug) {
        $product = Product::where('slug',$slug)->first();
        $related = Product::where('category_id', $product->category_id)
                            ->where('id', '!=', $product->id)->get();
        
        return view('fe.products.detail',compact('product','related'));
    }

}
