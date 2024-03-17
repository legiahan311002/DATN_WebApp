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
</style>
@section('content1')
    <div class="profile-container">
        <h4>Cài đặt thông báo</h4>
        <div class="separator"></div>
        <form class="form" action="#" method="post">
            <fieldset>
                <legend>Thông báo Email</legend>
                <label>
                    Thông báo khi có cập nhật về đơn hàng của bạn, bao gồm cả việc cập nhật thanh toán.
                </label>
                <label>
                    <input type="checkbox" name="activation">
                    Kích hoạt
                </label>
            </fieldset>

            <fieldset>
                <legend>Cập nhật sản phẩm</legend>
                <label>
                    Thông báo khi sản phẩm của bạn hết hàng, bị xóa hoặc bị khóa.
                </label>
                <label>
                    <input type="checkbox" name="activation">
                    Kích hoạt
                </label>
            </fieldset>

            <fieldset>
                <legend>Bản tin</legend>
                <label>
                    Gửi thông tin xu hướng, chương trình khuyến mãi & cập nhật mới nhất.
                </label>
                <label>
                    <input type="checkbox" name="activation">
                    Kích hoạt
                </label>
            </fieldset>

            <fieldset>
                <legend>Nội dung cá nhân</legend>
                <label>
                    Gửi cập nhật cá nhân (ví dụ: quà sinh nhật).
                </label>
                <label>
                    <input type="checkbox" name="activation">
                    Kích hoạt
                </label>
            </fieldset>

            <input class="m-t flex-c-m stext-101 cl0  bg10 bor4 hov-btn1 p-lr-15 trans-04" type="submit" value="Lưu thay đổi">
        </form>
    </div>
@endsection
