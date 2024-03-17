<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Category_Child;
use App\Models\Product;
use App\Models\Product_Detail;
use App\Models\Size_Product;
use App\Models\Product_Images;
use App\Models\ShopProfile;
use App\Models\Order_Detail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class SellerProductController extends Controller
{
    public function index()
    {
        $username = session('username');
        $id_ShopProfile = ShopProfile::where('username', $username)->value('id');
        $products = Product::with('category_child')  // Assuming there's a relationship named 'category_child' in the Product model
                            ->where('id_shop', $id_ShopProfile)
                            ->get();
    
        foreach ($products as $product) {
            // Assuming there's a relationship between Product and Product_Detail
            $productDetails = Product_Detail::where('id_product', $product->id)->get();
            $totalProductNumber = 0;
            $totalQuantity = 0;
    
            foreach ($productDetails as $productDetail) {
                // Assuming there's a relationship between Product_Detail and Size_Product
                $sizeProducts = Size_Product::where('id_product_detail', $productDetail->id)->get();
                foreach($sizeProducts as $sizeProduct){
                    $totalProductNumber += $sizeProduct->product_number;
                }

                // Assuming there's a relationship between Product_Detail and Order_Detail
                $orderDetails = Order_Detail::where('id_product_detail', $productDetail->id)->get();
                
                foreach ($orderDetails as $orderDetail) {
                    $totalQuantity += $orderDetail->quantity;
                }
            }
    
            // You can add the totalProductNumber and totalQuantity to the $product object
            $product->totalProductNumber = $totalProductNumber;
            $product->totalQuantity = $totalQuantity;
            $product->productDetails = $productDetails;
        }
    
        return view('seller.product.index', compact('products'));
    }


    public function create()
    {
        $username = session('username');
        $id_ShopProfile = ShopProfile::where('username', $username)->value('id');
        $categories = Category_Child::where('id_shop',$id_ShopProfile)->get();

        return view('seller.product.create', compact('categories'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name_product' => 'required|string|max:255',
                'id_category_child' => 'required|exists:category_child,id',
                'description' => 'required|string',
                'product_details' => 'required|array|min:1',
                'product_details.*.name_product_detail' => 'required|string|max:255',
                'product_details.*.price' => 'required|numeric|min:0',
                'product_details.*.sizes' => 'required|array|min:1',
                'product_details.*.sizes.*' => 'nullable|string|max:255',
                'product_details.*.product_numbers' => 'required|array|min:1',
                'product_details.*.product_numbers.*' => 'required|integer|min:0',        
                'URL_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);
    
            $username = session('username');
            $id_ShopProfile = ShopProfile::where('username', $username)->value('id');
            $product = Product::create([
                'name_product' => $request->input('name_product'),
                'id_shop'=> $id_ShopProfile,
                'id_category_child' => $request->input('id_category_child'),
                'description' => $request->input('description'),
            ]);
    
            $productDetails = $request->input('product_details');
    
            foreach ($productDetails as $detail) {
                $productDetail = $product->productDetail()->create([
                    'name_product_detail' => $detail['name_product_detail'],
                    'price' => $detail['price'],
                ]);
    
                $sizes = $detail['sizes'];
                $productNumbers = $detail['product_numbers'];
    
                foreach ($sizes as $key => $size) {
                    $productDetail->productSizes()->create([
                        'size' => $size,
                        'product_number' => $productNumbers[$key],
                    ]);
                }
                if ($request->hasFile('URL_image')) {
                    $imagePath = $request->file('URL_image')->store('profile_images','public');
                    $productDetail->productImage()->create([
                        'url_image' => Storage::url($imagePath),
                    ]);
                }
            }

            Session::flash('success', 'Thêm sản phẩm thành công');
        } catch (\Exception $err) {
            DB::rollBack();
            Session::flash('error', 'Thêm danh mục lỗi');
            // \Log::error($err->getMessage());
            dd($err->getMessage());
            return redirect()->back()->withInput();
        }

        // Redirect or do something else as needed
        return redirect()->intended('/seller1/products/list');
    }
}
