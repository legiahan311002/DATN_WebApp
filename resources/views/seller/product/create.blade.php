@extends('seller.layouts.app')
@section('title', 'Thêm sản phẩm')
<style>
    /* Add this CSS to your stylesheet */
    #productForm {
        max-width: 600px;
        margin: 0 auto;
    }

    .product-detail,
    .product-image {
        margin-bottom: 15px;
    }

    .product-sizes-container {
        margin-left: 20px;
    }

    .button-add-prd-size {
        cursor: pointer;
        background-color: #fff;
        color: #000;
        padding: 5px;
        border: 1px solid;
        float: right;
        margin-bottom: 15px;
    }

    .button-add-prd-size:hover {
        background-color: #000;
        color: #fff;
    }

    /* Optional: Add some spacing between sections */
    #productSizesContainer,
    #productDetailsContainer {
        margin-top: 20px;
    }
</style>
@section('content')
<div class="mb-3">
    <i class="fas fa-angle-left"></i>
    <a href="/seller1/products/list" class="text-dark">Danh sách sản phẩm</a>
</div>

<form method="POST" action="" id="productForm" enctype="multipart/form-data">
    @csrf
    <div class="">
        <div class="form-group">
            <label for="name_product">Tên sản phẩm <span class="text-danger">*</span></label>
            <input type="text" name="name_product" class="form-control" placeholder="Nhập tên sản phẩm" value="{{ old('name_product') }}" required>
            @error('name_product')
            <span class="text-danger"> {{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="id_category_child">Danh mục <span class="text-danger">*</span></label>
            <select class="form-control" name="id_category_child" required>
                @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name_category_child }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="description">Mô tả <span class="text-danger">*</span></label>
            <textarea class="form-control" name="description" required>{{ old('description') }}</textarea>
            @error('description')
            <span class="text-danger"> {{ $message }}</span>
            @enderror
        </div>
        <p>Chi tiết sản phẩm</p>
        <!-- Product Details -->
        <div id="productDetailsContainer">
            <div class="product-detail">
                <div class="form-group">
                    <label>Tên chi tiết <span class="text-danger">*</span></label>
                    <input class="form-control" type="text" name="product_details[0][name_product_detail]" placeholder="Nhập tên chi tiết" required>
                </div>
                <div class="form-group">
                    <label>Giá <span class="text-danger">*</span></label>
                    <input type="number" name="product_details[0][price]" class="form-control" placeholder="Nhập giá" required>
                </div>
                <!-- Product Sizes for the first Product Detail -->
                <div class="product-sizes-container">
                    <div class="product-size">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Size</label>
                                    <input type="text" name="product_details[0][sizes][]" class="form-control" placeholder="Nhập size">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Số lượng <span class="text-danger">*</span></label>
                                    <input type="number" name="product_details[0][product_numbers][]" class="form-control" placeholder="Nhập số lượng" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="button-add-prd-size" type="button" onclick="addProductSize(this)">Thêm mới kích thước</button>
                <!-- Product Images for the first Product Detail -->
                <div class="form-group">
                    <div class="product-images-container">
                        <div class="product-image">
                            <label>Image <span class="text-danger">*</span></label>
                            <input type="file" class="form-control" id="URL_image" name="URL_image" accept="image/*" required onchange="previewImage(this)">
                            <img id="imagePreview" src="#" alt="Ảnh xem trước" style="display: none; width: 150px; margin-top: 5px;">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <button class="btn" type="button" onclick="addProductDetail()">Thêm mới chi tiết</button>
    </div>
    <div style="border-top: 1px solid rgba(0, 0, 0);">
        <button type="submit" class="btn btn-primary mt-3">Thêm Sản Phẩm</button>
    </div>
</form>

<script>
    function addProductDetail() {
        const container = document.getElementById('productDetailsContainer');
        const template = document.querySelector('.product-detail');
        const clone = template.cloneNode(true);

        container.appendChild(clone);
    }

    function addProductSize(button) {
        const productDetailContainer = button.closest('.product-detail');
        const sizesContainer = productDetailContainer.querySelector('.product-sizes-container');
        const template = sizesContainer.querySelector('.product-size');
        const clone = template.cloneNode(true);

        sizesContainer.appendChild(clone);
    }

    function previewImage(input) {
        var file = input.files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('imagePreview').src = e.target.result;
                document.getElementById('imagePreview').style.display = 'block';
            };
            reader.readAsDataURL(file);
        }
    }
</script>

@endsection