<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\Controller;
use App\Models\Category_Child;
use App\Models\Product;
use App\Models\ShopProfile;
use Illuminate\Http\Request;

class ProfileSellerController extends Controller
{
    protected $category_child;
    protected $product;

    public function __construct(Product $product, Category_Child $category_child)
    {
        $this->product = $product;
        $this->category_child = $category_child;
    }

    public function getInfoShop(Request $request)
    {
        $idShop = $request->input('id');
        $shopProfileInfo = ShopProfile::with(['products.productDetails'])->where('id', $idShop)->first();

        $products = $shopProfileInfo->products;

        $categories_child = $shopProfileInfo->categories_child;
        // Tính trung bình số sao cho từng sản phẩm
        $averageRatingsPerProduct = [];

        foreach ($products as $product) {
            $ratings = $product->orderDetails
                ->flatMap(function ($orderDetail) {
                    return $orderDetail->feedbacks->pluck('star');
                })
                ->filter();

            $averageRatingsPerProduct[$product->id] = $ratings->isNotEmpty() ? $ratings->avg() : 0;
        }

        // Tính trung bình cộng số sao cho toàn bộ shop
        $allRatings = collect($averageRatingsPerProduct)
            ->filter(function ($averageRating) {
                return $averageRating > 0;
            });

        $averageRatingForShop = $allRatings->isNotEmpty() ? $allRatings->avg() : 0;

        return view('buyer.profile-seller.index', compact('shopProfileInfo', 'idShop', 'products', 'categories_child', 'averageRatingForShop'));
    }
}
