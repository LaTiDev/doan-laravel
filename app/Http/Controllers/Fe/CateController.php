<?php

namespace App\Http\Controllers\Fe;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class CateController extends Controller
{
    public function listPN($id) {
        // $product=Product::where('category_id',$id)->get();
        // dd($product);
        $productLists = [];
        $categorySub = Category::where('parent_id',$id)->get();
        $productS=Product::where('category_id',$id)->get();
        array_push($productLists,$productS); 
        
        if($categorySub){
            foreach ($categorySub as $key => $value) {
                $productS = Product::where('category_id',$value->id)->get();
                array_push($productLists,$productS);
            }
           
        }
        

        $categories = Category::where('parent_id',0)->get();
        $categoriesName = Category::find($id);
        return view('fe.categories.listPN',compact('categories','categoriesName','productLists'));
    }
}
