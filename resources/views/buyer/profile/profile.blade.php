@extends('buyer.profile.index')
@section('content1')
    <div class="profile-container">
        <h4>Hồ Sơ Của Tôi</h4>
        <p>Quản lý thông tin hồ sơ để bảo mật tài khoản</p>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (session('success'))
            <div class="alert alert-success" id="success-alert">
                {{ session('success') }}
            </div>

            <script>
                setTimeout(function() {
                    document.getElementById('success-alert').style.display = 'none';
                }, 3000);
            </script>
        @endif
        <div class="separator"></div>
        <form action="{{ route('profile.update') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="layout">

                <div class="layout-left">
                    <div>
                        <label for="username">Tên Đăng Nhập:</label>
                        <input class="input" type="text" id="username" name="username" required
                            value="{{ $user->username }}">
                    </div>

                    <div>
                        <label for="accountName">Tên Tài Khoản:</label>
                        <input class="input" type="text" id="accountName" name="accountName" required
                            value="{{ $buyerProfile->account_name }}">
                    </div>

                    <div>
                        <label for="email">Email:</label>
                        <input class="input" type="email" id="email" name="email" required
                            value="{{ $user->email }}">
                    </div>

                    <div>
                        <label for="phone">Số Điện Thoại:</label>
                        <input class="input" type="tel" id="phone" name="phone" required
                            value="{{ $user->phone_number }}">
                    </div>

                    <div>
                        {{-- client.profile.profile.blade.php --}}
                        <label for="gender">Chọn Giới Tính:</label>
                        <div class="checkbox">
                            <div>
                                <input type="radio" id="nam" name="gender" value="Nam"
                                    {{ $buyerProfile->gender === 'Nam' ? 'checked' : '' }}>
                                <label for="nam">Nam</label>
                            </div>
                            <div>
                                <input type="radio" id="Nữ" name="gender" value="Nữ"
                                    {{ $buyerProfile->gender === 'Nữ' ? 'checked' : '' }}>
                                <label for="Nữ">Nữ</label>
                            </div>
                            <div>
                                <input type="radio" id="khác" name="gender" value="Khác"
                                    {{ $buyerProfile->gender === 'Khác' ? 'checked' : '' }}>
                                <label for="Khác">Khác</label>
                            </div>
                        </div>
                    </div>

                    <div >
                        <label for="birthdate">Chọn Ngày Sinh:</label>
                        <input  class="input" type="date" id="birthdate" name="birthdate" required
                            value="{{ date('Y-m-d', strtotime($buyerProfile->birth_day)) }}">
                    </div>
                    <div>
                        <button class="m-t flex-c-m stext-101 cl0  bg10 bor4 hov-btn1 p-lr-15 trans-04" type="submit">Cập
                            nhật thông tin</button>
                    </div>

                </div>

                <div class="layout-right">
                    <div class="image-upload">
                        @if ($buyerProfile->avt)
                            <img id="profile-image" src="{{ $buyerProfile->avt }}" alt="Hình ảnh của bạn">
                        @else
                            <img id="profile-image" alt="Hình ảnh của bạn">
                        @endif
                        <input type="file" id="upload" name="upload" accept="image/*" onchange="previewImage()">
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
<script>
    function previewImage() {
        var input = document.getElementById('upload');
        var image = document.getElementById('profile-image');

        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                image.src = e.target.result;
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
