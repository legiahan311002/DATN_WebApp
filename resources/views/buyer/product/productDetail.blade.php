<!-- Page Header Start -->
@extends('buyer.layouts.app')
@section('title', $products->name_product)
@section('content')
    <!-- Product Detail -->
    <section class="sec-product-detail bg12 p-t-65 p-b-60">
        <!-- breadcrumb -->
        <div class="container">
            <div class="bread-crumb flex-w p-l-25 p-r-15 p-b-10 p-lr-0-lg">
                <a href="{{ route('buyer.home') }}" class="stext-109 cl8 hov-cl1 trans-04">
                    Home
                    <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
                </a>

                <span class="stext-109 cl4">
                    {{ $products->name_product }}
                </span>
            </div>
        </div>
        <div class="container">
            <div class="row bor22 bg0">
                <div class="col-md-6 col-lg-7 p-b-30">
                    <div class="p-l-25 p-r-30 p-lr-0-lg">
                        <div class="wrap-slick3 flex-sb flex-w">
                            <div class="wrap-slick3-dots"></div>
                            <div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

                            <div class="slick3 gallery-lb">
                                @foreach ($productDetailsWithImages as $product_Image)
                                    <div class="item-slick3" data-thumb="{{ asset($product_Image->url_image) }}">
                                        <div class="wrap-pic-w pos-relative">
                                            <img class="" src="{{ asset($product_Image->url_image) }}"
                                                alt="IMG-PRODUCT">
                                            <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04"
                                                href="{{ asset($product_Image->url_image) }}">
                                                <i class="fa fa-expand"></i>
                                            </a>
                                            {{-- <h4>{{ $productDetailWithImages['productDetail']->color }}</h4>
                                                <p style="color: #ff2600">Giá
                                                    :{{ number_format($productDetailWithImages['productDetail']->price, 0, ',', '.') }}
                                                    đ
                                                </p> --}}
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="flex-w flex-m p-l-100 p-t-10 respon7">
                                <div class="flex-m bor9 p-r-10 m-r-11">
                                    <a href="#"
                                        class="fs-24 cl3 hov-cl1 trans-04 lh-10 p-lr-2 p-tb-2 js-addwish-detail tooltip100"
                                        data-tooltip="Add to Wishlist">
                                        <i class="zmdi zmdi-favorite"></i>
                                    </a>
                                </div>
                                <p>Chia sẻ: </p>
                                <!-- Facebook Share -->
                                <a href="" class="fs-24 cl13 hov-cl1 trans-04 lh-10 p-l-10 p-tb-2 m-r-8 tooltip100"
                                    onclick="shareOnFacebook()" data-tooltip="Chia sẻ trên Facebook">
                                    <i class="fa-brands fa-facebook"></i>
                                </a>

                                <!-- Twitter Share -->
                                <a href="" class="fs-24 cl15 hov-cl1 trans-04 lh-10  p-tb-2 m-r-8 tooltip100"
                                    onclick="shareOnTwitter()" data-tooltip="Chia sẻ trên Twitter">
                                    <i class="fa-brands fa-square-twitter"></i>
                                </a>

                                <!-- Google Plus Share -->
                                <a href="" class="fs-24 cl14 hov-cl1 trans-04 lh-10  p-tb-2 m-r-8 tooltip100"
                                    onclick="shareOnGooglePlus()" data-tooltip="Chia sẻ trên Google Plus">
                                    <i class="fa-brands fa-google-plus"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-5 p-b-30">
                    <div class="p-r-50 p-t-5 p-lr-0-lg">
                        <h4 class=" cl2">
                            @if (session('success'))
                                <div class="alert alert-success" id="success-alert">
                                    {{ session('success') }}
                                </div>
                                <script>
                                    setTimeout(function() {
                                        $('#success-alert').fadeOut('fast');
                                    }, 3000);
                                </script>
                            @endif
                            <span class="js-name-detail mtext-106">{{ $products->name_product }}</span>
                            <p class="mtext-107"style="color: #f9ba48">
                                {{ number_format($averageStarRating, 1) }}
                                @if ($averageStarRating > floor($averageStarRating))
                                    @for ($i = 0; $i < floor($averageStarRating); $i++)
                                        <i class="zmdi zmdi-star"></i>
                                    @endfor
                                    <i class="zmdi zmdi-star-half"></i>
                                @else
                                    @for ($i = 0; $i < $averageStarRating; $i++)
                                        <i class="zmdi zmdi-star"></i>
                                    @endfor
                                @endif
                                <span style="color: black">| {{ $totalFeedback }}</span><span style="color: #888"> Đánh
                                    giá</span>
                            </p>
                        </h4>

                        <span style="color: #ff2600;font-size: 20px" class="mtext-106 cl2">
                            @if ($priceByProduct[$ID]['min'] == $priceByProduct[$ID]['max'])
                                Giá : {{ number_format($priceByProduct[$ID]['min'], 0, ',', '.') }} <span
                                    style="font-size: 18px">đ</span>
                            @else
                                Giá : {{ number_format($priceByProduct[$ID]['min'], 0, ',', '.') }} -
                                {{ number_format($priceByProduct[$ID]['max'], 0, ',', '.') }} <u>đ</u>
                            @endif
                        </span>
                        {{-- <p class="stext-102 cl3 p-t-23">
                            {{ $products->description }}
                        </p> --}}

                        <!--  -->
                        {{-- {{ route('cart.add') }} --}}
                        <form action="{{ route('cart.add') }}" method="post" id="productForm">
                            @csrf
                            <div class="p-t-33">
                                <div class="flex-w flex-r-m p-b-10">
                                    <div class="size-203 flex-c-m respon6">
                                        Size
                                    </div>

                                    <div class="size-204 respon6-next">
                                        <div class="rs1-select2 bor8 bg0">
                                            <select class="js-select2" name="size">
                                                @foreach ($size_Product as $sizeProduct)
                                                    <option>{{ $sizeProduct->size }}</option>
                                                @endforeach
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="flex-w flex-r-m p-b-10">
                                    <div class="size-203 flex-c-m respon6">
                                        Color
                                    </div>

                                    <div class="size-204 respon6-next">
                                        <div class="rs1-select2 bor8 bg0">
                                            <select class="js-select2" name="color">
                                                @foreach ($product_Details as $product_Detail)
                                                    <option value="{{ $product_Detail->id }}">
                                                        {{ $product_Detail->name_product_detail }}
                                                    </option>
                                                @endforeach
                                            </select>

                                            <div class="dropDownSelect2"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex-w flex-r-m p-b-10">
                                    <div class="size-204 flex-w flex-m respon6-next">
                                        <div class="wrap-num-product flex-w m-r-20 m-tb-10">
                                            <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                                <i class="fs-16 zmdi zmdi-minus"></i>
                                            </div>
                                            <input class="mtext-104 cl3 txt-center num-product" type="number"
                                                name="quantity" value="1">
                                            <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                                <i class="fs-16 zmdi zmdi-plus"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="group-cart">
                                        <button type="submit" name="action" value="add_to_cart"
                                            class="flex-c-m stext-103  size-101 cl14 bg11 bor10 hov-btn1 p-lr-15 trans-04">
                                            Thêm vào giỏ hàng
                                        </button>
                                        <button type="button" onclick="submitForm('buy_now')"
                                            class="flex-c-m stext-103 cl0 size-101 bg10 bor10 hov-btn1 p-lr-15 trans-04">
                                            Mua ngay
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <script>
                            function submitForm(action) {
                                var form = document.getElementById('productForm');
                                form.action = action === 'buy_now' ? "{{ route('client.order.processOrder') }}" : "{{ route('cart.add') }}";
                                form.submit();
                            }
                        </script>
                    </div>
                </div>
            </div>

            {{-- Start-Thông tin shop --}}
            @foreach ($shopProfiles as $profile)
                <div class="row bor22 bg0 m-t-15">
                    <div>
                        <a href="#" style="height: 100%; color: #bf6d72;" class="nav-link">
                            <div class="small-avatar-container">
                                <img name="avt" src="{{ $profile->avt }}" alt="Avatar của Shop"
                                    class="rounded-circle small-avatar-shop">
                            </div>
                        </a>
                    </div>
                    <div class="p-t-10">
                        <h5 name="name_shop">{{ $profile->name_shop }}</h5>
                        <div class=" p-t-10 button-container">
                            <div>
                                <button class="flex-c-m stext-102 cl14 bg11 bor10 hov-btn3 p-lr-15 p-tb-3 trans-04">
                                    <i class="fas fa-comment-dots p-r-3"></i>Chat ngay
                                </button>
                            </div>
                            <div class="m-l-10">
                                <a href="{{ route('profile-seller', ['id' => $profile['id']]) }}"
                                    class="flex-c-m stext-102 cl8 bg0 bor20 hov-btn3 p-lr-15 p-tb-3 trans-04">
                                    <i class="fas fa-store p-r-3"></i>Xem shop
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="p-tb-15 p-lr-15 flex-w">
                        @php
                            $productNumber = session('shopProfile')['productNumber'];
                            $feedbackNumber = session('shopProfile')['feedbackNumber'];
                        @endphp
                        <div>
                            <div class="flex-shop">
                                <label>Đánh giá </label>
                                <span class="cl14 txt-right">{{ $feedbackNumber }}</span>
                            </div>
                            <div class="flex-shop">
                                <label>Sản phẩm</label>
                                <span class=" cl14 txt-right">{{ $productNumber }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="p-tb-15 p-lr-15 ">
                        <div>
                            <div class="flex-shop">
                                <label>Tỉ lệ phản hồi </label>
                                <span class=" cl14 txt-right">95%</span>
                            </div>
                            <div class="flex-shop">
                                <label>Thời gian phản hồi</label>
                                <span class=" cl14 txt-right">trong vài giờ</span>
                            </div>
                        </div>
                    </div>
                    <div class="p-tb-15 p-lr-15 ">
                        <div>
                            <div class="flex-shop">
                                <label>Tham gia </label>
                                <span class=" cl14 txt-right">1 tháng trước</span>
                            </div>
                            <div class="flex-shop">
                                <label>Người theo dõi</label>
                                <span class=" cl14 txt-right">12k</span>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            {{-- End-Thông tin shop --}}

            <div class="row bor22 bg0 m-t-15">
                <div class="w-full m-t-20 m-b-10 m-l-20">
                    <h5> MÔ TẢ SẢN PHẨM</h5>
                </div>
                <p class="stext-102 cl3 p-lr-20">
                    {{ $products->description }}
                </p>
            </div>

            <div class="row bor22 bg0 m-t-15">
                <div class="w-full m-tb-20 m-l-20">
                    <h5> ĐÁNH GIÁ SẢN PHẨM</h5>
                </div>
                <div class="w-full flex-w  p-all-10  m-lr-20 bor22 bg13 m-b-15">
                    <div class="p-r-20">
                        <div style="color: #f9ba48">
                            <span class="mtext-111">{{ number_format($averageStarRating, 1) }}</span> trên 5
                            <p class="mtext-111 ">
                                @if ($averageStarRating > floor($averageStarRating))
                                    @for ($i = 0; $i < floor($averageStarRating); $i++)
                                        <i class="zmdi zmdi-star"></i>
                                    @endfor
                                    <i class="zmdi zmdi-star-half"></i>
                                @else
                                    @for ($i = 0; $i < $averageStarRating; $i++)
                                        <i class="zmdi zmdi-star"></i>
                                    @endfor
                                @endif
                            </p>
                        </div>
                    </div>
                    <div class="button-container filter-tope-group">






                        <div>
                            <button class="flex-c-m stext-102 cl14 bg0 bor20 hov-btn3 p-lr-15  trans-04 how-active1"
                                data-filter="*">
                                Tất cả bình luận
                            </button>
                        </div>
                        <div class="m-l-10">
                            <button class="flex-c-m stext-102 cl14 bg0 bor20 hov-btn3 p-lr-15  trans-04" data-filter=".5">
                                5 sao
                            </button>
                        </div>
                        <div class="m-l-10">
                            <button class="flex-c-m stext-102 cl14 bg0 bor20 hov-btn3 p-lr-15  trans-04" data-filter=".4">
                                4 sao
                            </button>
                        </div>
                        <div class="m-l-10">
                            <button class="flex-c-m stext-102 cl14 bg0 bor20 hov-btn3 p-lr-15  trans-04" data-filter=".3">
                                3 sao
                            </button>
                        </div>
                        <div class="m-l-10">
                            <button class="flex-c-m stext-102 cl14 bg0 bor20 hov-btn3 p-lr-15  trans-04" data-filter=".2">
                                2 sao
                            </button>
                        </div>
                        <div class="m-l-10">
                            <button class="flex-c-m stext-102 cl14 bg0 bor20 hov-btn3 p-lr-15  trans-04" data-filter=".1">
                                1 sao
                            </button>
                        </div>
                    </div>
                </div>
                <div class="isotope-grid">
                    @foreach ($feedbackData as $feedback)
                        <div class="flex-w flex-t p-b-10 m-l-20 isotope-item {{ $feedback->star }}" style="width: 500px">
                            <div class="small-avatar-container">
                                <img name="avt" src="{{ $feedback->avt }}" alt="AVATAR"
                                    class="rounded-circle small-avatar">
                            </div>
                            <div class="size-207">
                                <div>
                                    {{ $feedback->account_name }}
                                    <span class="fs-18 cl11">
                                        @for ($i = 0; $i < $feedback->star; $i++)
                                            <i class="zmdi zmdi-star"></i>
                                        @endfor
                                    </span>
                                </div>
                                <p class="stext-102">
                                    {{ $feedback->created_at }} | {{ $feedback->name_product_detail }} |
                                    Size:{{ $feedback->size }}
                                </p>
                                <p class="stext-103 cl6">
                                    {{ $feedback->message }}
                                </p>
                                <div class="block2-pic" style="display: flex;height:200px">

                                    @php
                                        $url_image = \App\Models\Feedback_Images::where('id_feedback', $feedback->id)->value('url_image');
                                    @endphp

                                    <img class="img-feedback" src="{{ $url_image }}" alt="Feedback Image">
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
