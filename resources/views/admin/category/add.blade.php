@extends('admin.layouts.app')
@section('title', 'Trang admin/category')
@section('content')

    <!-- Main content -->
    <section class="content">        
        <div class="container-fluid">
            <div class="row" style="display: flex;justify-content: center;">
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Thêm Danh Mục</h3>
                        </div>
                        <!-- form start -->
                        <form role="form" method="POST" action="{{ route('admin.category.store') }}" enctype="multipart/form-data" id="categoryForm">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="category_name">Tên Danh Mục</label>
                                    <input type="text" class="form-control" id="category_name" name="category_name" placeholder="Nhập tên danh mục" required>
                                </div>
                                <div class="form-group">
                                    <label for="category_image">Ảnh Danh Mục</label>
                                    <input type="file" class="form-control" id="category_image" name="category_image" accept="image/*" required onchange="previewImage(this)">
                                    <img id="imagePreview" src="#" alt="Ảnh xem trước" style="display: none; max-width: 100%; margin-top: 10px;">
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Lưu</button>
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
                    document.getElementById('imagePreview').style.display = 'block';
                };
                reader.readAsDataURL(file);
            }
        }
    </script>

@endsection
