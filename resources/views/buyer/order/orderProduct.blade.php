@extends('buyer.layouts.app')
@section('title', 'Order')
@section('content')

    <section class="sec-product-detail bg12 p-t-65 p-b-60">
        <div class="order-container p-lr-100 p-t-30" style="background-color: #f5f5f5">
            <div class="order-address p-tb-40" style="background-color: #fff; border-radius: 10px">
                <div class="up m-l-30 p-b-10">
                    <span class="fs-20" style="color: #bf6d72;"><i class="zmdi zmdi-pin p-r-10"></i>Địa chỉ nhận hàng</span>
                </div>
                <div class="down m-l-30">
                    <select class="" name="shippingAddre">
                        @foreach ($shippingAddres as $shippingAddre)
                            <option value="{{ $shippingAddre->id }}">
                                Tên : {{ $shippingAddre->name }} / sđt : {{ $shippingAddre->phone_number }} / địa chỉ :
                                {{ $shippingAddre->address }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="product m-t-10" style="background-color: #fff; border-radius: 10px">
                <div class="m-l-30">
                    <table class="scrollable-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th style="width: 450px">Sản phẩm</th>
                                <th>Kiểu sản phẩm</th>
                                <th>Size</th>
                                <th>Giá</th>
                                <th>Số lượng</th>
                                <th>Thành tiền</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $count = 1;
                            @endphp
                            <tr>
                                <td>{{ $count++ }}</td>
                                <td style="display: flex">
                                    @foreach ($product_Images as $product_Image)
                                        <img src="{{ $product_Image->url_image }}" alt="Product Image" width="50">
                                    @endforeach
                                    <b>{{ $product->name_product }}</b>
                                </td>
                                <td>{{ $productDetail->name_product_detail }}</td>
                                <td>{{ $size }}</td>
                                <td>{{ number_format($productDetail->price, 0, ',', ',') }}</td>
                                <td>
                                    {{ $quantity }}
                                </td>
                                <td>
                                    {{ number_format($productDetail->price * $quantity, 0, ',', ',') }}
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="buy-button-container">
                        <span>
                            <i class="fa-solid fa-ticket p-r-10" style="color: red;"></i>Voucher của shop:
                        </span>
                        <form class="flex-c-m stext-103 cl1 size-101 p-lr-15 trans-04 fl-r" id="voucherForm"
                            action="{{ route('order.voucher_shop') }}" method="post">
                            @csrf
                            <input type="hidden" name="shippingAddre" value="{{ $shippingAddre->id }}">
                            <input type="hidden" name="color" value="{{ $productDetail->id }}">
                            <input type="hidden" name="quantity" value="{{ $quantity }}">
                            <input type="hidden" name="size" value="{{ $size }}">
                            <select name="shopVoucher" id="shopVoucher">
                                <option value="" selected disabled>
                                    @if (session('priceVoucherShop'))
                                        Giảm {{ session('priceVoucherShop') }}
                                    @else
                                        -- Chọn voucher --
                                    @endif
                                </option>
                                @foreach ($voucherShops as $voucherShop)
                                    <option value="{{ $voucherShop->id }}">
                                        Giảm {{ $voucherShop->discountAmount }}
                                    </option>
                                @endforeach
                            </select>
                        </form>

                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                const voucherForm = document.getElementById('voucherForm');
                                const shopVoucherSelect = document.getElementById('shopVoucher');

                                function submitVoucherForm() {
                                    voucherForm.submit();
                                }

                                shopVoucherSelect.addEventListener('change', submitVoucherForm);
                            });
                        </script>

                    </div>
                </div>
            </div>
            <div class="buy-button-container">
                <span>
                    <i class="fa-solid fa-ticket p-r-10" style="color: red;"></i>SeaSide Voucher:
                </span>
                <form class="flex-c-m stext-103 cl1 size-101 p-lr-15 trans-04 fl-r" id="voucherFormSEASIDE"
                    action="{{ route('order.voucher_SEASIDE') }}" method="post">
                    @csrf
                    <input type="hidden" name="shippingAddre" value="{{ $shippingAddre->id }}">
                    <input type="hidden" name="color" value="{{ $productDetail->id }}">
                    <input type="hidden" name="quantity" value="{{ $quantity }}">
                    <input type="hidden" name="size" value="{{ $size }}">
                    <select name="SEASIDEvoucher" id="SEASIDEvoucher">
                        <option value="" selected disabled>
                            @if (session('priceVoucherSEASIDE'))
                                Giảm {{ session('priceVoucherSEASIDE') }}
                            @else
                                -- Chọn voucher --
                            @endif
                        </option>
                        @foreach ($voucherSEASIDEs as $voucherSEASIDE)
                            <option value="{{ $voucherSEASIDE->id }}">
                                Giảm {{ $voucherSEASIDE->discountAmount }}
                            </option>
                        @endforeach
                    </select>
                </form>
            </div>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const voucherFormSEASIDE = document.getElementById('voucherFormSEASIDE');
                    const SEASIDEVoucherSelect = document.getElementById('SEASIDEvoucher');

                    function submitVoucherFormSEASIDE() {
                        voucherFormSEASIDE.submit();
                    }

                    SEASIDEVoucherSelect.addEventListener('change', submitVoucherFormSEASIDE);
                });
            </script>


            <div class="pay m-t-10 p-tb-40" style="background-color: #fff; border-radius: 10px">
                <div class="m-l-30 ">
                    <span class="fs-20" style="color: #bf6d72; font-weight: 600">Phương thức thanh toán</span>
                    <ul class="nav nav-tabs Payment-delivery p-lr-10 p-tb-10 m-lr-10" id="myTabs">
                        <li class="nav-item">
                            <a class="nav-link active" id="tab1" data-toggle="tab" href="#content1">Thanh toán khi nhận
                                hàng</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="tab2" data-toggle="tab" href="#content2">Thanh toán qua VNPay</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" id="tab2" data-toggle="tab" href="#content3">Thanh toán qua PAYPAL</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="content1">
                            <h4 class="m-3" style="width: 300px;float:left">Thanh toán khi nhận hàng</h4>
                            <div class="d-flex flex-column align-items-end">
                                <div class="d-flex justify-content-between w-25 my-2 mx-4">
                                    <p>Tổng tiền hàng</p>
                                    <p>{{ number_format($productDetail->price * $quantity, 0, ',', ',') }}</p>
                                </div>
                                <div class="d-flex justify-content-between w-25 my-2 mx-4">
                                    <p>Phí vận chuyển</p>
                                    <p>20.000</p>
                                </div>
                                @if (session('priceVoucherShop'))
                                    <div class="d-flex justify-content-between w-25 my-2 mx-4">
                                        <p>Voucher Shop</p>
                                        <p>-{{ number_format(session('priceVoucherShop'), 0, ',', ',') }}</p>
                                    </div>
                                @endif
                                @if (session('priceVoucherSEASIDE'))
                                    <div class="d-flex justify-content-between w-25 my-2 mx-4">
                                        <p>Voucher SEASIDE</p>
                                        <p>-{{ number_format(session('priceVoucherSEASIDE'), 0, ',', ',') }}</p>
                                    </div>
                                @endif
                                <div class="d-flex justify-content-between w-25 my-2 mx-4">
                                    <p>Tổng thanh toán</p>
                                    <p class="h4 text-danger ">
                                        {{ number_format($productDetail->price * $quantity + 20000 - session('priceVoucherShop') - session('priceVoucherSEASIDE'), 0, ',', ',') }}
                                    </p>
                                </div>
                                <hr />
                                <form action="{{ route('saveOrder') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="shippingAddre" value="{{ $shippingAddre->id }}">
                                    <input type="hidden" name="color" value="{{ $productDetail->id }}">
                                    <input type="hidden" name="quantity" value="{{ $quantity }}">
                                    <input type="hidden" name="size" value="{{ $size }}">
                                    <input type="hidden" name="shopVoucher" id="selectedShopVoucher"
                                        value="{{ session('selectedVoucher') }}">
                                    <input type="hidden" name="voucherSEASIDE" id="selectedVoucherSEASIDE"
                                        value="{{ session('selectedSEASIDEVoucher') }}">
                                    <button
                                        class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 mx-3 trans-04 js-addcart-detail"
                                        id="btnCart">
                                        Mua ngay
                                    </button>
                                </form>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="content2">

                            <img class="m-3" style="width: 300px;float:left"
                                src="https://vnpayqr.vn/wp-content/uploads/2021/10/Logo-VNPAY-QR.png" alt="">

                            <div class="d-flex flex-column align-items-end">
                                <div class="d-flex justify-content-between w-25 my-2 mx-4">
                                    <p>Tổng tiền hàng</p>
                                    <p>{{ number_format($productDetail->price * $quantity, 0, ',', ',') }}</p>
                                </div>
                                <div class="d-flex justify-content-between w-25 my-2 mx-4">
                                    <p>Phí vận chuyển</p>
                                    <p>20.000</p>
                                </div>
                                @if (session('priceVoucherShop'))
                                    <div class="d-flex justify-content-between w-25 my-2 mx-4">
                                        <p>Voucher Shop</p>
                                        <p>-{{ number_format(session('priceVoucherShop'), 0, ',', ',') }}</p>
                                    </div>
                                @endif
                                @if (session('priceVoucherSEASIDE'))
                                    <div class="d-flex justify-content-between w-25 my-2 mx-4">
                                        <p>Voucher SEASIDE</p>
                                        <p>-{{ number_format(session('priceVoucherSEASIDE'), 0, ',', ',') }}</p>
                                    </div>
                                @endif
                                <div class="d-flex justify-content-between w-25 my-2 mx-4">
                                    <p>Tổng thanh toán</p>
                                    <p class="h4 text-danger ">
                                        {{ number_format($productDetail->price * $quantity + 20000 - session('priceVoucherShop') - session('priceVoucherSEASIDE'), 0, ',', ',') }}
                                    </p>
                                </div>
                                <hr />
                                <form action="{{ route('vnpay.payment') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="shippingAddre" value="{{ $shippingAddre->id }}">
                                    <input type="hidden" name="color" value="{{ $productDetail->id }}">
                                    <input type="hidden" name="quantity" value="{{ $quantity }}">
                                    <input type="hidden" name="size" value="{{ $size }}">
                                    <button type="submit" name="redirect"
                                        class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 mx-3 trans-04 js-addcart-detail"
                                        id="btnCart">Mua ngay</button>
                                </form>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="content3">
                            <img class="m-3" style="width: 300px;float:left"
                                src="https://www.yourtradebase.com/growth-hacking/img/logo/paypal.png" alt="">
                            <div class="d-flex flex-column align-items-end">
                                <div class="d-flex justify-content-between w-25 my-2 mx-4">
                                    <p>Tổng tiền hàng</p>
                                    <p>{{ number_format($productDetail->price * $quantity, 0, ',', ',') }}</p>
                                </div>
                                <div class="d-flex justify-content-between w-25 my-2 mx-4">
                                    <p>Phí vận chuyển</p>
                                    <p>20.000</p>
                                </div>
                                @if (session('priceVoucherShop'))
                                    <div class="d-flex justify-content-between w-25 my-2 mx-4">
                                        <p>Voucher Shop</p>
                                        <p>-{{ number_format(session('priceVoucherShop'), 0, ',', ',') }}</p>
                                    </div>
                                @endif
                                @if (session('priceVoucherSEASIDE'))
                                    <div class="d-flex justify-content-between w-25 my-2 mx-4">
                                        <p>Voucher SEASIDE</p>
                                        <p>-{{ number_format(session('priceVoucherSEASIDE'), 0, ',', ',') }}</p>
                                    </div>
                                @endif
                                <div class="d-flex justify-content-between w-25 my-2 mx-4">
                                    <p>Tổng thanh toán</p>
                                    <p class="h4 text-danger ">
                                        {{ number_format($productDetail->price * $quantity + 20000 - session('priceVoucherShop') - session('priceVoucherSEASIDE'), 0, ',', ',') }}
                                    </p>
                                </div>
                                <hr />
                                <form action="{{ route('paypal.payment') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="shippingAddre" value="{{ $shippingAddre->id }}">
                                    <input type="hidden" name="price"
                                        value="{{ $productDetail->price * $quantity + 20000 }}">
                                    <input type="hidden" name="color" value="{{ $productDetail->id }}">
                                    <input type="hidden" name="quantity" value="{{ $quantity }}">
                                    <input type="hidden" name="size" value="{{ $size }}">
                                    <button type="submit" name="redirect"
                                        class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 mx-3 trans-04 js-addcart-detail"
                                        id="btnCart">Mua ngay</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
