@extends('seller.layouts.app')
@section('title', 'Cập nhật thông tin shop')
@section('content')
<div class="row">
    <div class="col-md-4">
        <b>Thông tin shop</b>
    </div>
</div>
<form action="" method="POST" enctype="multipart/form-data">
    <div class="row mt-3">
        <div class="col-md-4">
            <p>Tên shop <span class="text-danger">*</span></p>
        </div>
        <div class="col-md-8">
            <input type="text" name="name_shop" class="form-control" placeholder="Nhập tên shop" value="{{ $shopProfiles->name_shop }}">
            @error('name_shop')
            <span class="text-danger"> {{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <p>Địa chỉ</p>
        </div>
        <div class="col-md-8">
            <input type="text" name="address" class="form-control" placeholder="Nhập tên shop" value="{{ $shopProfiles->address }}">
            @error('address')
            <span class="text-danger"> {{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-4">
            <p>Ảnh đại diện</p>
        </div>
        <div class="col-md-8">
            <input type="file" accept="image/*" name="image_upload_avt" id="image-input-avt" class="form-control">
            <img src="{{ $shopProfiles->avt }}" id="show-image-avt" alt="" width="100px" height="100px">
            @error('image_upload_avt')
            <span class="text-danger"> {{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-4">
            <p>Ảnh bìa</p>
        </div>
        <div class="col-md-8">
            <input type="file" accept="image/*" name="image_upload_cover" id="image-input-cover" class="form-control">
            <img src="{{ $shopProfiles->cover_image }}" id="show-image-cover" style="width: 200px; height: 100px">
            @error('image_upload_cover')
            <span class="text-danger"> {{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="mt-3" style="border-top: 1px solid rgba(0, 0, 0);">
        <button type="submit" class="btn btn-primary mt-3">Lưu thay đổi</button>
    </div>
    @csrf
</form>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function() {
        var readURL = function(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#show-image-avt').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#image-input-avt").on('change', function() {
            readURL(this);
        });
    });

    $(document).ready(function() {
        var readURL = function(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#show-image-cover').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#image-input-cover").on('change', function() {
            readURL(this);
        });
    });
</script>
@endsection