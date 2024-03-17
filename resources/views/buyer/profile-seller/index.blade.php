@extends('buyer.layouts.app')
@section('title', $shopProfileInfo->name_shop)
@section('content')
<section class="bg0 p-t-65 p-b-60">
    <div class="container">
        <div>
            <div class="cover-container">
                <div class="px-4 pt-0 pb-4 cover">
                    <div class="blur-background" style="background-image: url('{{ $shopProfileInfo->cover_image }}');"></div>
                    <div class="media align-items-end profile-head">
                        <div class="profile mr-3">
                            <img src="{{ $shopProfileInfo->avt }}" alt="..." class="avt-shop rounded mb-2 img-thumbnail">
                            <a href="#" class="btn btn-outline-dark btn-sm btn-block">Theo dõi</a>
                        </div>
                        <div class="media-body mb-5 name-shop">
                            <h1 class="mt-0 mb-0">{{ $shopProfileInfo->name_shop }}</h1>
                            <p class="mb-4"> <i class="fas fa-map-marker-alt mr-2"></i>{{ $shopProfileInfo->address }}</p>
                        </div>
                    </div>
                </div>
            </div>


            <div class="bg-shadow p-4 d-flex justify-content-end text-center">
                <ul class="list-inline mb-0">
                    <li class="list-inline-item" style="margin-left: 50px" ;>
                        <p class="font-weight-bold mb-0 d-block">{{ $products->count() }}</p>
                        <small class="text"> <i class="fas fa-box-open mr-1"></i>Sản phẩm</small>
                    </li>
                    <li class="list-inline-item" style="margin-left: 50px" ;>
                        <p class="font-weight-bold mb-0 d-block">{{ round($averageRatingForShop, 2);}}</p>
                        <small class="text"> <i class="fas fa-star mr-1"></i>Đánh giá</small>
                    </li>
                    <li class="list-inline-item" style="margin-left: 50px" ;>
                        <?php
                        $createdAt = \Carbon\Carbon::parse($shopProfileInfo->created_at);
                        ?>
                        <p class="font-weight-bold mb-0 d-block">{{ $createdAt->format('m/Y') }}</p>
                        <small class="text"> <i class="fas fa-clock mr-1"></i>Tham gia</small>
                    </li>
                </ul>
            </div>
        </div>


        <div class="flex-w flex-sb-m p-b-52">
            <div class="flex-w flex-l-m filter-tope-group m-tb-10">
                <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="*">
                    Tất cả sản phẩm
                </button>
                @foreach ($categories_child as $category_child)
                <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".{{ $category_child->id }}">
                    {{ $category_child->name_category_child }}
                </button>
                @endforeach
            </div>
        </div>

        <div class="row isotope-grid">
            @foreach ($products as $product)
            <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item {{$product->id_category_child}}">
                <!-- Block2 -->
                <div class="block2">
                    <div class="block2-pic hov-img0">
                        @foreach ($product->productDetails as $productDetail)
                        <img src="{{ $productDetail->productImage->first()->url_image }}" alt="IMG-PRODUCT">
                        @endforeach

                        <a href="{{ route('buyer.productDetail', ['id' => $product->id]) }}" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
                            Quick View
                        </a>

                    </div>

                    <div class="block2-txt flex-w flex-t p-t-14">
                        <div class="block2-txt-child1 flex-col-l ">
                            <a style="height: 40px" href="" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                {{ \Illuminate\Support\Str::limit($product->name_product, 60, ' ...') }}
                            </a>
                            <span class="stext-105 cl3" style="color: #fa4251">
                                {{ number_format($product->productDetails->first()->price, 0, ',', '.') }} <span style="font-size: 14px">đ</span>
                            </span>
                        </div>

                        <div class="block2-txt-child2 flex-r p-t-3">
                            <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                                <img class="icon-heart1 dis-block trans-04" src="images/icons/icon-heart-01.png" alt="ICON">
                                <img class="icon-heart2 dis-block trans-04 ab-t-l" src="images/icons/icon-heart-02.png" alt="ICON">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection