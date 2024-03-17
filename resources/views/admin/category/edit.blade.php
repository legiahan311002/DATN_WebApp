@extends('admin.layouts.app')
@section('title', 'Chỉnh sửa danh mục')
@section('content')

<!-- Main content -->
<section class="content">
    <div class="container-fluid" >
        <div class="row" style="display: flex;justify-content: center;">
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Chỉnh sửa danh mục</h3>
                    </div>
                    <form action="/admin/updateCategory/{{ $category->id }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="category_name">Tên danh mục:</label>
                                <input type="text" name="category_name" value="{{ $category->name_category }}" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="category_image">Hình ảnh:</label>
                                <input type="file" name="category_image" accept="image/*" class="form-control" onchange="previewImage(this)">
                                <img id="imagePreview" src="{{ asset($category->url_category) }}" alt="Ảnh xem trước" style="max-width: 100%; margin-top: 10px;">
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-success">Lưu</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /.content -->

<script>
    function previewImage(input) {
        var file = input.files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function (e) {
                document.getElementById('imagePreview').src = e.target.result;
            };
            reader.readAsDataURL(file);
        } else {
            document.getElementById('imagePreview').src = "{{ asset($category->url_category) }}";
        }
    }
</script>

@endsection
