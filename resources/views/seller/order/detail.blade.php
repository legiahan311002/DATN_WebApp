@extends('seller.layouts.app')
@section('title', 'Danh sách đơn hàng')
@section('content')
<div class="mb-3">
    <i class="fas fa-angle-left"></i>
    <a href="/seller1/orders/list" class="text-dark">Danh sách đơn hàng</a>
</div>
<b>Thông tin đơn hàng</b>
<div class="row mt-3">
    <div class="col-md-4">
        <p>Khách hàng</p>
    </div>
    <div class="col-md-8">
        <p>{{ $orderDetail->order->buyer->account_name }}</p>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <p>Địa chỉ nhận hàng</p>
    </div>
    <div class="col-md-8">
        <p>{{ $orderDetail->order->shippingAddress->address }}</p>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <p>Số điện thoại nhận hàng</p>
    </div>
    <div class="col-md-8">
        <p>{{ $orderDetail->order->shippingAddress->phone_number }}</p>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <p>Sản phẩm</p>
    </div>
    <div class="col-md-8">
        <p>{{ $orderDetail->productDetail->product->name_product }}</p>
    </div>
</div>
<div class="row mt-3">
    <div class="col-md-4">
        <p>Hình ảnh</p>
    </div>
    <div class="col-md-8">
        <img src="{{ $orderDetail->productDetail->productImages->first()->url_image }} " style="width: 100px; height: 100px">
    </div>
</div>
<div class="row mt-3">
    <div class="col-md-4">
        <p>Số lượng</p>
    </div>
    <div class="col-md-8">
        <p>{{ $orderDetail->quantity }}, {{ $orderDetail->size }}, {{ $orderDetail->productDetail->name_product_detail}}</p>
    </div>
</div>
<div class="row mt-3">
    <div class="col-md-4">
        <p>Tổng tiền</p>
    </div>
    <div class="col-md-8">
        <p>{{ number_format($orderDetail->price, 2, ',', '.') }}</p>
    </div>
</div>
<div class="row mt-3">
    <div class="col-md-4">
        <p>Phương thức thanh toán</p>
    </div>
    <div class="col-md-8">
        <p>{{ $orderDetail->order->payment_methods }}</p>
    </div>
</div>
<div class="row mt-3">
    <div class="col-md-4">
        <p>Trạng thái</p>
    </div>
    <div class="col-md-8">
        <p>{{ $orderDetail->status }}</p>
    </div>
</div>
@endsection