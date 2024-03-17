@extends('buyer.profile.index')
<style>
    .form fieldset {
        margin-bottom: 10px;
        border: 1px solid #ccc;
        padding: 10px;
        display: flex;
        margin-left: 50px;
        margin-right: 50px;
        justify-content: space-between;
    }

    fieldset legend {
        font-weight: bold;
        font-size: 18px;
        color: #333;
    }

    fieldset label {
        display: flex;
        margin-bottom: 5px;
    }

    fieldset label input[type="checkbox"] {
        margin-right: 5px;
    }

    fieldset label input[type="submit"] {
        background-color: #4CAF50;
        color: white;
        padding: 10px 15px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    fieldset label input[type="submit"]:hover {
        background-color: #45a049;
    }

    
    .layout {
        width: 100%;
        display: flex;
    }

    .layout form {
        display: flex;
        flex-direction: column;
    }

    .layout form button {
        align-self: flex-end;
        margin-top: 10px;
    }

    .layout div {
        display: flex;
        justify-content: right;
    }
</style>
@section('content1')
    <div class="profile-container">
        <h4>Thêm địa chỉ giao hàng</h4>

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
        <div class="layout">
            <!-- Add the following form to your Blade view -->
            <form method="post" action="{{ route('add.address') }}">
                @csrf

                <div class="input-wrapper">
                    <label for="name">Tên:</label>
                    <input type="text" id="name" name="name" required>
                </div>

                <div class="input-wrapper">
                    <label for="phone">Số điện thoại:</label>
                    <input type="text" id="phone" name="phone" required>
                </div>

                <div class="input-wrapper">
                    <label for="address">Địa chỉ:</label>
                    <input type="text" id="address" name="address" required>
                </div>

                <button class="m-t flex-c-m stext-101 cl0 bg10 bor4 hov-btn1 p-lr-15 trans-04" type="submit">Lưu địa chỉ</button>
            </form>
        </div>
    </div>
@endsection