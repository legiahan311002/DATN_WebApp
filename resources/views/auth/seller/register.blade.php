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
            <p><b>SEASIDE</b> STORE / <span style="color: #a0a5a8">Đăng ký / Seller</span></p>
        </a>
        <p style="font-size: 16px;color: #bf6d72">Bạn cần giúp đỡ?</p>
    </div>
    <div class="body">
        <div class="main">
            <div class="container b-container" id="b-container">
                <form class="form" id="b-form" method="POST" action="{{ route('seller.register') }}">
                    <!-- Use appropriate route for registration -->
                    @csrf
                    <h2 class="form_title title">Tạo tài khoản người bán</h2>
                    <input class="form__input" type="text" name="username" placeholder="Tên đăng nhập" required>
                    <input class="form__input" type="text" name="email" placeholder="Email" required>
                    <input class="form__input" type="text" name="phone_number" placeholder="Số điện thoại" required>
                    <div class="input-wrapper">
                        <input class="form__input" id="password" type="password" name="password" placeholder="Mật khẩu"
                            required>
                        <i id="togglePassword" class="fas fa-regular fa-eye-slash toggle-password"></i>
                    </div>
                    <div class="input-wrapper">
                        <input class="form__input" id="password-confirm" type="password" name="password_confirmation"
                            placeholder="Nhập lại mật khẩu" required autocomplete="new-password" required
                            oninput="checkPasswordMatch()">
                        <i id="toggleConfirmPassword" class="fas fa-regular fa-eye-slash toggle-password"></i>
                    </div>
                    <span id="password-match-error" class="text-warning"></span>
                    <button class="form__button button" type="submit">ĐĂNG KÝ</button>
                    <p class="form__span">Hoặc đăng nhập bằng</p>
                    <div class="group-button">
                        <a href="" class="button-gg"> <span><i class="fa-brands fa-facebook fa-2xl"
                                    style="color: #005eff;"></i> Facebook</span></a>
                        <a href="{{-- route('google-auth') --}}" class="button-gg"> <span><i
                                    class="fa-brands fa-google fa-2xl" style="color: #ff1414;"></i> Google</span></a>
                    </div>
                </form>
            </div>


            <div class="switch" id="switch-cnt">
                <div class="switch" id="switch-cnt">
                    <div class="switch__circle switch__circle--t"></div>
                    <div class="switch__container" id="switch-c1">
                        <h4 class="switch__title title">Đã có tài khoản!</h4>
                        <p class="switch__description description">Vui lòng đăng nhập với tài khoản cá nhân của bạn</p>
                        <a class="switch__button button switch-btn" href="{{ route('seller.login') }}">ĐĂNG NHẬP</a>
                    </div>
    
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<script src="{{ asset('js/password-match.js') }}"></script>
<script src="{{ asset('js/togglePassword.js') }}"></script>
