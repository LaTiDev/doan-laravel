<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Http\Requests\Admin\Product\StoreProductRequest;
use App\Models\ImgProduct;
use App\Http\Requests\Admin\Product\UpdateProductRequest;
use RealRashid\SweetAlert\Facades\Alert;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // dd(Product::allFake());
        $products = Product::select('*')->orderBy('category_id','ASC')->paginate(4);
        return view('admin.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cateP = Category::all();    
        return view('admin.product.add',compact('cateP'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        // dd($request->all());
        $oldPro = $request->old();
        $fileName = $request->photo->getClientOriginalName();
        $request->photo->storeAs('public/images',$fileName);
        $request->merge(['image' => $fileName]);

        // dd($request->all());
        
        try {
            $product = Product::create($request->all());

            if ($product && $request->hasFile('photos')) {
                foreach ($request->photos as $key => $item) {
                    $fileNames = $item->getClientOriginalName();
                    $item->storeAs('public/images',$fileNames);

                    ImgProduct::create([
                        'product_id' => $product->id,
                        'image' => $fileNames,
                    ]);
                }

                alert()->success('success', 'Thêm mới sản phẩm thành công');
                return redirect()->route('product.index');
            }
            
        } catch (\Throwable $th) {
            alert()->error('error', 'Thêm mới sản phẩm thất bại');
            return redirect()->back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $cate = Category::all();
        return view('admin.product.edit', compact('product', 'cate'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request,Product $product)
    {
        // if(!$request->photo == ""){
        //     $fileName = $request->photo->getClientOriginalName();
        //     $request->photo->storeAs('public/images', $fileName);
        //     $request->merge(['image' => $fileName]);
        // }
        //     try {
        //         $product->update($request->all());
                
        //         alert()->success('success', 'Sửa sản phẩm thành công');
        //         return redirect()->route('product.index');
        //     } catch (\Throwable $th) {
        //         dd($th);
        //         return redirect()->back()->with('error', 'Sửa thất bại');
        //     }

            // dd($request->all());
            
            $oldPro = $request->old();
            if($request->photo){
                $fileName = $request->photo->getClientOriginalName();
                $request->photo->storeAs('public/images',$fileName);
                $request->merge(['image' => $fileName]);
            }else{
                $request->merge(['image'=> $product->image]);
            };
    
            // dd($request->all());
            
            try {
                $product->update($request->all());

                if ($product && $request->hasFile('photos')) {
                    ImgProduct::where('product_id',$product->id)->delete();
                    foreach ($request->photos as $key => $item) {
                        $fileNames = $item->getClientOriginalName();
                        $item->storeAs('public/images',$fileNames);
    
                        ImgProduct::create([
                            'product_id' => $product->id,
                            'image' => $fileNames,
                        ]);
                    }

                    alert()->success('success', 'Thêm mới sản phẩm thành công');
                    return redirect()->route('product.index');
                }
                
                
            } catch (\Throwable $th) {
                alert()->error('error', 'Thêm mới sản phẩm thất bại');
                return redirect()->back();
            }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        // alert()->question('success', 'Xóa sản phẩm thành công');
        try {
            $product->delete();
            
            alert()->success('success', 'Xóa sản phẩm thành công');
            return redirect()->route('product.index');
        } catch (\Throwable $th) {
            alert()->error('error', 'Xóa thất bại');
            return redirect()->back();
        }
    }

    public function trash() {
        $trashPro = Product::onlyTrashed()->get();

        return view('admin.product.trash',compact('trashPro'));
    }
    public function restore($id)
    {
        Product::withTrashed()->where('id', $id)->restore();

        alert()->success('success', 'Khôi phục sản phẩm thành công');
        return redirect()->route('product.trash');
    }

    public function forceDelete($id)
    {
        ImgProduct::where('product_id',$id)->delete();

        Product::withTrashed()->where('id', $id)->forceDelete();

        alert()->success('success', 'Xóa vĩnh viễn sản phẩm thành công');
        return redirect()->route('product.trash');
    }

    public function selectedDelete(Request $request){
        try {
            Product::destroy($request->data);
            $product = Product::allFake();

            return response()->json(['mess',true,'data'=>$request->data,'product'=>$product]);
        } catch (\Throwable $th) {
            //throw $th;
        }
       
    }
}
