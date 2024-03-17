<!doctype html>
<html lang="en">

<head>
    <title>@yield('title', 'Login Admin')</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <link rel="icon" type="image/png" href="images/icons/icons-logo-s.png" />
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/styles.css') }}">
</head>

<body>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-5">
                    <div class="login-wrap p-4 p-md-5">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="fa fa-user-o"></span>
                        </div>
                        <h3 class="text-center mb-4">Login account admin</h3>

                        <form class="form" method="POST" action="{{ route('admin.login') }}">
                            @csrf
                            @if (session('fail'))
                                <div class="alert alert-danger">
                                    {{ session('fail') }}
                                </div>
                            @endif
                            <div class="form-group">
                                <input type="text" id="username" name="username" class="form-control rounded-left" placeholder="Tên đăng nhập" required>
                            </div>
                            <div class="form-group d-flex">
                                <input type="password" id="password" name="password" class="form-control rounded-left" placeholder="Mật khẩu" required>
                            </div>
                            <div class="form-group d-md-flex">
                                <div class="w-50">
                                    <label class="checkbox-wrap checkbox-primary">Nhớ tôi
                                        <input type="checkbox" name="remember" checked>
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="w-50 text-md-right">
                                    <a href="#">Quên mật khẩu</a>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary rounded submit p-3 px-5">Đăng nhập</button>
                            </div>
                        </form>                        
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
