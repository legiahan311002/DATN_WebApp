<!DOCTYPE html>
<html lang="es" dir="ltr">

<head>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/login-register-styles.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('fonts/fontawesome-free-6.4.2-web/css/all.min.css')}}">
</head>

<body>
    <div class="header"> <a href="{{ route('buyer.home') }}" class="logo" style="color: #000">
            <p><b>SEASIDE</b> STORE / <span style="color: #a0a5a8">Đăng nhập / Seller</span></p>
        </a>
        <p style="font-size: 16px;color: #bf6d72">Bạn cần giúp đỡ?</p>
    </div>
    <div class="body">
        <div class="main">
            <div class="container a-container" id="a-container">
                <form class="form" id="a-form" method="POST" action="{{ route('seller.login') }}">
                    @csrf <!-- Add this for Laravel CSRF protection -->
                    <h2 class="form_title title">Đăng nhập</h2>
                    @if (session('fail'))
                        <div class="alert alert-danger">
                            {{ session('fail') }}
                        </div>
                    @endif
                    <input class="form__input" type="text" id="username" name="username" placeholder="Tên đăng nhập"
                        required>
                    <!-- Add the 'required' attribute above -->
                    <div class="input-wrapper">
                        <input class="form__input" id="password" type="password" name="password" placeholder="Mật khẩu"
                            required>
                        <i id="togglePassword" class="fas fa-regular fa-eye-slash toggle-password"></i>
                    </div>
                    <!-- Add the 'required' attribute above -->
                    <a class="form__link" href="{{-- route('password.request') --}}">Bạn quên mật khẩu?</a>
                    <button class="form__button button" type="submit">ĐĂNG NHẬP</button>
                    <p class="form__span">Hoặc đăng nhập bằng</p>
                    <div class="group-button">
                        <a href="{{-- url('auth/facebook') --}}" class="button-gg"> <span><i class="fa-brands fa-facebook fa-2xl"
                                    style="color: #005eff;"></i> Facebook</span></a>
                        <a href="{{-- route('google-auth') --}}" class="button-gg"> <span><i class="fa-brands fa-google fa-2xl"
                                    style="color: #ff1414;"></i> Google</span></a>
                    </div>
                </form>
            </div>

            <div class="switch" id="switch-cnt">

                <div class="switch__container " id="switch-c2">
                    <h2 class="switch__title title">Tạo tài khoản !</h2>
                    <p class="switch__description description">Vui lòng đăng ký thông tin cá nhân của bạn để bắt đầu với
                        chúng tôi</p>
                    <a class="switch__button button switch-btn" href="{{ route('seller.register') }}">ĐĂNG KÝ</a>
                </div>
                <!-- Add the 'required' attribute above -->
                <a class="form__link" href="{{-- route('password.request') --}}">Bạn quên mật khẩu?</a>
                <button class="form__button button" type="submit">ĐĂNG NHẬP</button>
                </form>
            </div>


            <div class="switch" id="switch-cnt">

                <div class="switch__container " id="switch-c2">
                    <h2 class="switch__title title">Tạo tài khoản !</h2>
                    <p class="switch__description description">Vui lòng đăng ký thông tin cá nhân của bạn để bắt đầu với
                        chúng tôi</p>
                    <a class="switch__button button switch-btn" href="{{ route('seller.register') }}">ĐĂNG KÝ</a>
                </div>
            </div>
        </div>

</body>

</html>

<script src="{{ asset('js/togglePassword.js') }}"></script>
