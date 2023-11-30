<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\Admin\Category\StoreCategoryRequest;
use App\Http\Requests\Admin\Category\UpdateCategoryRequest;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = Category::select('*')->orderBy('parent_id','ASC')->paginate(6);
        return view('admin.category.index',compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.category.add',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {

        $oldPro = $request->old();
        $fileName = $request->photo->getClientOriginalName();
        $request->photo->storeAs('public/images',$fileName);
        $request->merge(['image' => $fileName]);
        
        try {
            Category::create($request->all());

            alert()->success('success', 'Thêm mới sản phẩm thành công');
            return redirect()->route('category.index');
        } catch (\Throwable $th) {
            alert()->error('error', 'Thêm mới sản phẩm thất bại');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        $categories = Category::all();

        return view('admin.category.edit', compact('category', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {   
        if(!$request->photo == ""){
        $fileName = $request->photo->getClientOriginalName();
        $request->photo->storeAs('public/images', $fileName);
        $request->merge(['image' => $fileName]);
       
        }   

        try {
            $category->update($request->all());
            
            alert()->success('success', 'Sửa sản phẩm thành công');
            return redirect()->route('category.index');
        } catch (\Throwable $th) {
            alert()->error('error', 'Sửa sản phẩm thất bại');
            return redirect()->back()->with('error', 'Sửa thất bại');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        try {
            $category->delete();

            alert()->success('success', 'Xóa sản phẩm thành công');
            return redirect()->route('category.index');
        } catch (\Throwable $th) {
            alert()->succes('succes', 'Xóa sản phẩm thất bại');
            return redirect()->back();
        }
    }
    public function trash() {
        $trashCate = Category::onlyTrashed()->get();

        return view('admin.category.trash',compact('trashCate'));
    }
    public function restore($id)
    {
        Category::withTrashed()->where('id', $id)->restore();

        alert()->success('success', 'Khôi phục sản phẩm thành công');
        return redirect()->route('category.trash');
    }

    public function forceDelete($id)
    {
        Category::withTrashed()->where('id', $id)->forceDelete();

        alert()->success('success', 'Xóa vĩnh viễn sản phẩm thành công');
        return redirect()->route('category.trash');
    }

}
