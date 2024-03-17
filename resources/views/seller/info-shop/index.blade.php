@extends('seller.layouts.app')
@section('title', 'Quản lý thông tin shop')
@section('content')
<div class="row">
    <div class="col-md-4">
        <b>Thông tin shop</b>
    </div>
    <div class="col-md-8 ml-auto">
        <a href="/seller1/infos/update/{{ $shopProfiles->id }}" class="btn btn-success">Chỉnh sửa</a>
    </div>

</div>
<div class="row mt-3">
    <div class="col-md-4">
        <p>Tên shop</p>
    </div>
    <div class="col-md-8">
        <p>{{ $shopProfiles->name_shop}}</p>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <p>Địa chỉ</p>
    </div>
    <div class="col-md-8">
        <p>{{ $shopProfiles->address}}</p>
    </div>
</div>
<div class="row mt-3">
    <div class="col-md-4">
        <p>Ảnh đại diện</p>
    </div>
    <div class="col-md-8">
        <img src="{{ $shopProfiles->avt }} " style="width: 100px; height: 100px">
    </div>
</div>
<div class="row mt-3">
    <div class="col-md-4">
        <p>Ảnh bìa</p>
    </div>
    <div class="col-md-8">
        <img src="{{ $shopProfiles->cover_image }}" style="width: 200px; height: 100px">
    </div>
</div>
@endsection