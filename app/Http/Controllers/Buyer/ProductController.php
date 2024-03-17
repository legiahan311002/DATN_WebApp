<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Product_Detail;
use App\Models\Product_Images;
use App\Models\Category_Child;
use App\Models\Size_Product;
use App\Models\Feedback;
use App\Models\Feedback_Images;
use App\Models\ShopProfile;
use App\Models\Cart;

class ProductController extends Controller
{
    public function product(Request $request){
        $categoryId = $request->input('id');
        $category_Childs = Category_Child::where('id_category',$categoryId)->get();
        $products = [];
        session()->put('id_category', $categoryId);
        foreach ($category_Childs as $categoryChild) {
            $product = Product::select('product.id', 'product.name_product', 'product.id_category_child', DB::raw('MIN(product_detail.price) as price'), DB::raw('MAX(product_image.url_image) as url_image'))
                ->leftJoin('product_detail', 'product.id', '=', 'product_detail.id_product')
                ->leftJoin('product_image', 'product_detail.id', '=', 'product_image.id_product_detail')
                ->groupBy('product.id', 'product.name_product', 'product.id_category_child')
                ->where('product.id_category_child', $categoryChild->id)
                ->get();
        
            $products = array_merge($products, $product->toArray());
        }
        
        return view('buyer.product.product', [
            'products' => $products,
        ]);
    }
    public function search(Request $request)
    {
        $request->validate([
            'search1' => 'required|string|max:255',
        ]);

        $searchQuery = $request->input('search1');
        session()->put('search', $searchQuery);

        $products = Product::select('product.id', 'product.name_product', 'product.id_category_child', DB::raw('MIN(product_detail.price) as price'), DB::raw('MAX(product_image.url_image) as url_image'))
            ->leftJoin('product_detail', 'product.id', '=', 'product_detail.id_product')
            ->leftJoin('product_image', 'product_detail.id', '=', 'product_image.id_product_detail')
            ->groupBy('product.id', 'product.name_product', 'product.id_category_child')
            ->where('product.name_product',  'LIKE', "%$searchQuery%")
            ->get();
        if ($products->isEmpty()) {
            // Chia nhỏ câu thành mảng các từ
            $words = explode(' ', $searchQuery);
            
            // Tìm kiếm sử dụng mảng từ
            $products = Product::select('product.id', 'product.name_product', 'product.id_category_child', DB::raw('MIN(product_detail.price) as price'), DB::raw('MAX(product_image.url_image) as url_image'))
            ->leftJoin('product_detail', 'product.id', '=', 'product_detail.id_product')
            ->leftJoin('product_image', 'product_detail.id', '=', 'product_image.id_product_detail')
            ->groupBy('product.id', 'product.name_product', 'product.id_category_child')
            -> where(function ($query) use ($words) {
                foreach ($words as $word) {
                    $query->orWhere('product.name_product', 'LIKE', "%$word%");
                }
            })->get();
        }

        return view('buyer.product.product', [
            'products' => $products,        
        ]);
    }
    public function sort(Request $request)
    {
        $sortOrder = $request->input('sort');

        session()->put('sort', $sortOrder);
        if (session('id_category')) {            
            $categoryId = session('id_category');            
            $category_Childs = Category_Child::where('id_category', $categoryId)->get();
            $products = [];

        foreach ($category_Childs as $categoryChild) {
            $product = Product::select('product.id', 'product.name_product', 'product.id_category_child', DB::raw('MIN(product_detail.price) as price'), DB::raw('MAX(product_image.url_image) as url_image'))
                ->leftJoin('product_detail', 'product.id', '=', 'product_detail.id_product')
                ->leftJoin('product_image', 'product_detail.id', '=', 'product_image.id_product_detail')
                ->groupBy('product.id', 'product.name_product', 'product.id_category_child')
                ->where('product.id_category_child', $categoryChild->id);
        
            if (session('price_from')) {
                if (session('price_arrives')) {
                    $product->whereBetween('product_detail.price', [session('price_from'), session('price_arrives')]);
                } else {
                    $product->where('product_detail.price', '>=', session('price_from'));
                }
            }
        
            $product = $product->get();
            $products = array_merge($products, $product->toArray());
        }    
        if ($sortOrder == 'asc') {
            usort($products, function ($a, $b) {
                return $a['price'] <=> $b['price'];
            });
        } else {
            usort($products, function ($a, $b) {
                return $b['price'] <=> $a['price'];
            });
        } 
        } else {$searchQuery = session('search'); 
            $products = Product::select('product.id', 'product.name_product', 'product.id_category_child', DB::raw('MIN(product_detail.price) as price'), DB::raw('MAX(product_image.url_image) as url_image'))
            ->leftJoin('product_detail', 'product.id', '=', 'product_detail.id_product')
            ->leftJoin('product_image', 'product_detail.id', '=', 'product_image.id_product_detail')
            ->groupBy('product.id', 'product.name_product', 'product.id_category_child')
            ->where('product.name_product', 'LIKE', "%$searchQuery%")->get();
            if ($products->isEmpty()) {
                // Chia nhỏ câu thành mảng các từ
                $words = explode(' ', $searchQuery);
                
                // Tìm kiếm sử dụng mảng từ
                $products = Product::select('product.id', 'product.name_product', 'product.id_category_child', DB::raw('MIN(product_detail.price) as price'), DB::raw('MAX(product_image.url_image) as url_image'))
                ->leftJoin('product_detail', 'product.id', '=', 'product_detail.id_product')
                ->leftJoin('product_image', 'product_detail.id', '=', 'product_image.id_product_detail')
                ->groupBy('product.id', 'product.name_product', 'product.id_category_child')
                -> where(function ($query) use ($words) {
                    foreach ($words as $word) {
                        $query->orWhere('product.name_product', 'LIKE', "%$word%");
                    }
                });
            }else{
                $products = Product::select('product.id', 'product.name_product', 'product.id_category_child', DB::raw('MIN(product_detail.price) as price'), DB::raw('MAX(product_image.url_image) as url_image'))
                ->leftJoin('product_detail', 'product.id', '=', 'product_detail.id_product')
                ->leftJoin('product_image', 'product_detail.id', '=', 'product_image.id_product_detail')
                ->groupBy('product.id', 'product.name_product', 'product.id_category_child')
                ->where('product.name_product', 'LIKE', "%$searchQuery%");
            }
            // Đặt các điều kiện về giá sau cùng
            if (session('price_from')) {
                if (session('price_arrives')) {
                    $products->whereBetween('product_detail.price', [session('price_from'), session('price_arrives')]);
                } else {
                    $products->where('product_detail.price', '>=', session('price_from'));
                }
            }
            
            // Lấy dữ liệu
            $products = $products->get()->toArray();

            // Sắp xếp mảng
            if ($sortOrder == 'asc') {
                usort($products, function ($a, $b) {
                    return $a['price'] <=> $b['price'];
                });
            } else {
                usort($products, function ($a, $b) {
                    return $b['price'] <=> $a['price'];
                });
            }

            
        }
        return view('buyer.product.product', [
            'products' => $products,
        ]);
    }
    public function priceFilter(Request $request)
{
    // Validate the form input
    $request->validate([
        'price_from' => 'required|numeric|min:0',
        'price_arrives' => 'nullable|numeric|min:0',
    ]);

    $priceFrom = $request->input('price_from');
    $priceArrives = $request->input('price_arrives');
    $sortOrder = session('sort');

    if (session('id_category')) {            
        $categoryId = session('id_category');            
        $category_Childs = Category_Child::where('id_category', $categoryId)->get();
        $products = [];

        foreach ($category_Childs as $categoryChild) {
            $product = Product::select('product.id', 'product.name_product', 'product.id_category_child', DB::raw('MIN(product_detail.price) as price'), DB::raw('MAX(product_image.url_image) as url_image'))
                ->leftJoin('product_detail', 'product.id', '=', 'product_detail.id_product')
                ->leftJoin('product_image', 'product_detail.id', '=', 'product_image.id_product_detail')
                ->groupBy('product.id', 'product.name_product', 'product.id_category_child')
                ->where('product.id_category_child', $categoryChild->id);

            if ($priceArrives === null) {
                $product->where('product_detail.price', '>=', $priceFrom);
            } else {
                $product->whereBetween('product_detail.price', [$priceFrom, $priceArrives]);
            }

            // Kiểm tra nếu có sắp xếp
            if ($sortOrder) {
                // Thực hiện sắp xếp theo giá
                $product->orderBy('price', $sortOrder);
            }

            $product = $product->get();

            $products = array_merge($products, $product->toArray());
        }
    } else {  
        $searchQuery = session('search'); 
        $products = Product::select('product.id', 'product.name_product', 'product.id_category_child', DB::raw('MIN(product_detail.price) as price'), DB::raw('MAX(product_image.url_image) as url_image'))
            ->leftJoin('product_detail', 'product.id', '=', 'product_detail.id_product')
            ->leftJoin('product_image', 'product_detail.id', '=', 'product_image.id_product_detail')
            ->groupBy('product.id', 'product.name_product', 'product.id_category_child')
            ->where('product.name_product', 'LIKE', "%$searchQuery%");

        if ($priceArrives === null) {
            $products->where('product_detail.price', '>=', $priceFrom);
        } else {
            $products->whereBetween('product_detail.price', [$priceFrom, $priceArrives]);
        }

        // Kiểm tra nếu có sắp xếp
        if ($sortOrder) {
            // Thực hiện sắp xếp theo giá
            $products->orderBy('price', $sortOrder);
        }

        $products = $products->get();

        if ($products->isEmpty()) {
            // Chia nhỏ câu thành mảng các từ
            $words = explode(' ', $searchQuery);

            // Tìm kiếm sử dụng mảng từ
            $products = Product::select('product.id', 'product.name_product', 'product.id_category_child', DB::raw('MIN(product_detail.price) as price'), DB::raw('MAX(product_image.url_image) as url_image'))
                ->leftJoin('product_detail', 'product.id', '=', 'product_detail.id_product')
                ->leftJoin('product_image', 'product_detail.id', '=', 'product_image.id_product_detail')
                ->groupBy('product.id', 'product.name_product', 'product.id_category_child')
                ->where(function ($query) use ($words) {
                    foreach ($words as $word) {
                        $query->orWhere('product.name_product', 'LIKE', "%$word%");
                    }
                });

            if ($priceArrives === null) {
                $products->where('product_detail.price', '>=', $priceFrom);
            } else {
                $products->whereBetween('product_detail.price', [$priceFrom, $priceArrives]);
            }

            // Kiểm tra nếu có sắp xếp
            if ($sortOrder) {
                // Thực hiện sắp xếp theo giá
                $products->orderBy('price', $sortOrder);
            }

            $products = $products->get();
        }
    }

    session()->put('price_from', $priceFrom);
    session()->put('price_arrives', $priceArrives);

    return view('buyer.product.product', [
        'price_from' => $priceFrom, 'price_arrives' => $priceArrives, 'products' => $products
    ]);
}


    public function productDetail(Request $request)
    {
        $username = session('username');
        $carts=Cart::Where('username',$username);
        $countCart=$carts->count('id');
        session()->put('countCart', $countCart);
        $id = $request->input('id');
        $products = Product::find($id);
        $priceByProduct = [];
        $product_Details = Product_Detail::where('id_product', $id)->get();
        $priceStats = Product_Detail::where('id_product', $id)
            ->selectRaw('MIN(price) as minPrice, MAX(price) as maxPrice')
            ->first();

        $minPrice = $priceStats->minPrice;
        $maxPrice = $priceStats->maxPrice;

        $priceByProduct[$id] = [
            'min' => $minPrice,
            'max' => $maxPrice,
        ];
        foreach($product_Details as $product_Detail){

            $size_Product = Size_Product::where('id_product_detail', $product_Detail->id)->get();
            $product_Images = Product_Images::whereIn('id_product_detail', $product_Details->pluck('id'))->get();
        }
        $shopProfile=ShopProfile::where('id',$products->id_shop)->get();

        $productNumber = ShopProfile::join('product', 'shop_profile.id', '=', 'product.id_shop')
        ->where('shop_profile.id', $products->id_shop)
        ->count('shop_profile.id');    

        $feedbackNumber = Feedback::join('order_detail', 'order_detail.id', '=', 'feedback.id_order_detail')
        ->join('product_detail', 'product_detail.id', '=', 'order_detail.id_product_detail')
        ->join('product', 'product.id', '=', 'product_detail.id_product')
        ->join('shop_profile', 'shop_profile.id', '=', 'product.id_shop')
        ->where('shop_profile.id', $products->id_shop)
        ->count('feedback.id');

        $feedbackDatas = Feedback::join('order_detail', 'order_detail.id', '=', 'feedback.id_order_detail')
        ->join('order', 'order.id', '=', 'order_detail.id_order')
        ->join('product_detail', 'product_detail.id', '=', 'order_detail.id_product_detail')
        ->join('product', 'product.id', '=', 'product_detail.id_product')
        ->join('buyer_profile', 'buyer_profile.username', '=', 'order.username')
        ->where('product.id', $id)
        ->select('feedback.id', 'buyer_profile.account_name', 'buyer_profile.avt', 'feedback.created_at', 'feedback.star', 'product_detail.name_product_detail', 'order_detail.size', 'feedback.message')
        ->get();
        // Count total feedback
        $totalFeedback = $feedbackDatas->count();

        // Calculate average star rating
        $averageStarRating = $feedbackDatas->avg('star');

        // foreach ($product_Details as $product_Detail) {
        //     $size_Product = Size_Product::where('id_product_detail', $product_Detail->id)->get();
        // }

        $request->session()->put('shopProfile', [
            'productNumber' => $productNumber,
            'feedbackNumber' => $feedbackNumber,
        ]);

        return view('buyer.product.productDetail', [
            'ID' => $id,
            'products' => $products,
            'priceByProduct' => $priceByProduct,
            'productDetailsWithImages' => $product_Images,
            'size_Product' => $size_Product,
            'product_Details' => $product_Details,
            'feedbackData' => $feedbackDatas,
            'totalFeedback' => $totalFeedback,
            'averageStarRating' => $averageStarRating,
            'shopProfiles' =>$shopProfile,
        ]);
    }
}
