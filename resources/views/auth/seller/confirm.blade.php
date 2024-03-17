<!-- resources/views/create_shop.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Create Shop</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/create-shop-styles.css') }}">
</head>

<div class="body">
   
    <div class="main">
        <div class="container">
            <div class="form-container">
                <div class="title">Shop Profile</div>
                <form method="POST" action="" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class = "form__label" for="">Status:</label>

                        <h3 class="h3"> Đang chờ duyệt</h3>
                    </div>
                    <div class="form-group">
                        <label class = "form__label" for="">Shop's name:</label>
                        @if (session('username'))
                            @php
                                $shopProfile = \App\Models\shopProfile::where('username', session('username'))->first();
                            @endphp
                            <div class="info">
                                <h6>{{ $shopProfile->name_shop }}</h6>
                            </div>                           
                        @endif
                    </div>
                    <div class="form-group">
                        <label class = "form__label" for="">Description:</label>

                        @if (session('username'))
                            @php
                                $shopProfile = \App\Models\shopProfile::where('username', session('username'))->first();
                            @endphp
                            <div class="info">
                                <h6>{{ $shopProfile->description }}</h6>
                            </div>                            
                        @endif
                    </div>
                    <div class="form-group">
                        <label class = "form__label" for="">Cover Image:</label>

                        @if (session('username'))
                            @php
                                $shopProfile = \App\Models\shopProfile::where('username', session('username'))->first();
                            @endphp
                            <div class="image">
                                <img src="{{ $shopProfile->avt }}" class="img-circle elevation-2" alt="Shop Image"
                                style="width: 150px; height: 150px">
                            </div>                        
                        @endif
                    </div>
                    <div class="form-group">
                        <label class = "form__label" for="">Shop's avatar:</label>

                        @if (session('username'))
                            @php
                                $shopProfile = \App\Models\shopProfile::where('username', session('username'))->first();
                            @endphp
                            <div class="image">
                                <img src="{{ $shopProfile->cover_image }}" class="img-circle elevation-2" alt="Shop Image"
                                    style="width: 150px; height: 150px">
                            </div>                        
                        @endif
                    </div>
                                                       

                    <a href="{{ route('logout') }}">đăng xuất</a>
                    
                </form>
            </div>
        </div>
    </div>

</div>

</html>
