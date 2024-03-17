<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Product_Detail;
use App\Models\Product_Images;
use App\Models\Category;
use App\Models\Cart;
use App\Models\Category_Child;

class HomeController extends Controller
{
    public function index()
    {
        $username = session('username');
        $carts=Cart::Where('username',$username);
        $countCart=$carts->count('id');
        session()->put('countCart', $countCart);
        $products = Product::select('product.id', 'product.name_product','product.id_category_child', DB::raw('MIN(product_detail.price) as price'), DB::raw('MAX(product_image.url_image) as url_image'))
            ->leftJoin('product_detail', 'product.id', '=', 'product_detail.id_product')
            ->leftJoin('product_image', 'product_detail.id', '=', 'product_image.id_product_detail')
            ->groupBy('product.id', 'product.name_product','product.id_category_child') 
            ->get();
        $categorys = Category::all();
        $category_Childs = Category_Child::all();
        
        session()->forget('id_category');
        session()->forget('search');
        session()->forget('sort');
        session()->forget('price_from');
        session()->forget('price_arrives');
        return view('buyer.home.index', [
            'products' => $products,
            'categorys' => $categorys,
            'category_Childs' => $category_Childs

        ]);
    }
}
