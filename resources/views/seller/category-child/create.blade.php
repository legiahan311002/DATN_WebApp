@extends('seller.layouts.app')
@section('title', 'Thêm danh mục')
@section('content')
<div class="mb-3">
    <i class="fas fa-angle-left"></i>
    <a href="/seller1/categories-child/list" class="text-dark">Danh sách danh mục</a>
</div>
<form action="" method="POST" enctype="multipart/form-data">
    <div class="">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Tên danh mục <span class="text-danger">*</span></label>
                    <input type="text" name="name_category_child" class="form-control" placeholder="Nhập tên danh mục" value="{{ old('name_category_child') }}">
                    @error('name_category_child')
                    <span class="text-danger"> {{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>Danh mục cha <span class="text-danger">*</span></label>
                    <select class="form-control" name="id_category">
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name_category }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>

    <div style="border-top: 1px solid rgba(0, 0, 0);">
        <button type="submit" class="btn btn-primary mt-3">Thêm</button>
    </div>
    @csrf
</form>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
@endsection