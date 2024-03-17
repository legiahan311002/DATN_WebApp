<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\Models\Category;
use App\Models\Category_Child;

class CategoryController extends Controller
{
    
    public function index()
    {
        $categorys = Category::orderBy('id', 'desc')->get();
    
        $categorys->load('categoryChildren');
    
        return view('admin.category.category', [
            'categorys' => $categorys,
        ]);
    }
    

    public function destroy($id)
    {
        $category = Category::findOrFail($id);

        $category->delete();

        return redirect()->route('admin.category')->with('success', 'Danh mục đã được xóa thành công.');
    }

    public function storeCategory(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category_name' => 'required|string|max:255',
            'category_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Max size 2MB
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Check if category with the given name already exists
        $existingCategory = Category::where('name_category', $request->input('category_name'))->first();
        if ($existingCategory) {
            return redirect()->back()->with('error', 'Tên danh mục đã tồn tại')->withInput();
        }

        $category = new Category;
        $category->name_category = $request->input('category_name');
        $category->url_category = 'generate_unique_url_here'; // Bạn có thể tạo một hàm để tạo URL duy nhất
        $category->save();

        if ($request->hasFile('category_image')) {
            $imagePath = $request->file('category_image')->store('profile_images','public');
            $category->update(['url_category' => Storage::url($imagePath)]);
        }

        return redirect()->route('admin.category')->with('success', 'Danh mục đã được thêm thành công');
    }
  
    public function editCategory($id)
    {
        $category = Category::find($id);
    
        if (!$category) {
            return redirect()->route('admin.category')->with('error', 'Danh mục không tồn tại.');
        }
    
        return view('admin.category.edit', compact('category'));
    }
    public function updateCategory(Request $request, $id)
{
    // Xử lý validation tương tự như phương thức storeCategory
    $validator = Validator::make($request->all(), [
        'category_name' => 'required|string|max:255',
        'category_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Max size 2MB
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    $category = Category::find($id);

    if (!$category) {
        return redirect()->route('admin.category')->with('error', 'Danh mục không tồn tại.');
    }

    // Check if category with the given name already exists
    $existingCategory = Category::where('name_category', $request->input('category_name'))
                                ->where('id', '!=', $id) // Exclude the current category being updated
                                ->first();

    if ($existingCategory) {
        return redirect()->back()->with('error', 'Tên danh mục đã tồn tại')->withInput();
    }

    $category->name_category = $request->input('category_name');

    if ($request->hasFile('category_image')) {
        $imagePath = $request->file('category_image')->store('profile_images', 'public');
        $category->update(['url_category' => Storage::url($imagePath)]);
    }

    $category->save();

    return redirect()->route('admin.category')->with('success', 'Danh mục đã được cập nhật thành công.');
}

        
}
