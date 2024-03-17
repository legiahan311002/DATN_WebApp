<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Http\Requests\Seller\CategoryChild\CreateCategoryChildRequest;
use App\Models\Category;
use App\Models\Category_Child;
use App\Models\ShopProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CategoryChildController extends Controller
{
    public function __construct()
    {
        $this->middleware('shopProfile');
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $shopProfile = $request->shopProfile;
        $categories_child = $shopProfile->categories_child()->oldest('id')->paginate(5);

        return view('seller.category-child.index', compact('categories_child'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::get(['id', 'name_category']);
        return view('seller.category-child.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateCategoryChildRequest $request)
    {
        
        try {
            $idShop = $request->idShop;
            Category_Child::create([
                'name_category_child' => $request->input('name_category_child'),
                'id_category' => $request->input('id_category'),
                'id_shop' => $idShop,
            ]);

            Session::flash('success', 'Thêm danh mục thành công');
        } catch (\Exception $err) {
            DB::rollBack();
            Session::flash('error', 'Thêm danh mục lỗi');
            // \Log::error($err->getMessage());
            dd($err->getMessage());
            return redirect()->back()->withInput();
        }

        return redirect()->intended('/seller1/categories-child/list');
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
    public function edit(string $id, Request $request)
    {
        $nameShop = $request->nameShop;
        $shopProfile = $request->shopProfile;
        $categories_child = $shopProfile->categories_child()->findOrFail($id);
        $categories = Category::get(['id', 'name_category']);

        return view('seller.category-child.update', compact('categories_child', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $categories_child = Category_Child::findOrFail($id);

            $categories_child->name_category_child = $request->input('name_category_child');
            $categories_child->id_category = $request->input('id_category');
            $categories_child->save();

            Session::flash('success', 'Cập nhật danh mục thành công');
        } catch (\Exception $err) {
            Session::flash('error', 'Cập nhật danh mục lỗi');
            // \Log::error($err->getMessage());
            // dd($err->getMessage());
            return redirect()->back()->withInput();
        }

        return redirect()->intended('/seller1/categories-child/list');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $categories_child = Category_Child::findOrFail($id);
            $categories_child->delete();

            return redirect()->back()->with('success', 'Xóa danh mục thành công');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Xóa danh mục thất bại');
        }
    }
}
