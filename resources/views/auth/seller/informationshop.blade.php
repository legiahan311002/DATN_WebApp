<!-- resources/views/create_shop.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Create Shop</title>
    {{-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet"> --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('css/create-shop-styles.css') }}">
    <!-- Bạn có thể thay đổi đường dẫn của Bootstrap nếu cần -->
    <style>
        /* Thêm CSS để điều chỉnh kích thước của hình ảnh xem trước */
        .preview-image {
            max-width: 100%;
            max-height: 200px;
            margin-top: 10px;
        }
    </style>
</head>
<body>

<div class="body">
    <a href="{{ route('logout') }}">đăng xuất</a>
    <div class="main">
        <div class="container">         
            <div class="form-container">
                    <div class="title" >Create Shop Profile</div>
                    <form method="POST" action="{{ route('shop.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label class = "form__label" for="">Owner:</label>
                           
                            @if (session('username'))
                            @php
                                $user = \App\Models\User::where('username', session('username'))->first();
                            @endphp
                            <div class="info">
                                <h6>{{ $user->username }}</h6>
                            </div>
                        @endif
                        </div>
                        <div class="form-group">
                            <label class = "form__label" for="name_shop">Shop Name:</label>
                            <input class = "form__input" type="text" name="name_shop" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label class = "form__label" for="address">Address:</label>
                            <input class = "form__input" type="text" name="address" class="form-control">
                        </div>

                        <div class="form-group">
                            <label class = "form__label" for="description">Description:</label>
                            <textarea class = "form__textarea" name="description" class="form-control"></textarea>
                        </div>

                        <div class="form-group">
                            <label class="form__label" for="cover_image">Cover Image:</label>
                            <div class="preview-container">
                                <img id="cover_image_preview" class="preview-image" src="" alt="Preview">
                            </div>
                            <input type="file" name="cover_image" class="form-control-file" onchange="previewImage(this, 'cover_image_preview')">
                        </div>

                        <div class="form-group">
                            <label class="form__label" for="avt">Avatar:</label>
                            <div class="preview-container">
                                <img id="avt_preview" class="preview-image" src="" alt="Preview">
                            </div>
                            <input type="file" name="avt" class="form-control-file" onchange="previewImage(this, 'avt_preview')">
                        </div>
                        <div class=" btn-container">
                        <button class="form__button button" type="submit" class="btn btn-primary">Create Shop</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

</div>

<script>
    function previewImage(input, previewId) {
        var preview = document.getElementById(previewId);
        var file = input.files[0];
        var reader = new FileReader();

        reader.onloadend = function () {
            preview.src = reader.result;
        }

        if (file) {
            reader.readAsDataURL(file);
        } else {
            preview.src = "";
        }
    }
</script>

</body>
</html>
