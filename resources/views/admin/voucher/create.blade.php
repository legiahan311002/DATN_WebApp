@extends('admin.layouts.app')
@section('title', 'Thêm mã giảm')
@section('content')
<div class="mb-3">
<i class="fas fa-angle-left"></i>
<a href="/admin/vouchers/list" class="text-dark">Danh sách mã giảm</a>
</div>
<form role="form" method="POST" action="{{ route('admin.voucher.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Code <span class="text-danger">*</span></label>
                    <input type="text" name="code" class="form-control" placeholder="Nhập mã" value="{{ old('code') }}">
                    @error('code')
                    <span class="text-danger"> {{ $message }}</span>
                    @enderror
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="form-group">
                    <label>Số lượng <span class="text-danger">*</span></label>
                    <input type="text" name="usageLimit" class="form-control" placeholder="Nhập số lượng" value="{{ old('usageLimit') }}">
                    @error('usageLimit')
                    <span class="text-danger"> {{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
        <div class="col-md-6">
                <div class="form-group">
                    <label>Số % giảm <span class="text-danger"></span></label>
                    <input type="number" name="discountPercentage" class="form-control" placeholder="Nhập số %" value="{{ old('discountPercentage') }}">
                    @error('discountPercentage')
                    <span class="text-danger"> {{ $message }}</span>
                    @enderror
                </div>
            </div>
        
            <div class="col-md-6">
                <div class="form-group">
                    <label>Số tiền giảm <span class="text-danger"></span></label>
                    <input type="number" name="discountAmount" class="form-control" placeholder="Nhập số tiền giảm" value="{{ old('discountAmount') }}">
                    @error('discountAmount')
                    <span class="text-danger"> {{ $message }}</span>
                    @enderror
                </div>
            </div>
            
        </div>
        <div class="row">
        <div class="col-md-6">
                <div class="form-group">
                    <label>Thời gian bắt đầu <span class="text-danger">*</span></label>
                    <input type="datetime-local" name="validFrom" class="form-control" placeholder="Nhập thời gian bắt đầu" value="{{ old('validFrom') }}" min="{{ now()->format('Y-m-d\TH:i') }}">
                    @error('validFrom')
                    <span class="text-danger"> {{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Thời gian kết thúc <span class="text-danger">*</span></label>
                    <input type="datetime-local" name="validTo" class="form-control" placeholder="Nhập thời gian kết thúc" value="{{ old('validTo') }}" min="{{ now()->format('Y-m-d\TH:i') }}">
                    @error('validTo')
                    <span class="text-danger"> {{ $message }}</span>
                    @enderror
                </div>
            </div>
            
        </div>
    </div>

    <div style="border-top: 1px solid rgba(0, 0, 0);">
        <button type="submit" class="btn btn-primary mt-3">Thêm</button>
    </div>
</form>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
@endsection