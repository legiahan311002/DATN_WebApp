@extends('buyer.layouts.app')
@section('title', 'Giỏ hàng')
@section('content')
    <section class="sec-product-detail bg12 p-t-65 p-b-60">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <nav>
            <ol class="breadcrumb ">
                <li class="breadcrumb-item"><a href="{{ route('buyer.home') }}">
                        <p>Home</p>
                    </a></li>
                <li class="breadcrumb-item " aria-current="page">Giỏ hàng</li>
            </ol>
        </nav>
        <div class="scrollable-table-container">
            @if (count($carts) > 0)
                <table class="scrollable-table">
                    <thead>
                        <tr>
                            <th><input type="checkbox" class="cart-checkbox" data-cart-id="All"></th>
                            <th style="width: 30%">Sản phẩm</th>
                            <th>Đơn giá</th>
                            <th>Số lượng</th>
                            <th>Số tiền</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $count = 1;
                        @endphp
                        @foreach ($carts as $cart)
                            <tr style="background-color: #e9d8d8">
                                <td></td>
                                <td style="display: flex;color:#d52a2a">
                                    @php
                                        $shopProfile = \App\Models\ShopProfile::where('id', $cart->id_shop)->first();
                                    @endphp
                                    <i class="fa-solid fa-shop p-r-10"></i>{{ $shopProfile->name_shop }}
                                </td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="checkbox" class="cart-checkbox" data-cart-id="{{ $cart->id }}">
                                </td>
                                <td style="display: flex">
                                    <img class="img-product-cart" src="{{ $cart->url_image }}" alt="Product Image">
                                    <div>
                                        <p style=" overflow-wrap: break-word">
                                            {{ \Illuminate\Support\Str::limit($cart->name_product, 60, ' ...') }} </p>
                                        <p>Phân
                                            loại:{{ \Illuminate\Support\Str::limit($cart->name_product_detail, 10, ' ...') }},
                                            {{ $cart->size }}</p>

                                    </div>
                                </td>
                                <td id="price-{{ $cart->id }}">{{ number_format($cart->price, 0, ',', ',') }}</td>
                                <td>
                                    <button class="quantity-btn" data-cart-id="{{ $cart->id }}"
                                        data-increment="-1">-</button>
                                    <span class="quantity " id="quantity-{{ $cart->id }}">{{ $cart->quantity }}</span>
                                    <button class="quantity-btn" data-cart-id="{{ $cart->id }}"
                                        data-increment="1">+</button>
                                </td>
                                <td id="total-price-{{ $cart->id }}">
                                    {{ number_format($cart->price * $cart->quantity, 0, ',', ',') }}
                                </td>
                                <td>
                                    <button class="delete-btn" data-cart-id="{{ $cart->id }}">
                                        <i class="fa-solid fa-delete-left" style="color: #d52a2a;"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p>Giỏ hàng của bạn đang trống.</p>
            @endif
        </div>
        <div class="buy-container">
            <div class="buy-button-container">
                <span>
                    <i class="fa-solid fa-ticket p-r-10" style="color: red;"></i>SeaSide Voucher:
                </span>
                <button type="button" class="flex-c-m stext-103 cl1 size-101 p-lr-15 trans-04 fl-r">
                    Chọn hoặc nhập mã
                </button>
            </div>
            <div class="delete-product">
                <button><b>Chọn tất cả(10)</b></button>
                <button><b>Xóa</b></button>
            </div>
            <div class="buy-button-container">
                <span style="display: flex"><b>Tổng thanh toán(0 sản phẩm): </b>
                    <p id="Tong-tien"style="color: red"> 0 đ</p>
                </span>
                <button type="button" class="flex-c-m stext-103 cl0 size-101 bg10 bor3 hov-btn1 p-lr-15 trans-04 fl-r"
                    onclick="buySelected()">
                    Mua hàng
                </button>
            </div>
        </div>
    </section>
@endsection
<script src="js/cart.js"></script>
